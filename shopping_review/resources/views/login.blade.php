@extends('layouts.default')
@section('title', 'Shopping Review')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection
@section('content')
@if(count($errors) >0)
<ul class = "errorMessages">
  @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
</ul>
@endif
<form action="{{ url('/custmers/logincomplete') }}" method="post">
  {{ csrf_field() }}
  <div class="form-group">
    <table>
      <tr>
        <th>E-Mail</th>
        <td><input type="text" id="email" name="email" class="txtBox" value="{{old('email')}}"></td>
      </tr>
      <tr>
        <th>Password</th>
        <td><input type="password" id="password" name="password" class="txtBox"></td>
      </tr>
    </table>
  </div>
  <div class="btnSpace">
    <input type="submit" class="btn-success" value="ログイン">
  </div>
</form>
@endsection