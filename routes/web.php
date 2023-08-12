<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Route::get('/menus/{slug?}', 'HomeController@menus')->name('menus');
Route::get('/menus/{slug}/{id}', 'HomeController@menus_detail')->name('menus.detail');

Route::get('/cart/floating-cart', 'CartController@floating')->name('cart.floating');
Route::get('/cart/{slug}', 'CartController@index')->name('cart');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/orders', 'OrderController@index')->name('orders');
Route::get('/orders/{code}/details', 'OrderController@show')->name('orders.details');

Route::resource('category', CategoryController::class, ['except' => ['store', 'update', 'destroy']]);

Route::post('menu/media', [ProductController::class, 'storeMedia'])->name('menu.storeMedia');
Route::resource('menu', MenuController::class, ['except' => ['store', 'update', 'destroy']]);
Route::resource('banner', BannerController::class, ['except' => ['store', 'update', 'destroy']]);

require __DIR__.'/auth.php';
