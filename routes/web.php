<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');})->name('welcome');
Route::get('/profile', function () {return view('profile');})->name('profile');

Route::get('/registration', function () {return view('registration');});
Route::post('/registration', [\App\Http\Controllers\UserController::class, 'save']);

Route::get('/authenticate', function () {return view('entrance');});
Route::post('/authenticate', [\App\Http\Controllers\LoginController::class, 'authenticate']);

Route::get('/add/recipe', [\App\Http\Controllers\RecipeController::class, 'index']);
Route::post('/add/recipe', [\App\Http\Controllers\RecipeController::class,'save']);




