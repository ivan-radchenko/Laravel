
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin|ТрэшНовости.РФ</title>
    <link href="{{asset('assets/bootstrap.min.css')}}" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <link href="{{asset('assets/dashboard.css')}}" rel="stylesheet">
</head>

<body>
<x-admin.header></x-admin.header>
<div class="container-fluid">
    <div class="row">
        <x-admin.sidebar></x-admin.sidebar>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @yield('content')
        </main>
    </div>
</div>

<script src="{{asset('assets/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/feather.min.js')}}"></script><script src="{{asset('assets/dashboard.js')}}"></script>

@stack('js')

</body>
</html>
