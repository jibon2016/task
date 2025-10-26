<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('courses', CoursesController::class )->except('show');
    Route::get('datatable/course', [CoursesController::class, 'dataTable'])->name('course.datatable');




    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('migrate-fresh', function () {
    \Artisan::call('migrate:fresh', ['--seed' => true]);
    return 'Database migrated fresh and seeded.';
});

Route::get('clear-cache', function () {
    \Artisan::call('cache:clear');
    \Artisan::call('config:clear');
    \Artisan::call('config:cache');
    \Artisan::call('view:clear');
    return 'Application cache cleared.';
});
