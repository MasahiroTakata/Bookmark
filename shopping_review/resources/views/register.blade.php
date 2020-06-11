@extends('layouts.default')
@section('title', 'Shopping Review')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/register-login.css') }}">
@endsection
@section('content')
@if ($errors->any())
  <ul class = "errorMessages">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif
<form action="{{ url('/custmers/confirm') }}" method="POST">
  @csrf
  <div class="form-group">
    <table>
      <tr>
        <th>名前</th>
        <td><input type="text" name="name" value="{{old('name')}}" class="txtBox"></td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td><input type="text" name="email" value="{{old('email')}}" class="txtBox"></td>
      </tr>
      <tr>
        <th>住所１</th>
        <td><input type="text" name="address1" value="{{old('address1')}}" class="txtBox"></td>
      </tr>
      <tr>
        <th>住所２</th>
        <td><input type="text" name="address2" value="{{old('address2')}}" class="txtBox"></td>
      </tr>
      <tr>
        <th>パスワード</th>
        <td><input type="password" name="password" value="{{old('password')}}" class="txtBox"></td>
      </tr>
    </table>
  </div>
  <div class="btnSpace">
    <input type="submit" class="btn-success" value="確認へ">
  </div>
</form>
@endsection