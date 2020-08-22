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
Route::get('/enter', function () {
    return view('auth.login');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/api_login', 'Client\LoginController@login')->name('api_login');
Route::get('/logout', 'Client\LoginController@logout')->name('logout');

Route::group(['middleware' => ['check.token']], function () {
    Route::prefix('shipment')->group(function () {
        Route::get('/', 'Client\ShipmentController@shipment')->name('shipments');
        Route::get('create', function () {
            return view('shipments.create');
        })->name('shipment_create');
        Route::post('store', 'Client\ShipmentController@store')->name('shipment_store');
        Route::get('{id}', 'Client\ShipmentController@show')->name('shipment_show');
        Route::post('{id}', 'Client\ShipmentController@destroy')->name('shipment_delete');
        Route::get('edit/{id}', 'Client\ShipmentController@edit')->name('shipment_edit');
        Route::post('update/{id}', 'Client\ShipmentController@update')->name('shipment_update');
    });
    Route::prefix('item')->group(function () {
        Route::get('create', 'Client\ItemController@create')->name('item_create');
        Route::post('store', 'Client\ItemController@store')->name('item_store');
    });
});

Auth::routes();

