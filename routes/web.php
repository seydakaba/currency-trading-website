<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExchangeRateController;
use App\Http\Controllers\CurrencyPurchaseController;
use App\Http\Controllers\dboperations;
use App\Models\Account;
use App\Models\ExchangeRate;


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

Route::get('/wallet', function () {
    return view('wallet');
})->name('wallet');

Route::get('/uploadbalance', function () {
    return view('uploadbalance');
})->name('uploadbalance');



Route::post('/register',[App\Http\Controllers\dboperations::class,'register']);
Route::post('/login', [App\Http\Controllers\dboperations::class,'accessControl'])->name('access');
Route::get('/cikisyap',[App\Http\Controllers\dboperations::class,'logOut'])->name('logOut');
Route::get('/user/profile', [App\Http\Controllers\UserController::class, 'UserInfo'])->name('UserInfo');
Route::post('/profile/update/{id}', [App\Http\Controllers\UserController::class,'update'])->name('profile.update');

Route::post('/creditCard',[App\Http\Controllers\CreditCard_Controller::class,'store'])->name('addCard');

Route::get('/', [ExchangeRateController::class, 'getExchangeRates']);
Route::get('/stock-news', 'App\Http\Controllers\NewsController@getStockNews');
Route::get('/deneme', 'App\Http\Controllers\NewsController@getStockNews');
#Route::post('/currency-purchase', [App\Http\Controllers\ExchangeRatesController::class, 'buyCurrency'])->name('exchange.buy');
#Route::get('/currency-purchase', 'App\Http\Controllers\ExchangeRateController@buyCurrency');

Route::get('/currency-purchase', [CurrencyPurchaseController::class, 'showCurrencyPurchaseForm'])->name('currency-purchase-form');
Route::post('/currency-purchase', [CurrencyPurchaseController::class, 'buyCurrency'])->name('currency-purchase');


Route::post('/', [App\Http\Controllers\ExchangeRateController::class, 'convertCurrency'])->name('convertCurrency');

Route::get('/wallet', 'App\Http\Controllers\wallet@WalletInformation')->name('balance');

Route::get('/uploadbalance', 'App\Http\Controllers\addBalance@creditCards')->name('creditCards');
Route::post('/uploadbalance', 'App\Http\Controllers\addBalance@uploadBalance')->name('uploadBalance');


