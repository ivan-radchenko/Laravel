@extends('layouts.main')
@section('title')Категории@parent @stop
@section('content')
    <h1>Категории ТрэшНовостей.РФ</h1>
    <a href="{{route('news.index')}}" class="btn btn-primary my-2">Лента новостей</a>
    <a href="{{route('news.uploading')}}" class="btn btn-secondary my-2">Выгрузка новостей</a>
    <hr>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($categories as $category)
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1>{{$category->name}}</h1>
                        <p class="card-text">--Описание категории--</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{route('news.showCategory', ['categories' => $category->id])}}" class="btn btn-primary my-2">Перейти в категорию</a>
                            </div>
                            <small class="text-muted"></small>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endsection
