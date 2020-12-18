<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseSectionController;
use App\Http\Controllers\CoursePageController;
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

Auth::routes();

Route::get('/', [DashboardController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/dash')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});

Route::prefix('/courses')->group(function() {
    Route::get('/view/{id}/{slug}', [CourseController::class, 'show'])->name('courses.show');
});
Route::resource('courses', CourseController::class)->only([
    'index'
]);
Route::post('/courses/take', [UsersAndCoursesController::class, 'store'])->name('courses.take');
Route::resource('courses.sections.pages', CoursePageController::class)->only([
    'show'
]);


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['admin']], function () {
    Route::resource('courses', CourseController::class)->only([
        'create', 'store', 'edit', 'update', 'destroy'
    ]);
    Route::resource('courses.sections', CourseSectionController::class)->only([
        'store', 'edit', 'update', 'destroy'
    ]);
    Route::post('courses/sections/update-order', [CourseSectionController::class, 'updateOrder'])->name('courses.sections.updateOrder');
    Route::resource('courses.sections.pages', CoursePageController::class)->only([
        'store', 'edit', 'update', 'destroy'
    ]);
    Route::post('courses/sections/pages/update-order', [CoursePageController::class, 'updateOrder'])->name('courses.sections.pages.updateOrder');
});