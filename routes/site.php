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

Auth::routes();

// Route::group(['middleware' => ['guest']], function () {

//     Route::get('/', function () {
//         return view('auth.login');
//     });

// });

//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () {

        //==============================Welcome============================
        Route::get('/home', 'site\allController@home')->name('home');
        Route::get('/aboutUs', 'site\allController@aboutUs')->name('aboutUs');
        Route::any('/products/{id}', 'site\allController@products')->name('products');
        //sidebar products name view
        // Route::get('/products', 'site\allController@products')->name('products');

        Route::get('/galaries', 'site\allController@galaries')->name('galaries');
        Route::get('/contactUs', 'site\allController@contactUs')->name('contactUs');

    });
