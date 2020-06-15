<div class="form-group row">
    {!! Form::label('title', 'タイトル', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('title', null, [
            'class' => 'form-control'. ($errors->has('title') ? ' is-invalid' : ''),
            'required'
        ]) !!}
        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">保存</button>
        <a href="{{ route('tags.index') }}" class="btn btn-secondary">一覧へ戻る</a>
    </div>
</div>