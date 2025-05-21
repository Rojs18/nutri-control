<?php

namespace App\Services\Recipes\Entities;


class RecipeEntity
{
    /** @var string */
    protected string $name;
    
    /** @var string */
    protected string $instructions;

    /** @var int */
    protected int $meal_type_id;

    /** @var array */
    protected array $ingredients;
    
    /** 
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    
    /**
     * @return string
     */
    public function getInstructions(): string
    {
        return $this->instructions;
    }
    /**
     * @param string $instructions
     */
    public function setInstructions(string $instructions): void
    {
        $this->instructions = $instructions;
    }
    
    /**
     * @return int 
     */
    public function getMealTypeId(): int    
    {
        return $this->meal_type_id;
    }

    /**
     * @param int $meal_type_id
     */
    public function setMealTypeId(int $meal_type_id): void
    {
        $this->meal_type_id = $meal_type_id;
    }

    /**
     * @return array 
     */
    public function getIngredients(): array    
    {
        return $this->ingredients;
    }

    /**
     * @param array $ingredients
     */
    public function setIngredients(array $ingredients): void
    {
        $this->ingredients = $ingredients;
    }
}