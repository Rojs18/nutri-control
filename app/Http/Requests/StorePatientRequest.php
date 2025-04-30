<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Patient;
use App\Services\Patients\Entities\PatientEntity;

class StorePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required',
            'medical_history' => 'nullable|string',
        ];
    }

    public function getPatientEntity(): PatientEntity
    {
        $patientEntity = new PatientEntity;

        $user = $this->user();

        $patientEntity->setFirstName($this->input('first_name'));
        $patientEntity->setLastName($this->input('last_name'));
        $patientEntity->setBirthDate($this->input('birth_date'));
        $patientEntity->setGender($this->input('gender'));
        $patientEntity->setMedicalHistory($this->input('medical_history'));
        $patientEntity->setUserId($user->id);

        return $patientEntity;
    }
}