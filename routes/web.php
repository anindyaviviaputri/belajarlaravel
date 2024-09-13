<?php

use App\Http\Controllers\attendanceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [attendanceController::class, 'showHome'])->name('home');
Route::post('/store', [attendanceController::class, 'store'])->name('store');
Route::get('/attendances/{id}/edit', [attendanceController::class, 'edit'])->name('attendances.edit');
Route::put('/attendances/{id}', [attendanceController::class, 'update'])->name('attendances.update');
Route::delete('/attendances/{id}', [attendanceController::class, 'destroy'])->name('attendances.destroy');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');