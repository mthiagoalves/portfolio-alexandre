<style>
    .text-footer-hyperlink {
        color: #ffffff;
        text-decoration: none;
        font-size: 1.25rem;
        border: 0.063rem solid #ffffff;
        border-radius: 1.563rem;
        transition: ease-in-out 0.7s;
    }

    .text-footer-hyperlink:hover {
        border: 0.063rem solid #ffffff;
        border-radius: 1.563rem;
        background-color: #ffffff20;
    }

    .text-footer-hyperlink i {
        color: #ffffff;
        font-size: 1rem;
    }

    .text-footer {
        color: #ffffff;
        font-size: 20px;
        font-weight: 300;
        line-height: 23.44px;
    }

    .local-time-space {
        margin-top: 2rem;
    }

    .sample-text {
        color: #ffffff;
        font-size: 1rem;
        font-weight: 300;
        margin-bottom: 1rem;
    }

    .text-hours {
        color: #ffffff;
        font-size: 1.2rem;
        font-weight: 500;
    }

    .text-socials {
        color: #ffffff;
        font-size: 1.2rem;
        font-weight: 500;
        border-bottom: 1px solid transparent;
        text-decoration: none;
        transition: ease-in-out .7s;
    }

    .text-socials p {
        border-bottom: 1px solid transparent;
        transition: ease-in-out .7s;
        display: inline-block;
    }

    .text-socials p:hover {
        border-bottom-color: #ffffff;
    }

    @media(min-width: 756px) {
        .offset-sm-footer-1 {
            margin-left: 7.333333%;
        }
    }

    @media(max-width: 756px) {
        .local-time-space {
            margin-top: 0.8rem;
        }
    }
</style>

<div class="container-fluid pt-4 pb-sm-4 pb-3 p-0 px-sm-0 px-1 container-footer" id="container-footer">
    {{-- <nav class="navbar navbar-expand-lg px-4 navbar-footer" style="z-index: 2">
        <div class="container-fluid px-sm-5 px-2">
            <a class="navbar-brand" href="{{ route('pageHomepage') }}">
                <img src="https://i.imgur.com/dR1FnHK.png" alt="logo" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav text-center">
                    <li class="nav-item my-3 mx-sm-3 d-block d-sm-none">
                        <a aria-current="page" href="{{ route('pageHomepage') }}">Home</a>
                    </li>
                    <li class="nav-item my-3 mx-sm-3">
                        <x-nav-link-web aria-current="page" href="{{ route('pageAbout') }}"
                            :active="request()->routeIs('pageAbout')">About</x-nav-link-web>
                    </li>
                    <li class="nav-item my-3 mx-sm-3">
                        <x-nav-link-web href="{{ route('pageWork') }}" :active="request()->routeIs('pageWork')">Projects</x-nav-link-web>
                    </li>
                    <li class="nav-item my-3 mx-sm-3">
                        <x-nav-link-web href="#">Contact</x-nav-link-web>
                    </li>
                </ul>
            </div>
        </div>
    </nav> --}}
    <div class="container p-sm-0 px-3 footer-content">
        <div class="row justify-content-between m-0">
            <div class="col-sm-8 col-12 my-sm-0 my-4 p-0" style="z-index: 2">
                <div class="row">
                    <div class="col-sm-12 col-12 my-4 my-sm-3">
                        <a class="text-footer-hyperlink p-2 px-4" target="_blank" href="mailto:{{ $content->email }}"
                            title="E-mail: {{ $content->email }}"> {{ $content->email }}
                        </a>
                    </div>
                    <div class="col-sm-12 col-12 my-4 my-sm-3">
                        <a class="text-footer-hyperlink p-2 px-4" target="_blank" href=""
                            title="Phone number: +351 913 748 996" style="font-weight: 300"> {!! $content->phone !!}
                        </a>
                    </div>
                    <div class="col-sm-12 col-12 my-4 my-sm-3">
                        <a class="text-footer-hyperlink p-2 px-4" target="_blank" href=""
                            title="Download CV"> Curriculum Vitae
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-12 p-0 my-3 my-sm-0 disable-events " style="z-index: 2">
                <p class="text-footer">
                    {!! $content->text_footer !!}
                </p>
            </div>
            <div class="text-lets-work-together col-12 p-0 col-sm-12 d-none d-sm-block" style="z-index: 2">
                <p>
                    let’s work together - let’s work together - let’s work together - let’s work together - let’s work
                    together - let’s work together - let’s work together - let’s work together - let’s work together - let’s
                    work together - let’s work together - let’s work together -
                </p>
            </div>
        </div>
        <div class="container p-0 fixed-footer-bottom">
            <div class="row justify-content-between m-0 mt-4">
                <div class="col-12 col-sm-8 p-0 order-sm-1 my-sm-0 my-4 order-2 disable-events" style="z-index: 2">
                    <div class="row justify-content-between align-items-end m-0">
                        <div class="col-8 p-0">
                            <p class="sample-text">
                                Local Time
                            </p>
                            <p class="text-hours">
                                {!! $localTime !!}
                            </p>
                        </div>
                        <div class="col-4 mt-sm-3 text-end d-block d-sm-none">
                            <p>©2023</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-12 p-0 my-sm-0 my-4 order-sm-2 order-1" style="z-index: 2">
                    <p class="sample-text">
                        Let's connect
                    </p>
                    <div class="col-12">
                        <div class="row align-items-center m-0">
                            @foreach ($socials as $social)
                                <div class="col-4 p-0 mr-2">
                                    <a class="text-socials" href="{{ $social->link }}" target="_blank">
                                        <p>
                                            {{ $social->social_name }}
                                        </p>
                                    </a>
                                </div>
                            @endforeach
                            <div class="col-4 p-0 mr-2 d-none d-sm-block disable-events">
                                <p>©2023</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="gradient-transition-bottom"></div>
    <canvas class="c3" data-gradient="wrapper" data-multx="1.27" data-multy="1.15" data-hue="0.201"
        data-brightness=".945" data-mouse="0.68" data-scale=".9" data-noise="1.64" data-time=".201" data-bw=".115"
        data-blue=".15" data-green="0" data-red="0.99" width="1325" height="627"></canvas>
</div>
