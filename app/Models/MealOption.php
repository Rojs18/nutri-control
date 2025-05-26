<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealOption extends Model
{
    protected $fillable = [
        'option_id',
        'recipe_id',
    ];

    public function options(){
        return $this->belongsTo(Option::class);
    }

    public function recipe(){
        return $this->belongsTo(Recipe::class);
    }
}
