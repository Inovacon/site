<nav id="navbar" class="navbar sticky-top navbar-expand-lg navbar-light bg-white mb-3">
  <div class="container-fluid ml-lg-3 mr-lg-5">
    <a class="navbar-brand" href="#"><img class="logo" src="{{ asset('images/logo.png') }}"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item mx-xl-2 {{ request()->is('/') ? 'active' : '' }}">
          <a class="nav-link" href="/">
            <i class="fas fa-home fa-lg fa-fw"></i> &nbsp;INÍCIO
          </a>
        </li>

        <li class="nav-item mx-xl-2 {{ request()->is('cursos') ? 'active' : '' }}">
          <a class="nav-link" href="/cursos">
            <i class="fas fa-graduation-cap fa-lg fa-fw"></i> &nbsp;CURSOS
          </a>
        </li>

        <li class="nav-item mx-xl-2 {{ request()->is('eventos') ? 'active' : '' }}">
          <a class="nav-link" href="/eventos">
            <i class="fas fa-calendar-alt fa-lg fa-fw"></i> &nbsp;EVENTOS
          </a>
        </li>
        
        <li class="nav-item mx-xl-2 {{ request()->is('noticias') ? 'active' : '' }}">
          <a class="nav-link" href="/noticias">
            <i class="fas fa-newspaper fa-lg fa-fw"></i> &nbsp;NOTÍCIAS
          </a>
        </li>

        <li class="nav-item mx-xl-2">
          <a class="nav-link" href="http://cnecsan.cnec.br/servicos-a-comunidade/" target="_blank">
            <i class="fas fa-briefcase fa-lg fa-fw"></i> &nbsp;PORTAL DO TRABALHO
          </a>
        </li>
      </ul>
    
      <hr class="d-md-none d-sm-block">
      
      <ul class="navbar-nav ml-auto">
        <li class="nav-item mx-xl-2">
          <a href="#" class="nav-link font-weight-bold" data-toggle="modal" data-target="#loginModal">
            <i class="fas fa-sign-in-alt fa-lg fa-fw"></i> &nbsp;ENTRAR
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

@include('layouts.login-modal')