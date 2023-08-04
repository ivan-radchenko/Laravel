@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать трэш категорию</h1>
    </div>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{ route('admin.categories.update', ['categories' => $categories->id]) }}">
            @csrf
            @method('PUT')


            <div class="form-group">
                <label for="name">Название категории</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$categories->name}}">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea type="text" class="form-control" name="description"
                          id="description">{{$categories->description}}</textarea>
            </div>

            <hr>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection

