<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectviewController;


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
    return view('auth.login');
});
Route::resource('projects', ProjectController::class);
Route::get('display',[ProjectviewController::class,"show"]);
Route::get('contact',[ContactController::class,"show"]);
// Route::get('register',[AdminController::class,"register"]);
// Route::get('login',[AdminController::class,"login"]);






Route::get('/dashboard', function () {
    return view('pages.dashboard');
});
// Route::get('/add', function () {
//     return view('pages.Project_Add');
// });
// Route::get('/edit', function () {
//     return view('pages.Project_Edit');
// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

