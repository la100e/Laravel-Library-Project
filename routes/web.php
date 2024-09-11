<?php

use App\Http\Controllers\AuteursController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LivresController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LivresController::class, 'home'])->name('livres.home');

// Route::get('/livres/categorie', )
Route::post('/livres/search', [LivresController::class, 'search'])->name('livres.search');
Route::get('/livres/ajax', [LivresController::class, 'myview'])->name('livres.ajax');
Route::get('/ajax', function (){
    return view('myview');
});

Route::resource('livres', LivresController::class);
Route::resource('categories', CategoriesController::class);
Route::resource('auteurs', AuteursController::class);
