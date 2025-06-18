<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Hanya admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', 'AdminController@dashboard');
});

// Hanya orang tua
Route::middleware(['auth', 'parent'])->group(function () {
    Route::get('/parent/payments', 'ParentController@payments');
});
