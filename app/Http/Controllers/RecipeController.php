<?php

namespace App\Http\Controllers;

use App\Models\MealType;
use App\Models\Recipe;
use App\Models\Unit;
use App\Services\Recipes\RecipeService;
use App\Http\Requests\StoreRecipeRequest;

class RecipeController extends Controller
{
    protected $recipeService;

    public function __construct(RecipeService $recipeService)
    {
        $this->recipeService = $recipeService;
    }

    public function index()
    {
        $recipes = Recipe::with('mealType')->get();
        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {

        $mealTypes = MealType::get();
        $units = Unit::get();


        return view('recipes.create', ['mealTypes' => $mealTypes, 'units' => $units]);
    }

    public function store(StoreRecipeRequest $request)
    {
        $recipe = $this->recipeService->createRecipe($request->getRecipeEntity());

        return redirect()->route('recipes.index')->with('status', 'Se ha creado la receta exitosamente');
    }

    public function edit(Recipe $recipe)
    {
    $mealTypes = MealType::get();
    $units = Unit::get();
    return view('recipes.edit', compact('recipe', 'mealTypes', 'units'));
    }
}
