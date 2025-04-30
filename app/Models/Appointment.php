<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;

class Appointment extends Model
{
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'patient_id',
        'notes',
        'weight',
        'height',
        'imc',
    ];

    public function patient(){
        return $this->belongsTo(Patient::class);
    }
    
    protected static function booted()
    {
        static::saving(function ($appointment) 
        {
            $appointment->calculateImc();
        });
    }

    public function calculateImc()
    {
        if ($this->weight && $this->height) {
            $heightInMeters = $this->height / 100;
            $this->imc = round($this->weight / ($heightInMeters * $heightInMeters), 1);
        }
    }

    public function getImcClassificationAttribute()
    {
        if (!$this->imc) return 'No calculado';
        
        if ($this->imc < 18.5) return 'Bajo peso';
        if ($this->imc < 25) return 'Normal';
        if ($this->imc < 30) return 'Sobrepeso';
        return 'Obesidad';
    }
    
    public function getImcColorAttribute(): string
    {
        if (!$this->imc) return 'gray';
        
        if ($this->imc < 18.5) return 'yellow';
        if ($this->imc < 25) return 'green';
        if ($this->imc < 30) return 'orange';
        return 'red';
    }
}

