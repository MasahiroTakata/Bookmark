@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ブックマーク詳細</div>
                  <div class="card-body">
                    <table class="table">
                      <tr>
                        <th class="w-25">タイトル</th>
                        <th>{{ $bookmark->title }}</th>
                      </tr>
                      <tr>
                        <th>URL</th>
                        <th><a href="{{ $bookmark->url }}">{{ $bookmark->url }}</a></th>
                      </tr>
                      <tr>
                        <th>概要</th>
                        <th>{{ $bookmark->description }}</th>
                      </tr>
                      <tr>
                        <th>作成日</th>
                        <th>{{ $bookmark->created_at->format('Y年m月d日') }}</th>
                      </tr>
                    </table>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
