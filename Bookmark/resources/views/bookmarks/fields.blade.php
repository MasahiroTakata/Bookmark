@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ブックマーク登録</div>
                  <div class="card-body">
                    <form method="POST" action="{{ route('bookmarks.store') }}">
                      @csrf
                      <div class="form-group row">
                        <label for="inputTitle" class="col-sm-2 col-form-label">タイトル</label>
                          <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="inputTitle" value="{{ $bookmark->title ?? '' }}">
                          </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputUrl" class="col-sm-2 col-form-label">URL</label>
                          <div class="col-sm-10">
                            <input type="text" name="url" class="form-control" id="inputUrl" value="{{ $bookmark->url ?? '' }}">
                          </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputDescription" class="col-sm-2 col-form-label">説明文</label>
                          <div class="col-sm-10">
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="inputDescription" rows="5">{{ $bookmark->description ?? '' }}</textarea>
                          </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">保存</button>
                          <a href="{{ route('bookmarks.index') }}" class="btn btn-secondary">一覧に戻る</a>
                        </div>
                      </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
