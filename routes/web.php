<?php

use App\Mail\Sendmail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CarbonController;
use App\Http\Controllers\PasswordResetController;

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

Route::get('home', [CarbonController::class, 'index']);
// Rout::get('home', [CarbonController::class, 'show']);



Route::name('admin.')->middleware(['guest'])->group(function () {

    Route::controller(LoginController::class)->group(function () {
        Route::get('/', 'index')->name('login.form');
        Route::post('/', 'authenticate')->name('login');
    });

    Route::controller(PasswordResetController::class)->group(function () {
        Route::get('/forgot/password', 'index')->name('forgot.password.form');
        Route::post('/forgot/password', 'passwordresetlink')->name('forgot.password');
        Route::get('/reset/password/{token}', 'passwordresetform')->name('reset.password.form');
        Route::post('/reset/password/', 'passwordreset')->name('reset.password');
    });
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'preventback'])->group(function () {

    Route::view('/dashboard', 'auth.dashboard')->name('dashboard');
    Route::controller(AdminController::class)->group(function () {
        Route::post('/logout', 'logout')->name('logout');
    });
});




// Route::get('/mail', function () {
//     $email = 'nayem@gmail.com';
//     $data = [
//         'name' => 'Nayem islam',
//         'pro' => 'codder'
//     ];
//     Mail::to($email)->send(new Sendmail($data));
// });

// route::get('/home', function () {
//     return 'home';
// });

// Route::view('/home', 'welcome');
// route::redirect('/', '/home');
