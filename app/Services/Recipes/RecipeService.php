<?php

namespace App\Services\Recipes;

use App\Models\Recipe;
use App\Services\Recipes\Entities\RecipeEntity;
use Illuminate\Support\Facades\DB;

class RecipeService
{
    public function createRecipe(RecipeEntity $recipeEntity): Recipe
    {
        return DB::transaction(function () use ($recipeEntity) {
            $recipe = Recipe::create([
                'meal_type_id' => $recipeEntity->getMealTypeId(),
                'name' => $recipeEntity->getName(),
                'instructions' => $recipeEntity->getInstructions(),
            ]);

            foreach ($recipeEntity->getIngredients() as $ingredientData) {
                $recipe->recipeIngredients()->create([
                    'name' => trim($ingredientData['name']),
                    'unit_id' => $ingredientData['unit_id'],
                ]);
            }
            return $recipe;
        });
    }
}
