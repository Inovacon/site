<nav id="navbar" class="navbar sticky-top navbar-expand-lg navbar-light bg-white mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img class="logo" src="{{ asset('images/logo.png') }}">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a class="nav-link" href="/">INÍCIO</a>
                </li>

                <li class="nav-item {{ request()->routeIs('courses.*') ? 'active' : '' }}">
                    <a class="nav-link" href="/cursos">CURSOS</a>
                </li>

                <li class="nav-item {{ request()->routeIs('events.*') ? 'active' : '' }}">
                    <a class="nav-link" href="/eventos">EVENTOS</a>
                </li>

                <li class="nav-item {{ request()->routeIs('news.*') ? 'active' : '' }}">
                    <a class="nav-link" href="/noticias">NOTÍCIAS</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/#servicos">SERVIÇOS</a>
                </li>
            </ul>

            <hr class="d-lg-none d-block my-2">

            @guest
                @if(! request()->is('register', 'login'))
                    <ul id="navButtons" class="navbar-nav ml-auto d-flex flex-column flex-sm-row flex-lg-row">
                        <li class="nav-item px-1 py-sm-0 py-2">
                            <a href="#" class="nav-link px-2 btn btn-primary" data-toggle="modal" data-target="#loginModal">
                                <span>ENTRE</span>
                            </a>
                        </li>

                        <li class="nav-item px-1">
                            <a href="/register" class="nav-link px-2 btn btn-outline-primary">
                                <span>CADASTRE-SE</span>
                            </a>
                        </li>
                    </ul>
                @endif
            @else
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-lg fa-fw mr-1"></i>{{ Auth::user()->name }}</a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a href="{{ route('dashboard.index') }}" class="dropdown-item">
                                <i class="fas fa-tachometer-alt fa-fw mr-1"></i>Painel
                            </a>

                            <div class="dropdown-divider"></div>

                            <a  href="/logout" class="dropdown-item"
                                onclick="event.preventDefault();
                                document.getElementById('logoutForm').submit();"><i class="fas fa-sign-out-alt fa-fw mr-1"></i>Sair</a>

                            <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            @endguest

        </div>
    </div>
</nav>

@if(! request()->is('register', 'login'))

    {{-- LOGIN MODAL --}}
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h6 class="modal-title font-weight-600 text-white" id="loginModalLabel">ENTRE COM SUA CONTA</h6>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white" aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    @include('layouts.auth.login-form')
                </div>
            </div>
        </div>
    </div>
@endif
