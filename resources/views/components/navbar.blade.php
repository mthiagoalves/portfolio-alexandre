@if(Route::is('pageHomepage'))
    @include('components.pre-loader')
@endif

<nav class="navbar navbar-expand-lg px-4 pt-3 w-100 position-absolute opacity-load-nav">
    <div class="container-fluid px-sm-5">
        <a class="navbar-brand" href="{{ route('pageHomepage') }}">
            <img src="/img/logo.png" alt="logo" class="img-fluid">
        </a>
        <button class="navbar-toggler" onclick="toggleNavbar()" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav text-center">
                <li class="nav-item my-3 mx-sm-3 d-block d-sm-none">
                    <a aria-current="page" href="{{ route('pageHomepage') }}">Homepage</a>
                </li>
                <li class="nav-item my-3 mx-sm-3">
                    <x-nav-link-web aria-current="page" href="{{ route('pageAbout') }}"
                        :active="request()->routeIs('pageAbout')">About</x-nav-link-web>
                </li>
                <li class="nav-item my-3 mx-sm-3">
                    <x-nav-link-web href="{{ route('pageWork') }}"
                        :active="request()->routeIs('pageWork')">Work</x-nav-link-web>
                </li>
                <li class="nav-item my-3 mx-sm-3">
                    <x-nav-link-web href="#container-footer">Contact</x-nav-link-web>
                </li>
            </ul>
        </div>
    </div>
</nav>
