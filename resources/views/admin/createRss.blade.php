@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить Rss</h1>
    </div>
    <div>
        <form method="post" action="{{route('admin.rss.store')}}">
            @csrf
            <div class="form-group">
                <label for="url">Rss URL</label>
                <input type="url" class="form-control" name="url" id="url" value="{{old('url')}}">
            </div>
            <hr>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
