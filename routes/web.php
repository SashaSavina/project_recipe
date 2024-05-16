<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');})->name('welcome');
Route::get('/profile', function () {return view('profile');})->name('profile');

Route::get('/registration', function () {return view('registration');});
Route::post('/registration', [\App\Http\Controllers\UserController::class, 'save']);

Route::get('/authenticate', function () {return view('entrance');});
Route::post('/authenticate', [\App\Http\Controllers\LoginController::class, 'authenticate']);

Route::get('/add/recipe', [\App\Http\Controllers\RecipeAddController::class, 'index'])->middleware('auth');
Route::post('/add/recipe', [\App\Http\Controllers\RecipeAddController::class,'save']);

Route::get('/show/recipes', [\App\Http\Controllers\RecipesShowController::class, 'show'])->name('show.recipes');
Route::get('/show/recipes/search', [\App\Http\Controllers\RecipesShowController::class, 'search']);

Route::get('/show/recipe{id}', [\App\Http\Controllers\RecipeShowController::class, 'show'])->name('show.recipe');
Route::put('/show/recipe{id})',[\App\Http\Controllers\RecipeEditController::class, 'like'])->name('recipes.like');

Route::get('/edit/recipe{id}', [\App\Http\Controllers\RecipeEditController::class, 'index'])->name('edit.recipe')->middleware('auth');
Route::put('/edit/recipe{id}', [\App\Http\Controllers\RecipeEditController::class, 'edit'])->name('recipes.update');

Route::get('/show/profile{id}', [\App\Http\Controllers\ProfileController::class, 'show']);
Route::get('/edit/profile{id}', [\App\Http\Controllers\ProfileController::class, 'index'])->name('edit.profile');
Route::put('/edit/profile{id}', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.update');




