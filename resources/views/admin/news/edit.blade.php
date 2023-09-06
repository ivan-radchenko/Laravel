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
        <form method="post" action="{{ route('admin.news.update', ['news' => $news->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="category_id">Категория</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                                @if($category->id === $news->category_id) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" value="{{$news->title}}">
                @error('title') <strong style="color:red; font-weight: bold">{{ $message }}</strong> @enderror
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                <img src="{{Storage::disk('public')->url($news->image)}}" style="width: 200px" alt="image">
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea type="text" class="form-control" name="description"
                          id="description">{{$news->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" class="form-control" name="author" id="author" value="{{$news->author}}">
            </div>
            <div class="form-group">
                <label for="source_id">Источник</label>
                <select class="form-control" name="source_id" id="source_id">
                    @foreach($sources as $source)
                        <option value="{{$source->id}}"
                                @if($source->id === $news->source_id) selected @endif>{{$source->source}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if($news->status ===Status::DRAFT->value) selected @endif>{{Status::DRAFT->value}}</option>
                    <option
                        @if($news->status===Status::ACTIVE->value) selected @endif>{{Status::ACTIVE->value}}</option>
                    <option
                        @if($news->status===Status::BLOCKED->value) selected @endif>{{Status::BLOCKED->value}}</option>
                </select>
            </div>
            <hr>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection

@push('js')
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('description', options);
    </script>
@endpush
