<nav class="navbar navbar-expand navbar-light bg-white">
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

        @include('layouts.navbar-options')
    </div>
</nav>

@push('scripts')
    <script>

        $('#sidebarCollapse').on('click', function(event) {
            event.preventDefault();

            $(this).toggleClass('active');
            $('#sidebar').toggleClass('active');
        });
    </script>
@endpush
