<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use IlluminateDatabaseEloquentModel;

class UsersController extends Controller
{
    public function index (){ // ユーザ登録画面の表示
        return view('register');
    }

    public function confirm (Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'address1' => 'required|string|max:255',
            'address2' => 'required|string|max:255',
        ]);

        $userInfo = new User($request->all());
        return view('confirm', compact('userInfo')); // compactメソッドで、配列をビューに渡せる
    }

    // 押されたボタンで呼び出すをメソッドを分ける
    public function userConfirm(Request $request){
        $action = $request->get('action', '登録する');
        $input = $request->except('action');

        if($action == '登録する'){
            return $this->complete($request); // 登録処理へ
        } else{
            return redirect()->action('UsersController@index')->withInput($input); // 値を保持したまま、登録画面へ戻る。
        }
    }
    // ユーザー新規登録
    public function complete (Request $request){
        $userRegister = new User();
        $userRegister->name = $request->name; // フィールドを指定して、追加する
        $userRegister->email = $request->email;
        $userRegister->address1 = $request->address1;
        $userRegister->address2 = $request->address2;
        $userRegister->password = $request->password;
        $userRegister->save();

        session()->put(['userId' => $userRegister->id, 'userName' => $userRegister->name]); // セッションに保存する。
        $s_name = session()->get('userName');
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

        $userCheck = new User();
        $userCheck = User::where('email',$request->input('email'))->where('password',$request->input('password'))->exists(); // ユーザが存在するかどうかのチェック

        if($userCheck){
            $userInfo = User::where('email',$request->input('email'))->where('password',$request->input('password'))->pluck("name","id");

            foreach( $userInfo as $key => $value ){
                session()->put(['userId' => $key, 'userName' => $value]);
                //session()->flush();
                $s_name = session()->get('userName');
            }

            $userCart = session()->all(); // カート情報を取得

            if(isset($userCart["cart"])){
                return view('logincomplete', ['loginUser' => $s_name, 'cart' => $userCart["cart"]]);
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
