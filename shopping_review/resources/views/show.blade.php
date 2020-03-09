@extends('layouts.default')
@section('title', 'Shopping Review 商品情報')
@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')
<form action="{{ url('/shopping/cart') }}" method="post">
{{ csrf_field() }}
  <div class = "detail_box">
    <img src = "{{ $productDetail->image }}" height = "400px" width = "400px">
    <ul>
      <li>商品ID：{{ $productDetail->id }}</li>
      <input type="hidden" name="hiddenProductId" value="{{ $productDetail->id }}">
      <li>カテゴリー：{{ $productDetail->category->name}}</li>
      <li>商品名：{{ $productDetail->name }}</li>
      <li>価格：{{ $productDetail->price }}</li>
      @if ($productDetail->delete_flg === 0)
        <li><h3 id = "delete_no">在庫：あり</h3></li>
        <li>数量：<select name = "quantity">
        @for($i = 1; $i < 31; $i++)
          <option value="{{ $i }}" name = "number">{{ $i }}</option>
        @endfor
        </select>
        </li>
        <li><button type="submit" id="cartIn" name="cartIn">カートに入れる</button></li>
      @else 
        <li><h3 id = "delete_yes">在庫：すみません、ないです。</h3></li>
      @endif
    </ul>
  </div></br>
</form>
@endsection