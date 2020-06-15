@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">「{{ $tag->title }}」のブックマーク</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>タイトル</th>
                                <th>タグ</th>
                                <th>アクション</th>
                            </tr>
                            </thead>
                            @foreach($bookmarks as $bookmark)
                                <tr>
                                    <td class="align-middle">{{ $bookmark->id }}</td>
                                    <td class="align-middle">
                                        {!! link_to($bookmark->url, $bookmark->title) !!}
                                    </td>
                                    <td class="align-middle">
                                        @foreach($bookmark->tags as $tag)
                                            {!! link_to_route('tags.show', $tag->title, $tag) !!}
                                            @unless($loop->last)
                                                ,
                                            @endunless
                                        @endforeach
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex">
                                            {!! link_to_route('bookmarks.show', '表示', $bookmark, [
                                                'class' => 'btn btn-secondary btn-sm'
                                            ]) !!}
                                            {!! link_to_route('bookmarks.edit', '編集', $bookmark, [
                                                'class' => 'btn btn-secondary btn-sm ml-1'
                                            ]) !!}

                                            {!! Form::model($bookmark, [
                                                'route' => ['bookmarks.destroy', $bookmark],
                                                'method' => 'delete'
                                            ]) !!}
                                            <button onclick="return confirm('本当に削除しますか？')" class="btn btn-secondary btn-sm ml-1">削除</button>
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $bookmarks->links() }}
                        <div>
                            <a href="{{ route('tags.index') }}" class="btn btn-secondary">戻る</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection