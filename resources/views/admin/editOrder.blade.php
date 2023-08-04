@php use App\Enums\News\Status; @endphp
@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать трэш новость</h1>
    </div>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{ route('admin.orders.update', ['orders' => $orders->id]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="customer">Заказчик</label>
                <input type="text" class="form-control" name="customer" id="customer" value="{{$orders->customer}}">
            </div>
            <div class="form-group">
                <label for="phone">телефон</label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{$orders->phone}}">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{$orders->email}}">
            </div>
            <div class="form-group">
                <label for="category_id">Категория</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                                @if($category->id === $orders->category_id) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="source_id">Источник</label>
                <select class="form-control" name="source_id" id="source_id">
                    @foreach($sources as $source)
                        <option value="{{$source->id}}"
                                @if($source->id === $orders->source_id) selected @endif>{{$source->source}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea type="text" class="form-control" name="description"
                          id="description">{{$orders->description}}</textarea>
            </div>
            <hr>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
