@extends('layouts.default')
@section('title', 'Shopping Review 商品情報')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="{{ asset('js/show.js') }}"></script>
@section('content')
<form action="{{ url('/shopping/userSelect') }}" method="post">
{{ csrf_field() }}
  <div class = "detail_box">
    <img src = "{{ $productDetail->image }}" height = "300px" width = "300px">
    <ul class = "productDetail">
      <li class = "detailList">商品ID：{{ $productDetail->id }}</li>
      <input type="hidden" name="hiddenProductId" value="{{ $productDetail->id }}">
      <li class = "detailList">カテゴリー：{{ $productDetail->category->name}}</li>
      <li class = "detailList">商品名：{{ $productDetail->name }}</li>
      <li class = "detailList">価格：{{ $productDetail->price }} 円</li>
      @if ($productDetail->delete_flg === 0)
        <li class = "detailList"><h3 id = "delete_no">在庫：あり</h3></li>
        <li class = "detailList">数量：<select name = "quantity">
        @for($i = 1; $i < 31; $i++)
          <option value="{{ $i }}" name = "number">{{ $i }}</option>
        @endfor
        </select>
        </li>
        <div class="selectBtns">
          <li class = "detailList"><input type="submit" class="btns" name="action" value="カートに入れる"></li>
          <li class = "detailList"><input type="submit" class="btns" id="writeComment" name="action" value="レビューを書く"></li>
        </div>
      @else
        <li class = "detailList"><h3 id = "delete_yes">在庫切れです</h3></li>
      @endif
    </ul>
  </div>
  <div class="commentSpace">
    @if($productComments->count() == 0)
      <p>現在、コメントはありません。</p>
    @else
      @foreach ($productComments as $comment)
        <div class="commentBox">
          <div class="custmerInfo">
            <label class="custmerName">{{ $comment->custmer->name }}</label>
            <label class="createdDate">（{{$comment->created_at}}）</label>
          </div>
          <p class="custmerComment">{{ $comment->comment }}</p>
        </div>
      @endforeach
    @endif

  </div>
  <div class="relatedProducts">
    <p>【 関連商品 】</p>
    @foreach ($categoryProducts as $product)
      <a href="{{ action('ShoppingController@show', $product->id) }}" class="a_relatedProduct"><img src="{{ $product->image }}" height="150px" width="150px"></a>
    @endforeach
  </div>
</form>
@endsection