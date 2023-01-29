<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ModernController;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ElectricController;
use App\Http\Controllers\ElectronicController;

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

define('PAGINATION_COUNT', 8);
Route::get('/', [StaticController::class, 'index']) -> name('home.index');
Route::get('/search', [StaticController::class, 'search']) -> name('home.search');
Route::get('/login', [LoginController::class, 'login'])->middleware("guest") -> name('home.login');
Route::get('/register', [LoginController::class, 'register'])->middleware("guest") -> name('home.register');

Route::post('/check', [LoginController::class, 'check']) -> name('check');
Route::get('/destroy', [LoginController::class, 'destroy']) -> name('home.destroy');
Route::post('/', [LoginController::class, 'create']) -> name('create');

Route::resource('electrics', ElectricController::class);
Route::resource('electronics', ElectronicController::class);
Route::resource('houses', HouseController::class);
Route::resource('cart', CartController::class);
Route::resource('medicals', MedicalController::class);
Route::resource('moderns', ModernController::class);
Route::resource('contact', ContactController::class);
Route::resource('checkouts', CheckoutController::class);

// Add product to Cart 
Route::post('cart{id}', [CartController::class, 'add']) -> name('add');

// Delete Product From Cart 
Route::get('cart{id}/user{user_id}', [CartController::class, 'remove']) -> name('remove');

Route::post('/checkouts', [CheckoutController::class, 'confirm']) -> name('confirm');

// Route::get('/contact', [ContactController::class, 'show']) -> name('contact.show');
Route::post('/contact', [ContactController::class, 'submit']) -> name('submit');
// Route::view('/cart', "cart");


