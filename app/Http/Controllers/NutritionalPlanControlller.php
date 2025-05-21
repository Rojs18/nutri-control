<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class NutritionalPlanControlller extends Controller
{
    public function index()
    {
        return view('nutritional-plans.index');
    }
    public function create()
    {
        $desayunos = Recipe::whereHas('mealType', function($query) {
            $query->where('key', 'breakfast');
        })->get();
        $almuerzos = Recipe::whereHas('mealType', function($query) {
            $query->where('key', 'lunch');
        })->get();
        $cenas = Recipe::whereHas('mealType', function($query) {
            $query->where('key', 'dinner');
        })->get();

        return view('nutritional-plans.create', compact('desayunos', 'almuerzos', 'cenas'));
    }
}
