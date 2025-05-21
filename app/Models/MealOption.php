<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealOption extends Model
{
    protected $table = [
        'option_id',
        'recipe_id',
    ];

    public function options(){
        return $this->belongsTo('App\Models\Option');
    }
}
