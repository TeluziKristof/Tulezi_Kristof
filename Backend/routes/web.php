<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HirdetesController;

// Hirdetés route
Route::get('/hirdetesek/kartyak', [HirdetesController::class, 'getHirdetesekKartyak']);
Route::get('/hirdetesek/kartyak/{id}', [HirdetesController::class, 'getHirdetesKartya']);
Route::get('/hirdetesek/reszletek/{id}', [HirdetesController::class, 'getHirdetesReszlet']);
Route::get('/hirdetesek/tabla', [HirdetesController::class, 'getHirdetesekTabla']);
Route::post('/hirdetesek', [HirdetesController::class, 'ujHirdetesFelvetele']);

