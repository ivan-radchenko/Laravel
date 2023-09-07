@extends('layouts.main')
@section('title')Rss новости@parent @stop
@section('content')
    <h1>Rss новости</h1>

    <div class="row row-cols-1   g-3">
        @foreach ($newsList as $news)
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4>{{$news->title}}</a></h4>
                        <p class="card-text">{!!$news->description!!}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{$news->link}}" type="button" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                            </div>
                            <small class="text-muted">{{$news->pubDate}}</small>
                            <small class="text-muted">{{$news->author}}</small>
                            <small class="text-muted">{{$news->category}}</small>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endsection
