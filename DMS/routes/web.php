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

Route::post('/home/add', [App\Http\Controllers\HomeController::class, 'add'])->name('addProduct');

Route::get('/home/{id}/delete', [App\Http\Controllers\HomeController::class, 'delete'])->name('deleteProduct');

Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');

Route::post('/categories/add', [App\Http\Controllers\CategoryController::class, 'add'])->name('addCategory');

Route::get('/categories/{id}/delete', [App\Http\Controllers\CategoryController::class, 'delete'])->name('deleteCategory');