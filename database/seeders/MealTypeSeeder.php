<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MealType;

class MealTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['key' => 'breakfast', 'name' => 'Desayuno'],
            ['key' => 'lunch', 'name' => 'Almuerzo'],
            ['key' => 'dinner', 'name' => 'Cena'],
        ];

        foreach ($data as $item) {
            MealType::create($item);
        }
    }
}
