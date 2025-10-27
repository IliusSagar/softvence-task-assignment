<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;


Route::get('/', [CourseController::class, 'create'])->name('course.create');
Route::post('/courses/store', [CourseController::class, 'store'])->name('courses.store');


