<?php

use App\Jobs\SendEmail;
use App\Jobs\ProcessPayment;
use App\Jobs\SendWelcomeEmail;
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
    SendEmail::dispatch();
    return view('welcome');
});
