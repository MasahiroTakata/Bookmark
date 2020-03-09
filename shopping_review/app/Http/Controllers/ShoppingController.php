<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shopping; // ここの記載を忘れない
use App\Category; // この記述を書くことで、クラス内では「Category」と書くだけでOK、楽ができる
use App\Product;

class ShoppingController extends Controller
{
    // 商品を一覧表示する
    public function index (){
        $categorys = Category::all(); // 全件抽出
        $products = Product::all();

        // dd($products->ToArray()); // デバッグ用コード（Dump Dieの略らしい）で、この処理以降の処理は行わない
        return view ('index', [
            'categorys' => $categorys,
            'products' => $products,
        ]);
    }

    // 商品の詳細情報を表示
    public function show ($id){
        $productDetail = Product::findOrFail($id); // 見つからなかったら例外を返す処理

        return view('show', ['productDetail' => $productDetail]);
    }

    // カートに保存
    public function cart (Request $request){
        // dd($request->input('hiddenProductId')); // 商品IDを取得
        // dd($request->input('quantity')); // 数量を取得

        // Cart::add($hogeProduct->id, $hogeProduct->name, $qty, $hogeProduct->$price, ['hogeOption' => 'huga'])
        // ->associate(HogeProduct::class);
        return 'カート画面';
    }

}