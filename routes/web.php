<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;


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

Route::get('/', 'HomeController@index');

/*
Route::get('/', function () {
//    return \Illuminate\Support\Facades\Redirect::to('http://app.azzgo.it');
});
*/

Route::get('/forgot-password', 'ForgotController@forgotpassword')->middleware('guest')->name('password.request');

Route::post('/forgot-password', 'ForgotController@forgotpasswordstore')->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', 'ForgotController@resetpassword')->middleware('guest')->name('password.reset');

Route::post('/reset-password', 'ForgotController@resetpasswordstore')->middleware('guest')->name('password.update');



