<nav id="sidebar" class="sidebar-primary">
    <ul class="list-unstyled components">
        <li>
            <a class="text-white" data-toggle="collapse" href="#pageSubmenu" role="button" aria-expanded="false" aria-controls="pageSubmenu">
                <i class="fas fa-user fa-fw fa-2x mr-3"></i> {{ Auth::user()->name }} </i>
            </a>
        </li>

        <hr style="background-color: rgba(255, 255, 255, .3);">

        <li>
            <a href="" class="text-white">
                <i class="fas fa-graduation-cap fa-f2 fa-2x mr-1"></i>Meus cursos
            </a>
        </li>
    </ul>
</nav>
