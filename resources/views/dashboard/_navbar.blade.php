<nav id="adminNavbar" class="navbar navbar-light bg-white">
    <div class="container-fluid">

        <ul class="navbar-nav">
            <li class="nav-item">
                <h3 class="m-0">
                    <a id="sidebarCollapse" class="nav-link active" href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                </h3>
            </li>
        </ul>
            
        <a class="navbar-brand mx-4" href="{{ route('home') }}">
            <img class="logo" src="{{ asset('images/logo.png') }}">
        </a>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" onclick="
                    event.preventDefault();
                    document.getElementById('logoutForm').submit();" href="#">
                    <i class="fas fa-sign-out-alt mr-1"></i>Sair
                </a>

                <form class="d-none" id="logoutForm" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>

@push('scripts')
    <script>

        $('#sidebarCollapse').on('click', function (event) {
            event.preventDefault();

            $(this).toggleClass('active');
            $('#sidebar').toggleClass('active');
        });
    </script>
@endpush
