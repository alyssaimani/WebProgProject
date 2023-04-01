<?php

use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

use function PHPSTORM_META\map;

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

Route::get('/login', [SessionController::class, "login"]);

Route::post('/register', [SessionController::class, "register"]);

Route::get('/about_us', function () {
    return view('about_us');
});
