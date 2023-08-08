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
                    <td><a href="{{ route('admin.orders.edit', ['orders' => $orders->id]) }}">Edit</a> &nbsp;<a href="javascript:;" class="delete" rel="{{ $orders->id }}">Delete</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Записей не найдено</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
@push('js')
    <script>
        let elements = document.querySelectorAll(".delete");
        elements.forEach(function (element, key) {
            element.addEventListener('click', function() {
                const id = this.getAttribute('rel');
                if (confirm(`Подтверждаете удаление заказа с #ID = ${id}`)) {
                    send(`/admin/orders/${id}`).then( () => {
                        location.reload();
                    });
                } else {
                    alert("Вы отменили удаление заказа");
                }
            });
        });

        async function send(url) {
            let response = await fetch (url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
