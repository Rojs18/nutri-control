<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;

class NutritionPlan extends Model
{
    protected $fillable = [
        'patient_id',
        'description',
        'start_date',
        'end_date',
    ];

    public function patient(){
        return $this->belongsTo(Patient::class);
    } 
}
