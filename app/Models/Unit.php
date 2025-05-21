<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RecipeIngredient;

class Unit extends Model
{
    protected $fillable = [
        'name',
    ];

    public function recipeIngredients()
    {
        return $this->hasMany(RecipeIngredient::class);
    }
}
