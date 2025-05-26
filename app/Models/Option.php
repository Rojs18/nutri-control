<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'nutritional_plan_id',
        'name',
    ];
    public function nutritionalPlan(){
        return $this->belongsTo(NutritionalPlan::class);
    }
    public function mealOptions(){
        return $this->hasMany(MealOption::class);
    }
}
