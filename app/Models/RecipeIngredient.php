<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;
use App\Models\Recipe;

class RecipeIngredient extends Model
{
    protected $fillable = [
        'recipe_id',
        'unit_id',
        'name',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
