<?php

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/all/category', [CategoryController::class, 'index'])->name('AllCat');