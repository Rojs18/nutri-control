<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MealType;
use App\Models\RecipeIngredient;

class Recipe extends Model
{
    protected $fillable = [
        'meal_type_id',
        'name',
        'instructions',
    ];

    public function recipeIngredients()
    {
        return $this->hasMany(RecipeIngredient::class);
    }

    public function mealType()
    {
        return $this->belongsTo(MealType::class);
    }
}

