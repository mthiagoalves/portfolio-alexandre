@if (Route::is('pageHomepage'))
    @include('components.pre-loader')
@endif

<nav class="navbar navbar-expand-lg px-sm-4 w-100 flex-column navbar-top fixed-top" style="padding-top: 1rem">
    <div class="container-fluid px-sm-5 px-3">
        <a class="navbar-brand" href="{{ route('pageHomepage') }}">
            <img src="https://i.imgur.com/dR1FnHK.png" alt="logo" class="img-fluid">
        </a>
        <button class="navbar-toggler" onclick="toggleNavbar()" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-sm-end justify-content-center opacity-load-nav" id="navbarNav">
            <ul class="navbar-nav text-center">
                <li class="nav-item my-3 mx-sm-3 d-block d-sm-none">
                    <x-nav-link-web aria-current="page" href="{{ route('pageHomepage') }}"
                        :active="request()->routeIs('pageHomepage')">Home</x-nav-link-web>
                </li>
                <li class="nav-item my-3 mx-sm-3">
                    <x-nav-link-web aria-current="page" href="{{ route('pageAbout') }}"
                        :active="request()->routeIs('pageAbout')">About</x-nav-link-web>
                </li>
                <li class="nav-item my-3 mx-sm-3">
                    <x-nav-link-web href="{{ route('pageWork') }}" :active="request()->routeIs('pageWork')">Projects</x-nav-link-web>
                </li>
                <li class="nav-item my-3 mx-sm-3">
                    <x-nav-link-web href="#container-footer">Contact</x-nav-link-web>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-12 p-3 disable-events d-block d-sm-none opacity-navbar-local-time" style="z-index: 2">
        <div class="row justify-content-between align-items-end m-0">
            <div class="col-8 p-0">
                <p class="sample-text">
                    Local Time
                </p>
                <p class="text-hours">
                    09:00 </p>
            </div>
            <div class="col-4 mt-sm-3 text-end">
                <p>©2024</p>
            </div>
        </div>
    </div>
</nav>
