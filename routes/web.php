<?php

use Illuminate\Support\Facades\Route;
<<<<<<< Updated upstream
=======
use App\Http\Controllers\ExchangeRateController;
use App\Http\Controllers\dboperations;
>>>>>>> Stashed changes
use App\Http\Controllers\dboperations;

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

Route::get('/', function () {
<<<<<<< Updated upstream
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/user/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/creditCard', function () {
    return view('creditCard');
})->name('creditCard');


Route::post('/register',[App\Http\Controllers\dboperations::class,'register']);
Route::post('/login', [App\Http\Controllers\dboperations::class,'accessControl'])->name('access');
Route::get('/cikisyap',[App\Http\Controllers\dboperations::class,'logOut'])->name('logOut');
Route::get('/user/profile', [App\Http\Controllers\UserController::class, 'UserInfo'])->name('UserInfo');
Route::post('/profile/update/{id}', [App\Http\Controllers\UserController::class,'update'])->name('profile.update');

Route::post('/creditCard',[App\Http\Controllers\CreditCard_Controller::class,'store'])->name('addCard');


=======
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/user/profile', function () {
    return view('profile');
})->name('profile');


Route::get('/exchange-rates', [ExchangeRateController::class, 'getExchangeRates']);


Route::post('/register',[App\Http\Controllers\dboperations::class,'register']);
Route::post('/login', [App\Http\Controllers\dboperations::class,'accessControl'])->name('access');
Route::get('/cikisyap',[App\Http\Controllers\dboperations::class,'logOut'])->name('logOut');
Route::get('/user/profile', [App\Http\Controllers\UserController::class, 'UserInfo'])->name('UserInfo');
Route::post('/profile/update/{id}', [App\Http\Controllers\UserController::class,'update'])->name('profile.update');


>>>>>>> Stashed changes
