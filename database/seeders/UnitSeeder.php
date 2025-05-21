<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            ['name' => 'unidad'],
            ['name' => 'gramos'],
            ['name' => 'kilos'],
            ['name' => 'litros'],
            ['name' => 'mililitros'],
            ['name' => 'onzas'],
            ['name' => 'taza'],
            ['name' => 'cucharada'],
            ['name' => 'cucharadita'],
        ];

        foreach ($units as $unit) {
            Unit::create($unit);
        }
    }
}
