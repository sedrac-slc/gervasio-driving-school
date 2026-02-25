<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    LoginController,
    LessonController,
    ProfileController,
    PaymentController,
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

    Route::resource('lessons', LessonController::class);
    Route::resource('students', StudentController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('articles', ArticleCrontroller::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('enrolments', EnrolmentController::class);
    Route::resource('classrooms', ClassroomController::class);
    Route::resource('secretaries', SecretaryController::class);
    Route::resource('instructors', InstructorController::class);
    Route::resource('driving_lessons', DrivingLessonController::class);


    Route::post('lessons-search', [LessonController::class, 'search'])->name('lessons.search');
    Route::post('vehicles-search', [VehicleController::class, 'search'])->name('vehicles.search');
    Route::post('payments-search', [PaymentController::class, 'search'])->name('payments.search');
    Route::post('students-search', [StudentController::class, 'search'])->name('students.search');
    Route::post('articles-search', [ArticleCrontroller::class, 'search'])->name('articles.search');
    Route::post('categories-search', [CategoryController::class, 'search'])->name('categories.search');
    Route::post('enrolments-search', [EnrolmentController::class, 'search'])->name('enrolments.search');
    Route::post('classrooms-search', [ClassroomController::class, 'search'])->name('classrooms.search');
    Route::post('secretaries-search', [SecretaryController::class, 'search'])->name('secretaries.search');
    Route::post('instructors-search', [InstructorController::class, 'search'])->name('instructors.search');

    Route::get('students-search-input', [StudentController::class, 'searchInput'])->name('students.search-input');
    Route::get('enrolments-search-input', [EnrolmentController::class, 'searchInput'])->name('enrolments.search-input');
});


