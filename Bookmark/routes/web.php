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

Route::get('/', function () { // 初期画面表示
    return view('welcome');
});

Route::get('bookmarks', 'BookmarkController@index');
// Route::get('/test', function () { // 初期画面表示
//     return 'test';
// });

// Route::get('/test/{id}', function($id){
//     return $id;
// }) -> where('id', '[0-9]+'); // whereメソッドで、許可する文字の設定（この場合は半角数字のみ）
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
