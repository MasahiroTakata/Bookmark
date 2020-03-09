<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index () { // ローカルスコープを使っている flg （Scopeを省略して呼び出す）
        $runningItems = Todo::flg (1)->get ();
        $doneItems = Todo::flg (0)->get ();
        return view ('todo', [
            'runningItems' => $runningItems,
            'doneItems' => $doneItems,
            ]);
    }

    public function create (Request $request) {
        $this->validate ($request, todo::$rules); // 値のバリデーション。modelの$rulesを呼んでチェックする
        $todo = new Todo;
        $form = $request->all ();
        unset ($form['_token']);
        $form['flg'] = 1;
        // $todo->title = $request['title'] これで一つずつデータベースに格納できる
        $todo->fill ($form)->save (); // データベースへの保存メソッド fillでまとめて格納する
        return redirect ('/todo');
    }

    public function update (Request $request) {
        $todo = Todo::find ($request->id);
        $todo->flg = 0;
        $todo->save ();
        return redirect ('/todo');
    }

    public function delete (Request $request) {
        $todo = Todo::find ($request->id);
        $todo->delete ();
        return redirect ('/todo');
    }
}