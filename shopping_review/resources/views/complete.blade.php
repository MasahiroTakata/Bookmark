@extends('layouts.default')
@section('title', 'Shopping Review')
@section('css')
<link rel="stylesheet" href="{{ asset('css/register-complete.css') }}">
@section('content')
  @csrf
  <div class = "registeredMessage">
    <label>ありがとうございます。登録しました。</label><br>
    <label>こんにちは！！
  @if (isset ($loginUser))
    {{$loginUser}}さん！
  @endif
    </label>
  </div>
  <div class = "link">
    <a href="{{ action('ShoppingController@index') }}">買い物を続ける</a>
  </div>
@endsection