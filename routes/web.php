<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

// You can add a simple redirect for the root path
Route::get('/', function () {
    return redirect()->route('courses.index');
});
Route::resource('courses', CourseController::class);