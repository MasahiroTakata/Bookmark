@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">タグ一覧</div>
                    <div class="card-body">
                        <div class="mb-3">
                            {!! link_to_route('tags.create', '新規登録', null, [
                                'class' => 'btn btn-primary'
                            ]) !!}
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
                            @foreach($tags as $tag)
                                <tr>
                                    <td class="align-middle">{{ $tag->id }}</td>
                                    <td class="align-middle">{{ $tag->title }}</td>
                                    <td class="align-middle">
                                        <div class="d-flex">
                                            {!! link_to_route('tags.show', '表示', $tag, [
                                                'class' => 'btn btn-secondary btn-sm'
                                            ]) !!}
                                            {!! link_to_route('tags.edit', '編集', $tag, [
                                                'class' => 'btn btn-secondary btn-sm ml-1'
                                            ]) !!}
                                            {!! Form::model($tag, [
                                                'route' => ['tags.destroy', $tag],
                                                'method' => 'delete'
                                            ]) !!}
                                                <button onclick="return confirm('本当に削除しますか？')" class="btn btn-secondary btn-sm ml-1">削除</button>
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $tags->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection