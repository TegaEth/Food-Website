<?php

use App\Http\Controllers\RecipeController;
use App\Models\Dish;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    $dishes = Dish::latest()->take(3)->get();
    return view('welcome',[
        'dishes' => $dishes
    ]);
});

Route::controller(RecipeController::class)->group(function () {
    Route::get('/recipes', 'index')->name('recipes.index');
    Route::get('/recipe/{dish}', 'show')->name('recipes.show'); // Model binding
});