@extends('layouts.default')
@section('title', '購入手続き')
@section('css')
<link rel="stylesheet" href="{{ asset('css/buyingConfirm.css') }}">
@endsection
@section('content')
  {{ csrf_field() }}
  @if (isset ($loginuser))
  <div class = "userInfo">
    <div class = "userAdd">
      <p>以下の住所へ送付します。よろしいでしょうか？</p><br>
      <p>氏名：{{$loginuser['name']}}</p><br>
      <p>お届け先住所情報</p><br>
      <p>住所１：{{$loginuser['address1']}}</p>
      <p>住所２：{{$loginuser['address2']}}</p>
    </div>
    <div class = "cartBtn">
      <p>合計金額：{{$sum}}円</p>
      <a href="{{ action('BuyingController@buyingComplete') }}">購入を確定する</a>
      <a href="{{ action('ShoppingController@index') }}" id = "backBuying">買い物に戻る</a>
    </div>
  </div>
  <div class = "cartsInfo">
    @if (isset ($carts))
      @foreach ($carts as $cart)
      <div class = "cart_box">
        <img src="{{ $cart['image'] }}" height="300px" width="300px">
        <ul class = "productDetail">
          <li class = "detailList">商品名：{{$cart['name']}}</li>
          <li class = "detailList">価格：{{$cart['price']}}円</li>
          <li class = "detailList">数量：{{$cart['quantity']}}個</li>
        </ul>
      </div>
      @endforeach
    @endif
  @endif
  </div>
@endsection