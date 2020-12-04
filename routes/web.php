<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersAndCoursesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/dash')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});

Route::prefix('/courses')->group(function() {
    Route::get('/view/{id}/{permalink}', [CoursesController::class, 'course'])->name('courses.show');
    //Route::get('/{id}/edit/{field}', [CourseController::class, 'edit'])->name('courses.edit');
});
Route::resource('courses', CourseController::class)->except([
    'show'
]);
Route::post('/courses/take', [UsersAndCoursesController::class, 'store'])->name('courses.take');