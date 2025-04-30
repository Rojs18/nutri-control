<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Appointment;
use App\Http\Requests\StoreAppointmentRequest;
use App\Services\Appointments\AppointmentService;

class AppointmentController extends Controller
{

    /** @var AppointmentService */
    private AppointmentService $appointmentService;

    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;

    }

    public function create(Patient $patient)
    {

        return view('appointments.create', ['patient' => $patient]);
    }

    public function store(StoreAppointmentRequest $request, Patient $patient)
    {
        
        $this->appointmentService->createAppointment($request->getAppointmentEntity());

        return redirect()->route('patients.show', $patient)->with('status', 'Consulta Creada');
    }

    public function show(Patient $patient, Appointment $appointment)
    {   
         
        $appointment->load('patient');

        return view('appointments.show', ['patient' => $patient, 'appointment' => $appointment]);
    }

    public function edit(Patient $patient, Appointment $appointment)
    {

        return view('appointments.edit', [
            'patient' => $patient,
            'appointment' => $appointment,
        ]);
    }

    public function update(Request $request, Patient $patient, Appointment $appointment)
    {

        $validatedData = $request->validate([
            'weight' => 'required|numeric|min:30|max:300',
            'height' => 'required|numeric|min:120|max:250',
            'notes' => 'required|string',
        ]);

        $appointment->update($validatedData);

        return redirect()->route('appointments.show', [$patient, $appointment])->with('status', 'Consulda actualizada');
    }

    private function anthropometricDataChanged(Appointment $appointment, array $newData): bool
    {
        return $appointment->weight != $newData['weight'] || 
               $appointment->height != $newData['height'];
    }

    private function calculateImc(float $weight, float $height): float
    {
        $heightInMeters = $height / 100;
        return round($weight / ($heightInMeters * $heightInMeters), 1);
    }

    public function destroy(Patient $patient, Appointment $appointment)
    {

        $appointment->delete();

        return redirect()->route('patients.show', $patient)->with('status', 'Consulta eliminada');
    }
}
