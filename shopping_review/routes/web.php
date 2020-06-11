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

Route::get('/', 'ShoppingController@index'); // 商品一覧（初期画面）
Route::get('/shopping/{id}', 'ShoppingController@show'); // 商品詳細
Route::get('/search', 'SearchController@index'); // 検索機能
Route::get('/custmers/register', 'CustmerController@index'); // カスタマー新規登録

Route::get('/custmers/login', 'CustmerController@login'); // ログイン
Route::get('/custmers/logout', 'CustmerController@logout'); // ログアウト
Route::get('/buying/buyComfirm', 'BuyingController@index'); // 購入手続き
Route::get('/buying/buyingComplete', 'BuyingController@buyingComplete'); // 購入完了
Route::get('/cart', 'ShoppingController@cart'); // カートを閲覧
Route::get('/createReview/index', 'ReviewController@index'); // レビューを書く
Route::get('/custmers/confirm', function(){
  return redirect('/custmers/register');
});
Route::get('/custmers/logincomplete', function(){
  return redirect('/');
});
Route::get('/custmers/custmerConfirm', function(){
  return redirect('/');
});

Route::post('/shopping/userSelect', 'ShoppingController@userSelect'); // カートに保存
Route::post('/custmers/confirm', 'CustmerController@confirm'); // ユーザ登録確認画面へ（ユーザ）
Route::post('/custmers/custmerConfirm', 'CustmerController@custmerConfirm'); // 登録完了前の判断
Route::post('/custmers/complete', 'CustmerController@complete'); // ユーザ登録完了（コントローラー内で登録処理を行うのでgetを使う）
Route::post('/custmers/logincomplete', 'CustmerController@logincomplete'); // ログイン完了
Route::post('/createReview/savePost', 'ReviewController@savePost'); // レビューの投稿
Route::post('/createReview/postConfirm', 'ReviewController@postConfirm'); // レビューの投稿