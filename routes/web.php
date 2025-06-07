<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    LoginController, ProfileController, CategoryController, ArticleCrontroller, ClassroomController
};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'auth'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    Route::resource('articles', ArticleCrontroller::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('classrooms', ClassroomController::class);
});


