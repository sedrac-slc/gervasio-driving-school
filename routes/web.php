<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    LoginController, ProfileController, CategoryController, ArticleCrontroller, ClassroomController,
    SecretaryController
};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'auth'])->name('login');

Route::middleware(['web', 'auth'])->group(function () {
    Route::put('/profile/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::put('/profile', [ProfileController::class, 'upate'])->name('profile.upate');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    Route::resource('articles', ArticleCrontroller::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('classrooms', ClassroomController::class);
    Route::resource('secretaries', SecretaryController::class);
});


