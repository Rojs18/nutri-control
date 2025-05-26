<?php

namespace App\Http\Controllers;

use App\Models\NutritionalPlan;
use App\Models\Patient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NutritionalPlanController extends Controller
{
    public function index()
    {
        $plans = NutritionalPlan::with(['patient'])->get();

        return view('nutritional-plans.index', compact('plans'));
    }
    public function create(Request $request)
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
        $user = $request->user();
        $patients = Patient::where('user_id', $user->id)->get();

        return view('nutritional-plans.create', compact('desayunos', 'almuerzos', 'cenas', 'patients'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $plan = NutritionalPlan::create([
                'patient_id' => (int)$data['patient_id'],
                'name' => $data['name'],
            ]);

            foreach ($data['options'] as $name => $option) {

                $optionModel = $plan->options()->create([
                    'name' => $name,
                ]);

                if (isset($option['Desayuno']) && $option['Desayuno']) {
                    $optionModel->mealOptions()->create([
                        'recipe_id' => (int)$option['Desayuno'],
                    ]);
                }
                if (isset($option['Almuerzo']) && $option['Almuerzo']) {
                    $optionModel->mealOptions()->create([
                        'recipe_id' => (int)$option['Almuerzo'],
                    ]);
                }
                if (isset($option['Cena']) && $option['Cena']) {
                    $optionModel->mealOptions()->create([
                        'recipe_id' => (int)$option['Cena'],
                    ]);
                }
            }
            return redirect()->route('nutritional-plans.index')->with('success', 'Plan alimenticio creado exitosamente!');

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());
            return back()->withInput()
                ->with('error', 'Error al crear el plan: ' . $e->getMessage());
        }
    }

}
