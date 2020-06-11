<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Custmer;
use IlluminateDatabaseEloquentModel;

class CustmerController extends Controller
{
    public function index (){ // 会員登録画面の表示
        return view('register');
    }

    // 登録時のバリデーション
    public function confirm (Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:custmers,email',
            'password' => 'required|string|min:8',
            'address1' => 'required|string|max:255',
            'address2' => 'required|string|max:255',
        ]);

        $custmerInfo = new Custmer($request->all());
        return view('confirm', compact('custmerInfo')); // compactメソッドで、配列をビューに渡せる
    }

    // 押されたボタンで呼び出すをメソッドを分ける
    public function custmerConfirm(Request $request){
        $action = $request->get('action', '登録する');
        $input = $request->except('action');

        if($action == '登録する'){
            return $this->complete($request); // 登録処理へ
        } else{
            return redirect()->action('CustmerController@index')->withInput($input); // 値を保持したまま、登録画面へ戻る。
        }
    }

    // カスタマー登録
    public function complete (Request $request){
        $custmerRegister = new Custmer();
        $custmerRegister->name = $request->name; // フィールドを指定して、追加する
        $custmerRegister->email = $request->email;
        $custmerRegister->address1 = $request->address1;
        $custmerRegister->address2 = $request->address2;
        $custmerRegister->password = $request->password;
        $custmerRegister->save();

        session()->put(['custmerId' => $custmerRegister->id, 'custmerName' => $custmerRegister->name]); // セッションに保存する。
        $s_name = session()->get('custmerName');
        return view('complete', ['loginUser' => $s_name]); // ユーザ登録完了画面へ
    }

    public function login (){
        return view('login');
    }

    public function logincomplete (Request $request){
        $this->validate($request,[ // バリデーション
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8'
        ]);

        $custmerCheck = new Custmer();
        $custmerCheck = Custmer::where('email',$request->input('email'))->where('password',$request->input('password'))->exists(); // ユーザが存在するかどうかのチェック

        if($custmerCheck){
            $custmerInfo = Custmer::where('email',$request->input('email'))->where('password',$request->input('password'))->pluck("name","id");

            foreach( $custmerInfo as $key => $value ){
                session()->put(['custmerId' => $key, 'custmerName' => $value]);
                //session()->flush();
                $s_name = session()->get('custmerName');
            }

            $custmerCart = session()->all(); // カート情報を取得

            if(isset($custmerCart["cart"])){
                return view('logincomplete', ['loginUser' => $s_name, 'cart' => $custmerCart["cart"]]);
            } else{
                return view('logincomplete', ['loginUser' => $s_name]);
            }
        } else{
            return redirect()->back(); // ログイン画面に戻る
        }
    }

    public function logout (){
        session()->flush();
        return view('logout');
    }
}