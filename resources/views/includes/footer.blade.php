<style>
    .container-footer {
        background-color: #292a2f;
    }

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
        margin-top: 7rem;
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
        transition: ease-in-out .7s;
    }

    .text-socials:hover {
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

<div class="container-fluid pt-5 pb-sm-5 pb-3 p-0 container-footer">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid p-0 offset-sm-footer-1">
            <a class="navbar-brand" href="{{ route('pageHomepage') }}">
                <img src="/img/logo.png" alt="logo" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav text-center">
                    <li class="nav-item my-3 mx-sm-3 d-block d-sm-none">
                        <a class="" aria-current="page" href="{{ route('pageHomepage') }}">Homepage</a>
                    </li>
                    <li class="nav-item my-3 mx-sm-3">
                        <a class="" aria-current="page" href="{{ route('pageAbout') }}">About</a>
                    </li>
                    <li class="nav-item my-3 mx-sm-3">
                        <a class="" href="{{ route('pageWork') }}">Work</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-sm-5">
        <div class="row justify-content-between m-0">
            <div class="col-sm-8 col-12 p-0">
                <div class="row">
                    <div class="col-sm-6 col-12 my-3 my-sm-0">
                        <a class="text-footer-hyperlink p-2 px-4" target="_blank" href="mailto:{{ $content->email }}"
                            title="E-mail: {{ $content->email }}">
                            <i class="fa-solid fa-envelope" style="color: #ffffff;"></i> {{ $content->email }}
                        </a>
                    </div>
                    <div class="col-sm-5 col-12 my-3 my-sm-0">
                        <a class="text-footer-hyperlink p-2 px-4" target="_blank" href=""
                            title="Phone number: +351 913 748 996">
                            <i class="fa-solid fa-phone-volume"></i> {!! $content->phone !!}
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-12 p-0 my-3 my-sm-0">
                <p class="text-footer">
                    {!! $content->text_footer !!}
                </p>
            </div>
        </div>
        <div class="local-time-space">
            <div class="row justify-content-between m-0">
                <div class="col-8 p-0">
                    <p class="sample-text">
                        Local Time
                    </p>
                    <p class="text-hours">
                        {!! $localTime !!}
                    </p>
                </div>
                <div class="col-3 p-0">
                    <p class="sample-text">
                        Let's connect
                    </p>
                    <div class="col-12">
                        <div class="row align-items-center m-0">
                            @foreach ($socials as $social)
                                <div class="col-sm-4 col-12 p-0 mr-2">
                                    <a class="text-socials" href="{{ $social->link }}" target="_blank">
                                        {{ $social->social_name }}
                                    </a>
                                </div>
                            @endforeach
                            <div class="col-sm-4 col-12 d-none d-sm-block">
                                <p class="text-footer">©2023</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3 text-center d-block d-sm-none">
                    <p class="text-footer">©2023</p>
                </div>
            </div>
        </div>

    </div>
</div>
