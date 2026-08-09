<?php

use App\Http\Controllers\OPDDashboardController;
use App\Http\Controllers\OPDVisitController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/patients/create', [PatientController::class, 'create'])
        ->name('patients.create');

    Route::post('/patients', [PatientController::class, 'store'])
        ->name('patients.store');

    Route::get('/patients/search', [PatientController::class, 'search'])
        ->name('patients.search');

    Route::get('/patients/find', [PatientController::class, 'find'])
        ->name('patients.find');

    Route::get('/patients/{patient}/opd', [OPDVisitController::class, 'create'])
    ->name('opd.create');

    Route::post('/patients/{patient}/opd', [OPDVisitController::class, 'store'])
    ->name('opd.store');

    Route::get('/patients/{patient}/opd/{visit}', [OPDVisitController::class, 'show'])
    ->name('opd.show');

    Route::get('/patients/{patient}/opd/{visit}', [OPDVisitController::class, 'show'])
    ->name('opd.show');

    Route::get('/patients/{patient}/opd/{visit}/edit', [OPDVisitController::class, 'edit'])
    ->name('opd.edit');

    Route::put('/patients/{patient}/opd/{visit}', [OPDVisitController::class, 'update'])
    ->name('opd.update');

    Route::get('/opd', [OPDDashboardController::class, 'index'])
    ->middleware('auth')
    ->name('opd.dashboard');

    Route::get('/opd/report', [OPDDashboardController::class, 'report'])
    ->middleware('auth')
    ->name('opd.report');

    Route::get('/opd/report/print', [OPDDashboardController::class, 'print'])
    ->name('opd.report.print');

});

require __DIR__.'/auth.php';