@extends('layouts.main')
@section('title'){{$news->title}}@parent @stop
@section('content')

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 ">
            <div class="col" >
                <div class="card shadow-sm" style="width: max-content">
                    <img src="{{Storage::disk('public')->url($news->image)}}" alt="image" style="max-width: 1200px"/>

                    <div class="card-body">
                        <h4>{{$news->title}}</a></h4>
                        <p class="card-text">{!!$news->description!!}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">{{$news->author}}{{$news->created_at}}</small>
                        </div>
                    </div>

                </div>
            </div>
    </div>
@endsection

