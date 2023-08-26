<h2>Добро пожаловать,{{Auth::user()->name}}</h2>
@if(Auth::user()->is_admin === true)
<a href="{{route('admin.news')}}" class="btn btn-primary my-2">Панель управления</a>
@endif
