@extends('layouts.default')
@section('title', 'Shopping Review')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection
@section('content')
<div class = 'content'>
  <ul class='products'>
    @if (isset ($products))
      @foreach ($products as $product)
        <li class='productImage'>
        <a href="{{ action('ShoppingController@show', $product->id) }}"><img src="{{ $product->image }}" height="300px" width="300px"></a>
        </li>
      @endforeach
    @endif
  </ul>
</div>
@endsection