@extends('layouts.main')
@section('content')
    <h1>Категории ТрэшНовостей.РФ</h1>
    <hr>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($categoriesList as $category)
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1>{{$category['name']}}</h1>
                        <p class="card-text">--Описание категории--</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{route('news.showCategory', ['id' => $category['id']])}}" class="btn btn-primary my-2">Перейти в категорию</a>
                            </div>
                            <small class="text-muted"></small>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endsection
