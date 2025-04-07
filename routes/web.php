<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;


// Route::view('/', 'home')->name('home');
Route::get('/', function () {
    $categories = DB::table('categories')->get();
    return view('home', ['categories' => $categories]);
})->name('home');

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/article', function () {
    return view('article');
})->name('article');

Route::get('posts/{post}', [PostController::class, 'show']) 
    ->name('post.show'); 