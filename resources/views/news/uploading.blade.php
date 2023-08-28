@extends('layouts.main')
@section('title')Выгрузка новостей@parent @stop
@section('content')
    <h1>Выгрузка ТрэшНовостей.РФ</h1>

    <div>
        <form method="post" action="{{route('news.uploading.store')}}">
            @csrf
            <div class="form-group">
                <label for="customer">Заказчик</label>
                <input type="text" class="form-control" name="customer" id="customer" value="{{old('customer')}}">
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
                <label for="category_id">Категория</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="source_id">Источник</label>
                <select class="form-control" name="source_id" id="source_id">
                    @foreach($sources as $source)
                        <option value="{{$source->id}}">{{$source->source}}</option>
                    @endforeach
                </select>
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
