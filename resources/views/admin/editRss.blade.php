@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать Rss</h1>
    </div>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{ route('admin.rss.update', ['rsses' => $rsses->id]) }}">
            @csrf
            @method('PUT')


            <div class="form-group">
                <label for="url">Rss URL</label>
                <input type="url" class="form-control" name="url" id="url" value="{{$rsses->url}}">
            </div>
            <hr>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection


