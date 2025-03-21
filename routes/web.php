<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollingUnitController;
use App\Http\Controllers\LgaResultsController;
use App\Http\Controllers\ResultController;


Route::get('/add-result', [ResultController::class, 'create'])->name('results.create');
Route::post('/add-result', [ResultController::class, 'store'])->name('results.store');
Route::get('/get-wards', [ResultController::class, 'getWardsByLGA'])->name('wards.by.lga');



Route::get('/lga-results', [LgaResultsController::class, 'index'])->name('lgas.index');
Route::post('/lga-results', [LgaResultsController::class, 'show'])->name('lgas.show');


Route::get('/polling-units', [PollingUnitController::class, 'index'])->name('polling-units.index');
Route::get('/polling-unit/{id}', [PollingUnitController::class, 'show'])->name('polling-units.show');


Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/welcome', function () {
    return view('welcome');
});
