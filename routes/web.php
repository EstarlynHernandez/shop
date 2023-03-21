<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\CartController;

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

// Home
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index']);

// Product
Route::get('/search', [ProductController::class, 'search'])->name('product.search');
Route::resource('/product', ProductController::class);

// Cart
Route::get('/thanks/cart/{id}', [CartController::class, 'thanks'])->name('cart.thanks');
Route::resource('cart', CartController::class)->middleware('auth');

// Order
Route::controller(OrderController::class)->group(function(){
    Route::get('/thanks/order', 'thanks')->name('order.thanks')->middleware(('auth'));
});
Route::resource('order', OrderController::class);

// User
Route::controller(UserController::class)->group(function (){
    Route::get('/login', 'login')->name('user.login');
    Route::post('/login', 'auth')->name('user.auth');
    Route::get('/user/wallet', 'wallet')->name('user.wallet')->middleware('auth');
    Route::post('/user/wallet', 'recharge')->name('user.recharge')->middleware('auth');
    Route::get('/user/address', 'address')->name('user.address')->middleware('auth');
    Route::post('/user/address', 'storeAddress')->name('user.storeAddress')->middleware('auth');
    Route::delete('/loggout', 'loggout')->name('user.loggout');
});
Route::resource('/user', UserController::class);


// support
Route::controller(SupportController::class)->group(function(){
    Route::get('/questions', 'questions')->name('questions');
    Route::get('/privacy', 'privacy')->name('privacy');
    Route::get('/contact', 'contact')->name('contact');
});
