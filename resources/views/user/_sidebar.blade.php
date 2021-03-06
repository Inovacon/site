<nav id="sidebar" class="sidebar-primary">
    <ul class="list-unstyled components">
        <li>
            <a class="text-white" data-toggle="collapse" href="#pageSubmenu" role="button" aria-expanded="false" aria-controls="pageSubmenu">
                <i class="fas fa-user fa-fw fa-2x mr-3"></i> {{ Auth::user()->name }} </i>
            </a>
        </li>

        <hr style="background-color: rgba(255, 255, 255, .3);">
        
        <li class="{{ request()->routeIs('my-account.user.*') ? 'active' : '' }}">
            <a href="{{ route('my-account.user.index') }}">
                <i class="fas fa-user-circle fa-fw fa-2x mr-3"></i>Minha conta
            </a>
        </li>

        <li class="{{ request()->routeIs('my-account.courses.*') ? 'active' : '' }}">
            <a href="{{ route('my-account.courses.index') }}">
                <i class="fas fa-graduation-cap fa-fw fa-2x mr-3"></i>Meus cursos
            </a>
        </li>
    </ul>
</nav>
