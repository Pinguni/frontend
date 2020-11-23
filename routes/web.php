<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CoursesController;

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

Route::prefix('/courses')->group(function() {
    Route::get('/', [CoursesController::class, 'index']);
    Route::get('/{id}/{permalink}', [CoursesController::class, 'course']);
});