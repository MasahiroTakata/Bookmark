<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Custmer;
use App\Comment;
use IlluminateDatabaseEloquentModel;

class ReviewController extends Controller
{
    public function index (Request $request){
        $productDetail = Product::findOrFail($request->productId); // 見つからなかったら例外を返す処理を行ってくれる

        return view('createReview', [
            'productDetail' => $productDetail,
        ]);
    }

    // バリデーションのメソッドを用意する
    public function postConfirm (Request $request){
        $this->validate($request, [
            'review' => 'required|min:8|max:255',
        ]);

        $custmerInfo = session()->all();

        if(isset($custmerInfo["custmerId"])){
            $saveComment = new Comment();
            $saveComment->product_id = $request->productId;
            $saveComment->custmer_id = $custmerInfo["custmerId"];
            $saveComment->comment = $request->review; // フィールドを指定して、追加する
            $saveComment->save();
        } else{
            return redirect('/custmers/login');
        }

        return redirect('/');
    }
}