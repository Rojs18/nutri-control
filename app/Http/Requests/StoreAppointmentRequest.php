<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Services\Appointments\Entities\AppointmentEntity;

class StoreAppointmentRequest extends FormRequest
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
            'notes' => 'required|string|max:255',
            'weight' => 'required|numeric|min:30|max:300',
            'height' => 'required|numeric|min:120|max:250',
            'patient_id' => 'required|exists:patients,id',
        ];
    }

    public function getAppointmentEntity(): AppointmentEntity
    {
        $appointmentEntity = new AppointmentEntity;

        $appointmentEntity->setNotes($this->validated('notes'));
        $appointmentEntity->setWeight($this->validated('weight'));
        $appointmentEntity->setHeight($this->validated('height'));
        $appointmentEntity->setPatientId($this->validated('patient_id'));

        return $appointmentEntity;
    } 
}
