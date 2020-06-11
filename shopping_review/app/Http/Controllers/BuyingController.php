<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buying;
use App\Product;
use App\Order;
use App\Custmer;

class BuyingController extends Controller
{
    public function index (){
        $custmerCarts = session()->all(); // 保存したデータを全取得
        $carts = array();
        $sum = 0; // 合計金額

        // 購入手続き画面に遷移する前に、セッションにユーザ情報があるか確認
        if(!isset($custmerCarts['custmerId'])){
            return view('login');
        }

        foreach ($custmerCarts['cart'] as $key => $value){
            $productInfomation = array();
            $productDetail = Product::findOrFail($key);

            $productInfomation = array(
                'productId'=>$key,
                'name'=>$productDetail['name'],
                'price'=>$productDetail['price'],
                'image'=>$productDetail['image'],
                'quantity'=>$value
            );

            $pQuantity = $productDetail['price'] * $value;
            $sum += $pQuantity;
            array_push($carts, $productInfomation);
        }

        $custmerDetail = Custmer::findOrFail($custmerCarts['custmerId']);

        return view('buyingConfirm', [
            'carts' => $carts,
            'loginuser' => $custmerDetail,
            'sum' => $sum,
        ]);
    }

    // 購入完了
    public function buyingComplete (){
        $custmerCarts = session()->all();
        $custmerId = $custmerCarts['custmerId'];

        // セッションにカート情報が保存されているか確認(リロード対応)
        if (!isset($custmerCarts['cart'])){
            return redirect('/'); // 一覧画面へ遷移させる
        }

        foreach ($custmerCarts['cart'] as $key => $value){
            $newOrder = new Order();
            $newOrder->custmer_id = $custmerId;
            $newOrder->product_id = $key;
            $newOrder->quantity = $value;
            $newOrder->save();
        }

        session()->forget('cart'); // カートの情報のみ削除する

        return view('buyingComplete');
    }
}