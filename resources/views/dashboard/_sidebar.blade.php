<nav id="sidebar" class="sidebar-dark">
    <ul class="list-unstyled components">
        @auth
            <li>
                <a href="#pageSubmenu" class="text-white">
                    <i class="fas fa-user fa-fw fa-2x mr-3"></i> {{ Auth::user()->name }}
                </a>
            </li>

            <hr style="background-color: rgba(255, 255, 255, .3);">
        @endauth

        <li class="{{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
            <a href="{{ route('dashboard.index') }}">
                <i class="fas fa-tachometer-alt fa-fw fa-2x mr-3"></i> Painel
            </a>
        </li>

        @role('admin')
            <li class="{{ request()->routeIs('*collaborators*') ? 'active' : '' }}">
                <a href="{{ route('dashboard.collaborators.index') }}">
                    <i class="fas fa-users fa-fw fa-2x mr-3"></i> Colaboradores
                </a>
            </li>
        @endrole

        <li class="{{ request()->routeIs('*courses*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.courses.index') }}">
                <i class="fas fa-graduation-cap fa-fw fa-2x mr-3"></i> Cursos
            </a>
        </li>

        <li class="{{ request()->routeIs('*news*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.news.index') }}">
                <i class="fas fa-newspaper fa-fw fa-2x mr-3"></i> Notícias
            </a>
        </li>

        <li>
            <a href="#">
                <i class="fas fa-calendar-alt fa-fw fa-2x mr-3"></i> Eventos
            </a>
        </li>
    </ul>
</nav>
