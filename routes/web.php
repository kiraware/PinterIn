<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', fn () => view('welcome'))->name('home');
Route::get('/about', fn () => view('about'))->name('about');

Route::get('/courses', [CourseController::class, 'publicIndex'])->name('courses.publicIndex');
Route::get('/courses/{course}/thumbnail', [CourseController::class, 'showThumbnail'])->name('courses.thumbnail.show');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes (auth + verified)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Course & Lesson Routes (for all authenticated users)
    |--------------------------------------------------------------------------
    */
    Route::prefix('dashboard')->group(function () {
        Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
        Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
        Route::get('/courses/{course}/lessons/{lesson}', [LessonController::class, 'show'])->name('courses.lessons.show');
    });

    // Payments
    Route::prefix('dashboard')->group(function () {
        Route::get('/courses/{course}/buy', [PaymentController::class, 'create'])->name('payments.create');
        Route::post('/courses/{course}/buy', [PaymentController::class, 'store'])->name('payments.store');
        Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
        Route::get('/payments/{payment}/payment-proof', [PaymentController::class, 'showPaymentProof'])->name('payments.payment-proof.show');

        Route::middleware([Admin::class])->group(function () {
            Route::patch('/payments/{payment}/status', [PaymentController::class, 'updateStatus'])->name('payments.updateStatus');
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Admin-only Routes (auth + verified + is_admin)
    |--------------------------------------------------------------------------
    */
    Route::middleware([Admin::class])->prefix('dashboard')->group(function () {
        // Courses
        Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
        Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
        Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
        Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
        Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');

        // Lessons
        Route::get('/courses/{course}/lessons/create', [LessonController::class, 'create'])->name('courses.lessons.create');
        Route::post('/courses/{course}/lessons', [LessonController::class, 'store'])->name('courses.lessons.store');
        Route::get('/courses/{course}/lessons/{lesson}/edit', [LessonController::class, 'edit'])->name('courses.lessons.edit');
        Route::put('/courses/{course}/lessons/{lesson}', [LessonController::class, 'update'])->name('courses.lessons.update');

        // Bank
        Route::resource('banks', BankController::class)->except(['show']);
    });
});

require __DIR__.'/auth.php';
