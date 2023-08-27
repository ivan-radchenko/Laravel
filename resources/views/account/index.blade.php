@extends('layouts.app')
@section('title')Аккаунт@parent @stop
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Добро пожаловать,{{Auth::user()->name}}!</h1>
                    @if(Auth::user()->is_admin === true)
                        <a href="{{route('admin.news')}}" class="btn btn-primary my-2">Перейти в панель управления администратора</a>
                    @endif
                @include('inc.message')
            </div>
        </div>
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h3 class="fw-light">Редактировать профиль</h3>
                </div>
                <div>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <x-alert :message="$error" type="danger"></x-alert>
                        @endforeach
                    @endif
                    <form method="post" action="{{ route('account.update', ['user' => $user->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" class="form-control" name="password" id="password" value="">
                        </div>
                        <button type="submit" class="btn btn-success" style="margin-top: 10px">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
