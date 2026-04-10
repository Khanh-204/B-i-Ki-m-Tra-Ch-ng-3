<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\EnrollmentController;

// Đảm bảo dòng này tồn tại
Route::resource('courses', CourseController::class);

// Route cho Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Thêm các resource route cho Lesson và Enrollment [cite: 144, 145]
Route::resource('lessons', LessonController::class);
Route::resource('enrollments', EnrollmentController::class);