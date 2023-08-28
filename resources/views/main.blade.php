@extends('layouts.main')
@section('title')Добро пожаловать@parent @stop
@section('content')
<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Добро пожаловать на ТрэшНовости.РФ</h1>
            <p class="lead text-muted">На нашем сайте вы найдете самые трэшовые новости, бережно собраннные для вас со всех уголков СССР</p>
            @include('inc.message')
        </div>
    </div>
</section>
@endsection
