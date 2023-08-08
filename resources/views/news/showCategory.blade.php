@extends('layouts.main')
@section('title'){{$categories->name}}@parent @stop
@section('content')
    <h1>Категория: {{$categories->name}}</h1>
    <a href="{{route('news.index')}}" class="btn btn-primary my-2">Лента новостей</a>
    <a href="{{route('news.categories')}}" class="btn btn-primary my-2">Категории</a>
    <a href="{{route('news.uploading')}}" class="btn btn-secondary my-2">Выгрузка новостей</a>
    <hr>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($newsList as $news)
            @if($news->category_id == $categories->id)
            <div class="col">
                <div class="card shadow-sm">
                    <img src="{{$news->image}}" alt="image"/>

                    <div class="card-body">
                        <h4>{{$news->title}}</h4>
                        <p class="card-text">{!!$news->description!!}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{route('news.show', ['news' => $news->id])}}" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                            </div>
                            <small class="text-muted">{{$news->author}}{{$news->created_at}}</small>
                        </div>
                    </div>

                </div>
            </div>
            @endif
        @endforeach
    </div>
@endsection
