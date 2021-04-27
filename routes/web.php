<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicAccess;
use App\Http\Controllers\CalendarController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('/properties', PropertyController::class);

Route::resource('/offers', OfferController::class);

Route::resource('/appointments', AppointmentController::class);

Route::resource('/users', UserController::class);

Route::resource('/roles', RoleController::class);

Route::resource('/', PublicAccess::class);

Route::resource('/calendars', CalendarController::class);

Route::get('/about', function() {
    return view('publicacess.about');
});
