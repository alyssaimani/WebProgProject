<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;

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
    return view('home', [
        'title' => 'Home'
    ]);
});

Route::get('/login', [LoginController::class, 'open'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'open'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);

Route::resource('/product', ProductController::class)->middleware('auth');


Route::get('/about', function () {
    return view('about',[
        'title' => 'About Us'
    ]);
});

Route::get('/home_customer', function () {
    return view('home_customer');
});