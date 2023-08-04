@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить трэш категорию</h1>
    </div>
    <div>
        <form method="post" action="{{route('admin.categories.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Название категории</label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                <label for="description">Описание</label>
                <input type="text" class="form-control" name="description" id="description" value="{{old('description')}}">
            </div>
            <hr>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
