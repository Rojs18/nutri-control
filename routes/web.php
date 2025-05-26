<?php

use App\Http\Controllers\NutritionalPlanController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\RecipeController;
use Barryvdh\DomPDF\Facade\Pdf;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/test-pdf', function() {
        $pdf = pdf::loadView('pdfs.test');
        return $pdf->stream('prueba.pdf');
    });

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::resource('patients', PatientController::class);

    Route::resource('recipes', RecipeController::class);

    Route::resource('nutritional-plans', NutritionalPlanController::class);

    Route::get('/patients/{patient}/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');

    Route::post('/patients/{patient}/appointments', [AppointmentController::class, 'store'])->name('appointments.store');

    Route::get('/patients/{patient}/appointments/{appointment}', [AppointmentController::class, 'show'])->name('appointments.show');


    Route::get('/patients/{patient}/appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');

    Route::put('/patients/{patient}/appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');

    Route::delete('/patients/{patient}/appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');



    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});


require __DIR__.'/auth.php';

