@extends('layouts.default')
@section('title', 'Shopping Review')
@section('css')
<link rel="stylesheet" href="{{ asset('css/createReview.css') }}">
@endsection
@section('content')
@if ($errors->any())
  <ul class = "errorMessages">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif
<div class = 'content'>
  <div class = 'productSpace'>
    <div class = 'productImage'>
      <img src = "{{ $productDetail->image }}" height = "150px" width = "150px">
    </div>
    <div class = 'productName'>
      <p>{{ $productDetail->name }}</p>
    </div>
  </div>
  <form action="{{ url('/createReview/postConfirm') }}" method="POST">
  @csrf
  <div class = 'reviewSpace'>
    <p class='writeMessage'>ここにレビューを記入してください。</p>
    <textarea name="review" cols="50" rows="10" placeholder="レビューを入力" class="reviewArea" value="{{old('comment')}}"></textarea>
  </div>
  <input type="hidden" name="productId" value="{{ $productDetail->id }}">
  <div class='btnSpace'>
    <input type="submit" class="postBtn" value="投稿する">
  </div>
  </form>
</div>
@endsection