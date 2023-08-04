<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.index'))active @endif" aria-current="page" href="{{ route('admin.index') }}">
                    <span data-feather="home"></span>
                    Панель управления
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.categories*'))active @endif" href="{{route('admin.categories')}}">
                    <span data-feather="database"></span>
                    Категории
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.news*'))active @endif" href="{{ route('admin.news') }}">
                    <span data-feather="database"></span>
                    Новости
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.orders*'))active @endif" href="{{ route('admin.orders') }}">
                    <span data-feather="send"></span>
                    Заказы
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('#'))active @endif" href="#">
                    <span data-feather="users"></span>
                    Пользователи
                </a>
            </li>

        </ul>
    </div>
</nav>
