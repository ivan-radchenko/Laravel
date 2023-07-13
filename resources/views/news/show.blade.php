@extends('layouts.main')
@section('content')
    <a href="{{route('news.categories')}}" class="btn btn-primary my-2">Категории</a>
    <hr>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
                <div class="card shadow-sm">
                    <img src="{{$news['image']}}" alt="image"/>

                    <div class="card-body">
                        <p class="card-text">{!!$news['description']!!}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">{{$news['author']}}{{$news['created_at']}}</small>
                        </div>
                    </div>

                </div>
            </div>
    </div>
@endsection

