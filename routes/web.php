<?php

use App\Http\Controllers\CourseContentController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\Dashboard\MatrialController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['role:admin,teacher', 'web'])->group(function () {
    Route::resource('admin/category', \App\Http\Controllers\Dashboard\CategoryController::class);
    Route::resource('admin/course', \App\Http\Controllers\Dashboard\CourseController::class);
    Route::resource('admin/matrial', MatrialController::class);

    Route::resource('admin/section', \App\Http\Controllers\Dashboard\SectionController::class);

    Route::resource('admin/content', \App\Http\Controllers\Dashboard\CourseContentController::class);
});

Route::middleware(['role:admin', 'web'])->group(function () {
    Route::resource('admin/users', UserController::class);
});

Route::middleware(['web'])->group(function () {

    Route::get('/user/profile', [UserController::class, 'show'])->name('profile');
    Route::get('/home', [\App\Http\Controllers\User\CourseController::class, 'index'])->name('user.course');
    Route::get('show/course/{courseId}', [\App\Http\Controllers\User\CourseController::class, 'showCourse'])->name('user.course.showCourse');
    Route::get('show/videos/{idContent}', [\App\Http\Controllers\User\CourseController::class, 'showVideo'])->name('user.course.showVideo');
    Route::get('user/course/test', [\App\Http\Controllers\User\CourseController::class, 'watchCourse'])->name('user.watch_course');
    Route::post('/courses/{course}/enroll', [\App\Http\Controllers\User\CourseController::class, 'courseEnroll'])->name('course_enroll');
});

Auth::routes();
