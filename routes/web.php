<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

Route::resource('authors',AuthorController::class);

Route::resource('books',BookController::class);

Route::get('/',function(){
    return view('home');
})->name('home');