<div class="form-group row">
  <label for="inputTitle" class="col-sm-2 col-form-label">タイトル</label>
    <div class="col-sm-10">
      <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="inputTitle" value="{{ $bookmark->title ?? '' }}">
      @error('title')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
</div>
<div class="form-group row">
  <label for="inputUrl" class="col-sm-2 col-form-label">URL</label>
    <div class="col-sm-10">
      <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" id="inputUrl" value="{{ $bookmark->url ?? '' }}">
      @error('url')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
</div>
<div class="form-group row">
  <label for="inputDescription" class="col-sm-2 col-form-label">説明文</label>
    <div class="col-sm-10">
      <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="inputDescription" rows="5">{{ $bookmark->description ?? '' }}</textarea>
      @error('description')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
</div>
<div class="form-group row">
  <label for="inputTag" class="col-sm-2 col-form-label">タグ</label>
  <div class="col-sm-10">
      @foreach($tags as $key => $tag)
          <div class="form-check form-check-inline">
              <input
                  type="checkbox"
                  name="tags[]"
                  value="{{ $key }}"
                  id="tag{{ $key }}"
                  @if(isset($bookmark->tags) && $bookmark->tags->contains($key))
                      checked
                  @endif
              >
              <label for="tag{{ $key }}" class="form-check-label">{{ $tag }}</label>
          </div>
      @endforeach
      @error('tags')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
  </div>
</div>
<div class="form-group row">
  <div class="col-sm-10">
    <button type="submit" class="btn btn-primary">保存</button>
    <a href="{{ route('bookmarks.index') }}" class="btn btn-secondary">一覧に戻る</a>
  </div>
</div>