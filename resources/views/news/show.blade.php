@extends('layouts.main')
@section('title'){{$news['title']}}@parent @stop
@section('content')
    <a href="{{route('news.index')}}" class="btn btn-primary my-2">Лента новостей</a>
    <a href="{{route('news.categories')}}" class="btn btn-primary my-2">Категории</a>
    <a href="{{route('news.uploading')}}" class="btn btn-secondary my-2">Выгрузка новостей</a>
    <hr>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
                <div class="card shadow-sm">
                    <img src="{{$news['image']}}" alt="image"/>

                    <div class="card-body">
                        <h4>{{$news['title']}}</a></h4>
                        <p class="card-text">{!!$news['description']!!}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">{{$news['author']}}{{$news['created_at']}}</small>
                        </div>
                    </div>

                </div>
            </div>
    </div>
@endsection

