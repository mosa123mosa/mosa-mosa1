<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/',[TaskController::class,'index'])->name('index');
Route::post('store',[TaskController::class,'store']);
Route::post('delete/{id}',[TaskController::class,'delete']);
Route::post('update/{id}',[TaskController::class,'update'])->name('update');
Route::get('edit/{id}',[TaskController::class,'edit'])->name('edit');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




