<nav id="navbar" class="navbar sticky-top navbar-expand-lg navbar-light bg-white mb-3">
  <div class="container-fluid ml-lg-3 mr-lg-5">
    <a class="navbar-brand" href="{{ route('home') }}"><img class="logo" src="{{ asset('images/logo.png') }}"></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item mx-xl-1 {{ request()->is('/') ? 'active' : '' }}">
          <a class="nav-link" href="/"><i class="fas fa-home fa-lg fa-fw mr-1"></i>INÍCIO</a>
        </li>

        <li class="nav-item mx-xl-1 {{ request()->is('cursos') ? 'active' : '' }}">
          <a class="nav-link" href="/cursos"><i class="fas fa-graduation-cap fa-lg fa-fw mr-1"></i>CURSOS</a>
        </li>

        <li class="nav-item mx-xl-1 {{ request()->is('eventos') ? 'active' : '' }}">
          <a class="nav-link" href="/eventos"><i class="fas fa-calendar-alt fa-lg fa-fw mr-1"></i>EVENTOS</a>
        </li>
        
        <li class="nav-item mx-xl-1 {{ request()->is('noticias') ? 'active' : '' }}">
          <a class="nav-link" href="/noticias"><i class="fas fa-newspaper fa-lg fa-fw mr-1"></i>NOTÍCIAS</a>
        </li>

        <li class="nav-item mx-xl-1">
          <a class="nav-link" href="http://cnecsan.cnec.br/servicos-a-comunidade/" target="_blank"><i class="fas fa-briefcase fa-lg fa-fw mr-1"></i>PORTAL DO TRABALHO</a>
        </li>
      </ul>
    
        <hr class="d-md-none d-block my-3 py-3">
      @if(! request()->is('register', 'login'))

        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-xl-1">
            <a href="#" class="nav-link small btn btn-primary" data-toggle="modal" data-target="#loginModal">
              <span>ENTRE</span>
            </a>
          </li>

          <li class="nav-item mx-xl-1">
            <a href="#" class="nav-link small btn btn-outline-primary" data-toggle="modal" data-target="#registerModal">
              <span>CADASTRE-SE</span>
            </a>
          </li>
        </ul>
      @endif
     
    </div>
  </div>
</nav>

@include('layouts.login-modal')
@include('layouts.register-modal')
