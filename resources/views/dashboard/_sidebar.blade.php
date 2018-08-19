<nav id="sidebar">
    <ul class="list-unstyled components">
        <li>
            <a href="#pageSubmenu" class="text-white">
                <i class="fas fa-user fa-fw fa-2x mr-3"></i> {{ Auth::user()->name }}
            </a>
        </li>

        <hr class="bg-custom-gray">

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

        <li>
            <a href="#">
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