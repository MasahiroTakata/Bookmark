@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ブックマーク一覧</div>
                  <div class="card-body">
                    <div class="mb-3">
                      <a href="{{ route('bookmarks.create') }}" class="btn btn-primary">新規登録</a>
                    </div>
                    <table>
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>タイトル</th>
                          <th>アクション</th>
                        </tr>
                      </thead>
                      @foreach($bookmarks as $bookmark)
                        <tr>
                          <td>{{ $bookmark->id }}</td>
                          <td><a href="{{ $bookmark->url }}">{{ $bookmark->title }}</a></td>
                          <td><a href="{{ route('bookmarks.show', $bookmark) }}" class="btn btn-secondary btn-sm">表示</a></td>
                          <td><a href="{{ route('bookmarks.edit', $bookmark) }}" class="btn btn-secondary btn-sm">編集</a></td>
                        </tr>
                      @endforeach
                    </table>
                    {{ $bookmarks->links() }}
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
