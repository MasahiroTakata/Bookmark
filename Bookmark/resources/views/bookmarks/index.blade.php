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
                    @include('components.alert')
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>タイトル</th>
                          <th>アクション</th>
                        </tr>
                      </thead>
                      @foreach($bookmarks as $bookmark)
                        <tr>
                          <td class="align-middle">{{ $bookmark->id }}</td>
                          <td class="align-middle"><a href="{{ $bookmark->url }}">{{ $bookmark->title }}</a></td>
                          <td class="align-middle">
                            <div class="d-flex">
                              <a href="{{ route('bookmarks.show', $bookmark) }}" class="btn btn-secondary btn-sm">表示</a>
                              <a href="{{ route('bookmarks.edit', $bookmark) }}" class="btn btn-secondary btn-sm ml-1">編集</a>
                              <form method="POST" action="{{ route('bookmarks.destroy', $bookmark) }}">
                                @method('DELETE')
                                @csrf
                                <button onclick="return confirm('本当に削除しますか？')" class="btn btn-secondary btn-sm ml-1">削除</button>
                              </form>
                            </div>
                          </td>
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
