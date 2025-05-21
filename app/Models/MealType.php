<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealType extends Model
{
    protected $fillable = [
        'key',
        'name',
    ];

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }
}
