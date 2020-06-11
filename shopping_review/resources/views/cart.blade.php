@extends('layouts.default')
@section('title', 'カートの中身')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection
@section('content')
  @csrf
  {{ csrf_field() }}
  <h2 class="shoppingCart">カートの中身</h2>
  <table>
    <tbody>
      <tr>
        <th>商品情報</th>
        <th></th>
        <th>価格</th>
        <th>数量</th>
        <th>小計</th>
      </tr>
      @if (!empty ($carts))
        @foreach ($carts as $cart)
          <tr>
            <td><img src = "{{ $cart['image'] }}" height="150px" width="150px"></td>
            <td>{{$cart['name']}}</td>
            <td>{{$cart['price']}} 円</td>
            <td>{{$cart['quantity']}} 個</td>
            <td>{{$cart['price'] * $cart['quantity']}} 円</td>
          </tr>
        @endforeach
          <tr class="totalSpace">
            <td colspan="3"></td>
            <td>合計金額：</td>
            <td><h2 class="totalPrice">{{$sum}} 円</h2></td>
          </tr>
    </tbody>
  </table>
  <div class = "menu_box">
    <a href="{{ action('ShoppingController@index') }}" id = "continueBuy">買い物を続ける</a>
    <a href="{{ action('BuyingController@index') }}" id = "buyConfirm">購入手続きへ</a>
  </div>
      @else
        <tr>
          <td colspan="5">
            <p class="blankMessage">カートの中身は空です。</p>
          </td>
        </tr>
    </tbody>
  </table>
    @endif
@endsection