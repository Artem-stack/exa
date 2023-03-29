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

Route::get('/admin', [App\Http\Controllers\Admin\AdminUserController::class, 'index'])->middleware('admin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\ProjectController::class, 'index'])->name('home');
Route::resource('project', \App\Http\Controllers\ProjectController::class);
Route::resource('task', \App\Http\Controllers\TaskController::class);

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

