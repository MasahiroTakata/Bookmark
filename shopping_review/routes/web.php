<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; // POST送信する際に必要

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

Route::get('/shopping', 'ShoppingController@index'); // 商品一覧
Route::get('/shopping/{id}', 'ShoppingController@show'); // 商品詳細
Route::post('/shopping/cart', 'ShoppingController@cart'); // カートに入れた時