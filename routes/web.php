<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index']);
Route::name('admin.')->prefix('admin')->middleware('auth')->middleware('admin')->group(function () {
    Route::resource('tests', 'App\Http\Controllers\Admin\TestController');
    Route::resource('categories', 'App\Http\Controllers\Admin\CategoryController');
    Route::resource('questions', 'App\Http\Controllers\Admin\QuestionController');
});
