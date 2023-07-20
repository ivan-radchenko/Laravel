@extends('layouts.main')
@section('title')Выгрузка новостей@parent @stop
@section('content')
    <h1>Выгрузка ТрэшНовостей.РФ</h1>
    <a href="{{route('news.categories')}}" class="btn btn-primary my-2">Категории</a>
    <hr>

    <div>
        <form method="post" action="{{@route('news.uploading.store')}}">
            @csrf
            <div class="form-group">
                <label for="user">Заказчик</label>
                <input type="text" class="form-control" name="user" id="user" value="{{old('user')}}">
            </div>
            <div class="form-group">
                <label for="phone">телефон</label>
                <input type="tel" class="form-control" name="phone" id="phone" value="{{old('phone')}}">
            </div>
            <div class="form-group">
                <label for="email">почта</label>
                <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea type="text" class="form-control" name="description" id="description">{{old('description')}}</textarea>
            </div>
            <hr>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>

@endsection
