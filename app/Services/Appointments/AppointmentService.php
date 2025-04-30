<?php 

namespace App\Services\Appointments;

use App\Models\Appointment;
use App\Services\Appointments\Entities\AppointmentEntity;

class AppointmentService  
{
    public function createAppointment(AppointmentEntity $appointmentEntity): Appointment
    {
        return Appointment::create([
            'patient_id' => $appointmentEntity->getPatientId(),
            'notes' => $appointmentEntity->getNotes(),
            'weight' => $appointmentEntity->getWeight(),
            'height' => $appointmentEntity->getHeight(),
        ]);
    }
}