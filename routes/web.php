<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/courses', [CourseController::class, 'index'])->name('courses.index');

    Route::middleware([Admin::class])->group(function () {
        Route::get('/dashboard/courses/create', [CourseController::class, 'create'])->name('courses.create');
        Route::post('/dashboard/courses', [CourseController::class, 'store'])->name('courses.store');
        Route::get('/dashboard/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
        Route::put('/dashboard/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
        Route::delete('/dashboard/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');

        Route::get('/dashboard/courses/{course}/lessons/create', [LessonController::class, 'create'])->name('courses.lessons.create');
        Route::post('/dashboard/courses/{course}/lessons', [LessonController::class, 'store'])->name('courses.lessons.store');
        Route::get('/dashboard/courses/{course}/lessons/{lesson}/edit', [LessonController::class, 'edit'])->name('courses.lessons.edit');
        Route::put('/dashboard/courses/{course}/lessons/{lesson}', [LessonController::class, 'update'])->name('courses.lessons.update');
    });

    Route::get('/dashboard/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/dashboard/courses/{course}/lessons/{lesson}', [LessonController::class, 'show'])->name('courses.lessons.show');
});

Route::get('/courses', [CourseController::class, 'publicIndex'])->name('courses.publicIndex');
Route::get('/courses/{course}/thumbnail', [CourseController::class, 'showThumbnail'])->name('courses.thumbnail.show');

require __DIR__.'/auth.php';
