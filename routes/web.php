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
    return view('denuncia');
});

Route::get('/activos', function () {
    return view('activos');
})->name('activos')->middleware('auth');

Route::get('/inactivos', function () {
    return view('inactivos');
})->name('inactivos')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::apiResource('/denuncia','DenunciaController');
