@extends('layouts.default')
@section('title', '検索結果')
@section('css')
<link rel="stylesheet" href="{{ asset('css/imagehover.min.css') }}">
@endsection
@section('content')
「{{$keyword}}」の検索結果
<div class = 'content'>
  @if (isset ($products))
    <ul class='products'>
    @foreach ($products as $product)
    <figure class="imghvr-fade">
        <img src="{{ $product->image }}" height="300px" width="300px">
        <figcaption>
          カテゴリー：{{ $product->category->name }}<br/><br/>
          商品名：{{ $product->name }}<br/><br/>
          価格：{{ $product->price }}円
        </figcaption>
        <a href="{{ action('ShoppingController@show', $product->id) }}"></a>
      </figure>
    @endforeach
    </ul>
    @if(count($products) == 0)
      該当する商品がありませんでした。
    @endif
  @endif
</div>
@endsection