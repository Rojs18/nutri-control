<?php 

namespace App\Services\Patients;

use App\Models\Patient;
use App\Services\Patients\Entities\PatientEntity;

class PatientService  
{
    public function createPatient(PatientEntity $patientEntity)
    {

        return Patient::create([
            'user_id' => $patientEntity->getUserId(),
            'first_name' => $patientEntity->getFisrtName(),
            'last_name' => $patientEntity->getLastName(),
            'birth_date' => $patientEntity->getBirthDate(),
            'gender' => $patientEntity->getGender(),
            'medical_history' => $patientEntity->getMedicalHistory()
        ]);
    }
}