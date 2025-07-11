<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EconomicGroupController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ReportController;
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

    // Rotas para Grupos Econômicos
    Route::resource('economic-groups', EconomicGroupController::class);

    // Rotas para Marcas
    Route::resource('brands', BrandController::class);

    // Rotas para Unidades
    Route::resource('units', UnitController::class);

    // Rotas para Funcionários
    Route::resource('employees', EmployeeController::class);

    // Rotas para Relatórios
    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('index');
        Route::get('/employees', [ReportController::class, 'employees'])->name('employees');
        Route::get('/employees/export', [ReportController::class, 'exportEmployees'])->name('employees.export');
        Route::get('/units', [ReportController::class, 'units'])->name('units');
        Route::get('/brands', [ReportController::class, 'brands'])->name('brands');
        Route::get('/economic-groups', [ReportController::class, 'economicGroups'])->name('economic-groups');
        Route::get('/units/export', [ReportController::class, 'exportUnits'])->name('units.export');
        Route::get('/brands/export', [ReportController::class, 'exportBrands'])->name('brands.export');
        Route::get('/economic-groups/export', [ReportController::class, 'exportEconomicGroups'])->name('economic-groups.export');
    });
});

require __DIR__.'/auth.php';
