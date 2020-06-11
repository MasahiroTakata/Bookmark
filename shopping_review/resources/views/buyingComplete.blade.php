@extends('layouts.default')
@section('title', 'ご購入ありがとうございます！')
@section('css')
<link rel="stylesheet" href="{{ asset('css/buyingComplete.css') }}">
@endsection
@section('content')
  {{ csrf_field() }}
  <div class = "thankyou">
    <p>お買い上げありがとうございました。</p>
  </div>
  <div class = "backBtn">
    <a href="{{ action('ShoppingController@index') }}">買い物に戻る</a>
  </div>
@endsection