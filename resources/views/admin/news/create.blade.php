@php use App\Enums\News\Status; @endphp
@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить трэш новость</h1>
    </div>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        <form method="post" action="{{route('admin.news.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="category_id">Категория</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                                @if($category->id === old('category_id')) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea type="text" class="form-control" name="description"
                          id="description">{{old('description')}}</textarea>
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" class="form-control" name="author" id="author" value="{{old('author')}}">
            </div>
            <div class="form-group">
                <label for="source_id">Источник</label>
                <select class="form-control" name="source_id" id="source_id">
                    @foreach($sources as $source)
                        <option value="{{$source->id}}"
                                @if($source->id === old('source_id')) selected @endif>{{$source->source}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if(old('status')===Status::DRAFT->value) selected @endif>{{Status::DRAFT->value}}</option>
                    <option
                        @if(old('status')===Status::ACTIVE->value) selected @endif>{{Status::ACTIVE->value}}</option>
                    <option
                        @if(old('status')===Status::BLOCKED->value) selected @endif>{{Status::BLOCKED->value}}</option>
                </select>
            </div>
            {{--<input type="hidden" class="form-group" id="created_at" name="created_at" value="{{now()}}">--}}
            <hr>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
