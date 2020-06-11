@extends('layouts.default')
@section('title', 'Shopping Review')
@section('css')
<link rel="stylesheet" href="{{ asset('css/logout.css') }}">
@section('content')
  @csrf
  <div class = "logout">
    <label>ありがとうございました。</label><br><br>
    <label>ログアウトが完了しました。</label>
  </div>
  <div class = "backBtn">
    <a href = "{{ action('ShoppingController@index') }}">買い物を続ける</a>
  </div>
@endsection