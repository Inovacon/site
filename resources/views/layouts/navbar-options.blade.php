<ul class="navbar-nav ml-auto mr-md-5">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-lg fa-fw mr-1"></i>Olá, <strong>{{ strtok(Auth::user()->name, ' ') }}</strong></a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @role('admin')
                <a href="{{ route('dashboard.index') }}" class="dropdown-item">
                    <i class="fas fa-tachometer-alt fa-fw mr-1"></i>Painel
                </a>
            @endrole

            <a href="{{ route('my-account.user.index') }}" class="dropdown-item">
                <i class="fas fa-user-circle fa-fw mr-1"></i>Minha conta
            </a>

            <a href="{{ route('my-account.user.edit') }}" class="dropdown-item">
                <i class="fas fa-user-edit fa-fw mr-1"></i>Alterar dados
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
