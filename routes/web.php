<?php

use App\Http\Controllers\PersonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    //People routes
    Route::get('people/view', [PersonController::class, 'index'])->name('view');
    Route::post('people/store', [PersonController::class, 'store'])->name('person.store');
    Route::get('people/edit/{person}', [PersonController::class, 'edit'])->name('person.edit');
    Route::patch('people/update/{person}', [PersonController::class, 'update'])->name('person.update');
    Route::get('people/delete/{person}', [PersonController::class, 'destroy'])->name('person.delete');
});
