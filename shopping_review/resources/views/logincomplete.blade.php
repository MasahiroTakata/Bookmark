@extends('layouts.default')
@section('title', 'Shopping Review')
@section('css')
<link rel="stylesheet" href="{{ asset('css/login-complete.css') }}">
@section('content')
  @csrf
  <div class = "loginMessage">
    <label>ログインしました。</label><br><br>
    <label>こんにちは！！
    @if(isset($loginUser))
    {{$loginUser}}
    @endif
    さん
    </label><br><br>
  </div>
  <div class = "btns">
    <a href = "{{ action('ShoppingController@index') }}" class = "links">買い物を続ける</a>
    @if(isset($cart))
      <a href = "{{ action('BuyingController@index') }}" class = "links">購入手続きへ</a>
    @endif
  </div>
@endsection