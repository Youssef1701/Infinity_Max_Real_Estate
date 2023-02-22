<?php

use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\BookStayController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [AccommodationController::class, 'index'])->name('accommodation.index');
Route::get('/accommodation/{accommodation}', [AccommodationController::class, 'show'])->name('accommodation.show');
Route::get('/accommodation/{accommodation}/calculate-price', [AccommodationController::class, 'calculatePrice'])->name('accommodations.price');
Route::get('/book/stay/{accommodation}', [BookStayController::class, 'checkout'])->name('book.stay');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return Inertia::render('Dashboard');
//     })->name('dashboard');
// });


