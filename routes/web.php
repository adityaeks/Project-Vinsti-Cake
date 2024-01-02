<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('login');
// });


Route::get('/',[LoginController::class, 'index']);

Route::get('register',[RegisterController::class, 'index']);;
Route::post('register',[RegisterController::class, 'store']);;


Route::get('login',[LoginController::class, 'index']);;
Route::post('login',[LoginController::class, 'authenticate']);;

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::resource('/employees', EmployeeController::class);

Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');


// Rute Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Rute Logout
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
