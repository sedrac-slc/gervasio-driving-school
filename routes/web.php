<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    LoginController,
    ProfileController,
    VehicleController,
    StudentController,
    CategoryController,
    ArticleCrontroller,
    ClassroomController,
    SecretaryController,
    EnrolmentController,
    InstructorController,
    DrivingLessonController,
};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'auth'])->name('login');
Route::get('/login', [LoginController::class, 'index']);

Route::middleware(['web', 'auth'])->group(function () {
    Route::put('/profile/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::put('/profile', [ProfileController::class, 'upate'])->name('profile.upate');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');


    Route::resource('students', StudentController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('articles', ArticleCrontroller::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('enrolments', EnrolmentController::class);
    Route::resource('classrooms', ClassroomController::class);
    Route::resource('secretaries', SecretaryController::class);
    Route::resource('instructors', InstructorController::class);
    Route::resource('driving_lessons', DrivingLessonController::class);
});


