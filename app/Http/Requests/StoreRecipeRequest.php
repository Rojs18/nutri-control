<?php

namespace App\Http\Requests;

use App\Services\Recipes\Entities\RecipeEntity;
use Illuminate\Foundation\Http\FormRequest;


class StoreRecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        logger("entrega aqui");
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'instructions' => 'required|string',
            'meal_type_id' => 'required|exists:meal_types,id',
            'ingredients' => 'required|array|min:1'
        ];
    }

    public function getRecipeEntity(): RecipeEntity
    {
        $recipeEntity = new RecipeEntity;

        $recipeEntity->setName($this->input('name'));
        $recipeEntity->setInstructions($this->input('instructions'));
        $recipeEntity->setIngredients($this->input('ingredients'));
        $recipeEntity->setMealTypeId($this->input('meal_type_id'));

        return $recipeEntity;
    }
}
