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

// Route::get('/', function () { // 初期画面表示
//     return view('welcome');
// });

// Route::get('bookmarks', 'BookmarkController@index'); // 一覧
// Route::get('bookmarks/{bookmark}', 'BookmarkController@show') ->name('bookmarks.show'); // 詳細
// Route::post('bookmarks', 'BookmarkControllelr@store'); // 追加
Auth::routes(); // ユーザ認証ページ

Route::group(['middleware' => 'auth'], function () { // ログイン制御をかける
  Route::get('/', 'BookmarkController@index');
  Route::resource('bookmarks', 'BookmarkController'); // resourceメソッドで、CRUD全ての処理を呼び出せる
  Route::resource('tags', 'TagController');
});

Route::get('/tagBookmarks/{tag_id}', 'BookmarkController@tagToBookmarks'); // タグに紐づくブックマークを一覧表示する

// Route::resource('bookmarks', 'BookmarkController'); // CRUD処理のルーティングを呼び出せる
// Route::get('/test', function () { // 初期画面表示
//     return 'test';
// });

// Route::get('/test/{id}', function($id){
//     return $id;
// }) -> where('id', '[0-9]+'); // whereメソッドで、許可する文字の設定（この場合は半角数字のみ）

// Route::get('/home', 'HomeController@index')->name('home');
