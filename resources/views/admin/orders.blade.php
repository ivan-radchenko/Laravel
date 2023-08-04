@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список заказов</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    @include('inc.message')

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">заказчик</th>
                <th scope="col">телефон</th>
                <th scope="col">email</th>
                <th scope="col">категория</th>
                <th scope="col">источник</th>
                <th scope="col">описание</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Дата изменения</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orderList as $orders)
                <tr>
                    <td>{{ $orders->id}}</td>
                    <td>{{ $orders->customer }}</td>
                    <td>{{ $orders->phone }}</td>
                    <td>{{ $orders->email}}</td>
                    <td>{{ $orders->category->name }}</td>
                    <td>{{ $orders->source->source }}</td>
                    <td>{{ $orders->description }}</td>
                    <td>{{ $orders->created_at }}</td>
                    <td>{{ $orders->updated_at }}</td>
                    <td><a href="{{ route('admin.orders.edit', ['orders' => $orders->id]) }}">Edit</a> &nbsp; <a href="">Delete</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Записей не найдено</td>
                </tr>
            @endforelse
            </tbody>
        </table>
{{--        {{$newsList->links()}}--}}
    </div>
@endsection
