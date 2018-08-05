<nav id="navbar" class="navbar sticky-top navbar-expand-lg navbar-light bg-white mb-3">
    <div class="container-fluid ml-lg-3 mr-lg-5">
        <a class="navbar-brand" href="{{ route('dashboard.index') }}"><img class="logo" src="{{ asset('images/logo.png') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item mx-xl-2 {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard.index') }}">
                        <i class="fas fa-tachometer-alt fa-lg fa-fw"></i> &nbsp;PAINEL
                    </a>
                </li>

                <li class="nav-item mx-xl-2 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="cursosDropdown" data-toggle="dropdown">
                        <i class="fas fa-graduation-cap fa-lg fa-fw"></i> &nbsp;CURSOS
                    </a>
                    <div class="dropdown-menu" aria-labelledby="cursosDropdown">
                        <a class="dropdown-item" href="{{ route('courses.create') }}">Cadastrar</a>
                    </div>
                </li>
            </ul>

            <hr class="d-md-none d-sm-block">

            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-xl-2 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="authUserDropdown" data-toggle="dropdown">
                        <i class="fas fa-user-tie fa-lg fa-fw"></i> &nbsp;{{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="authUserDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
