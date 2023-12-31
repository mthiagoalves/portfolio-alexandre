<style>
    .text-footer-hyperlink {
        color: #EBEBEB;
        text-decoration: none;
        font-size: 1.25rem;
        border: 0.063rem solid #EBEBEB;
        border-radius: 1.563rem;
        transition: ease-in-out 0.7s;
    }

    .text-footer-hyperlink:hover {
        border: 0.063rem solid #EBEBEB;
        border-radius: 1.563rem;
        background-color: #EBEBEB20;
    }

    .text-footer-hyperlink i {
        color: #EBEBEB;
        font-size: 1rem;
    }

    .text-footer {
        color: #EBEBEB;
        font-size: 1rem;
        font-weight: 300;
        line-height: 23.44px;
    }

    .text-footer a {
        text-decoration: none;
        color: #EBEBEB;
        font-weight: 500;
        border-bottom: 1px solid transparent;
        transition: ease-in-out .7s;
        display: inline-block;
        pointer-events: all;
    }

    .local-time-space {
        margin-top: 2rem;
    }

    .sample-text {
        color: #EBEBEB;
        font-size: 1rem;
        font-weight: 300;
        margin-bottom: 1rem;
    }

    .text-hours {
        color: #EBEBEB;
        font-size: 1.2rem;
        font-weight: 500;
    }

    .text-socials {
        color: #EBEBEB;
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

    .text-socials p:hover,
    .text-footer a:hover {
        border-bottom-color: #EBEBEB;
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

        .text-socials p {
            margin: 0;
        }
    }
</style>

@php
    class Socials
    {
        public $name;
        public $link;

        public function __construct($name, $link)
        {
            $this->name = $name;
            $this->link = $link;
        }
    }

    $allSocials = [new Socials('BEHANCE', 'https://www.behance.net/AlexandrePiedade'), new Socials('LINKEDIN', 'https://www.linkedin.com/in/alexandre-piedade/')];
@endphp

<div class="container-fluid pt-4 pb-sm-4 pb-3 p-0 px-sm-0 px-1 container-footer" id="container-footer">
    <div class="container p-sm-0 px-3 footer-content">
        <div class="row justify-content-between m-0 give-width">
            <div class="col-sm-8 col-12 my-sm-0 p-0" style="z-index: 2">
                <div class="row">
                    <div class="col-sm-12 col-12 my-3 my-sm-3">
                        <a class="text-footer-hyperlink p-2 px-4" target="_blank" href="mailto:{{ $content->email }}"
                            title="E-mail: {{ $content->email }}"> {{ $content->email }}
                        </a>
                    </div>
                    <div class="col-sm-12 col-12 my-3 my-sm-3">
                        <a class="text-footer-hyperlink p-2 px-4" target="_blank" href="https://w.app/s7X9D8"
                            title="Phone number: +351 913 748 996" style="font-weight: 300"> {!! $content->phone !!}
                        </a>
                    </div>
                    <div class="col-sm-12 col-12 my-3 my-sm-3">
                        <a class="text-footer-hyperlink p-2 px-4" target="_blank" href="" title="Download CV">
                            Curriculum Vitae
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-9 p-0 px-1 my-5 my-sm-0 disable-events" style="z-index: 2">
                <p class="text-footer">
                    Handcrafted by AP. using a sketchbook, Figma & millions of lines of code by <a
                        href="https://www.linkedin.com/in/mthiagoalves/" target="_blank">THIAGO ALVES</a>
                </p>
            </div>
            <div class="text-lets-work-together col-12 p-0 col-sm-12 d-none d-sm-block" style="z-index: 2">
                <p>
                    let’s work together - let’s work together - let’s work together - let’s work together - let’s work
                    together - let’s work together - let’s work together - let’s work together - let’s work together -
                    let’s
                    work together - let’s work together - let’s work together -
                </p>
            </div>
        </div>
        <div class="container p-0 fixed-footer-bottom">
            <div class="row justify-content-between m-0 mt-4 receive-width">
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
                            <p>©2024</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-12 p-0 my-sm-0 order-sm-2 order-1" style="z-index: 2">
                    <p class="sample-text">
                        Let's connect
                    </p>
                    <div class="col-12">
                        <div class="row align-items-center m-0">
                            @foreach ($allSocials as $social)
                                <div class="col-4 p-0 mr-2">
                                    <a class="text-socials" href="{{ $social->link }}" target="_blank">
                                        <p>
                                            {{ $social->name }}
                                        </p>
                                    </a>
                                </div>
                            @endforeach
                            <div class="col-4 p-0 mr-2 d-none d-sm-block disable-events visible-text">
                                <p>©2024</p>
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
