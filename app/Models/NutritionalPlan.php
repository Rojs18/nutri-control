<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NutritionalPlan extends Model
{
    protected $fillable = [
        'patient_id',
        'name',
    ];

    public function options(){
        return $this->hasMany(Option::class);
    }
}
