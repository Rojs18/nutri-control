<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Services\Patients\PatientService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePatientRequest;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;

class PatientController extends Controller
{
    
    /** @var PatientService */
    private PatientService $patientService;

    public function __construct(PatientService $patientService)
    {
        $this->patientService = $patientService;

    }

    public function index(Request $request)
    {
        $user = $request->user();
        $patients = Patient::where('user_id', $user->id)->get();
        return view('patients.index', ['patients' => $patients]);
    }


    public function create()
    {
        return view('patients.create');
    }


    public function store(StorePatientRequest $request)
    {

        $patient = $this->patientService->createPatient($request->getPatientEntity());


        return redirect()->route('patients.index')->with('status', 'Paciente registrado con exito!');
    }


    public function show($id)
    {
        $patient = Patient::findOrFail($id);

        $patient->load('appointments');

        $usersPerMonth = $patient->appointments->map(function ($appointment) {
            return [
                "count" => $appointment->weight,
                "height" => $appointment->height,
                "imc" => $appointment->imc,
                "month" => $appointment->created_at->format("Y-m-d")
            ];
        });

        $peso = $usersPerMonth->pluck("count")->toArray();
        $altura = $usersPerMonth->pluck("height")->toArray();
        $imc = $usersPerMonth->pluck("imc")->toArray();
        $labels = $usersPerMonth->pluck("month")->toArray();

        $chart = Chartjs::build()
            ->name("PatientConsultChart")
            ->type("line")
            ->size(["width" => 400, "height" => 200])
            ->labels($labels)
            ->datasets([
                [
                    "label" => "Peso del Paciente",
                    "backgroundColor" => "rgba(58, 89, 209, 0.31)",
                    "borderColor" => "rgba(58, 89, 209, 0.7)",
                    "data" => $peso
                ],
                [
                    "label" => "IMC del Paciente",
                    "backgroundColor" => "rgba(217, 22, 86, 0.31)",
                    "borderColor" => "rgb(217, 22, 86, 0.7)",
                    "data" => $imc
                ],
                [
                    "label" => "Altura del Paciente",
                    "backgroundColor" => "rgb(157, 192, 139, 0.31)",
                    "borderColor" => "#9DC08B",
                    "data" => $altura
                ]
            ])
            ->options([
                'scales' => [
                    'x' => [
                        'type' => 'time',
                        'time' => [
                            'unit' => 'month'
                        ],
                    ]
                ],
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Registro Consultas de Pacientes'
                    ]
                ]
            ]);

        return view('patients.show', compact('patient', 'chart'));
    }


    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }


    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required',
            'medical_history' => 'nullable|string',
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($validatedData);

        return to_route('patients.index')->with('status', 'Paciente Actualizado');
    }


    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('patients.index')->with('status', 'Paciente Eliminado');;
    }
}
