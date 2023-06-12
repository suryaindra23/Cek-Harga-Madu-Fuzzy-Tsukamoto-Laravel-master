<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogCheckController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/check', function () {
    return view('form-check', [
        'data_form' => null,
        'result_price' => null
    ]);
})->name('check');

Route::post('/check', [LogCheckController::class, 'check'])->name('check_price');
