@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">タグ詳細</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th class="w-25">タイトル</th>
                            <td>{{ $tag->title }}</td>
                        </tr>
                        <tr>
                            <th>作成日</th>
                            <td>{{ $tag->created_at->format('Y年m月d日') }}</td>
                        </tr>
                        <tr>
                            <th>編集日</th>
                            <td>{{ $tag->updated_at->format('Y年m月d日') }}</td>
                        </tr>
                    </table>
                    <div>
                        <a href="{{ route('tags.index') }}" class="btn btn-secondary">戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection