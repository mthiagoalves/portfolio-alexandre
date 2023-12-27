@if (!Route::is('pageWork'))
    <div class="container-fluid p-0 opacity-load-banner gradient-bg">
        <div class="width-banner disable-events">
            @if (!Route::is('pageHomepage'))
                <div class="col-12 p-0 text-center position-absolute pic-ale">
                    <img src="https://i.imgur.com/3kSWRVi.png" alt="banner" class="img-fluid m-auto d-none d-sm-block">
                    <img src="https://i.imgur.com/2DIzKmt.png" alt="banner" class="img-fluid m-auto d-block d-sm-none">
                </div>
                <div class="located-in-pt d-none d-sm-block">
                    <div class="img-located-in-pt">
                        <div class="digital-ball">
                            <div class="overlay"></div>
                            <div class="globe">
                                <div class="globe-wrap">
                                    <div class="circle"></div>
                                    <div class="circle"></div>
                                    <div class="circle"></div>
                                    <div class="circle-hor"></div>
                                    <div class="circle-hor-middle"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-located-in-pt">
                        <p>
                            Located in Portugal

                        </p>
                    </div>
                </div>
                @if (!Route::is('pageHomepage'))
                    <div class="text-right-banner d-sm-block d-none">
                        UI/UX Designer <br>
                        Graphic Designer
                    </div>
                @endif
            @endif
            <div class="text-name-main-banner">
                <p>
                    Piedade - Alexandre - Piedade - Alexandre - Piedade - Alexandre - Piedade - Alexandre
                </p>
            </div>
            @if (Route::is('pageHomepage'))
                <div class="text-inside-banner">
                    <p>
                        UI UX Designer - Graphic Designer - Product Designer - UI UX Designer - Graphic Designer -
                        Product
                        Designer - UI UX Designer - Graphic Designer - Product Designer - UI UX Designer - Graphic
                        Designer
                        -
                        Product Designer
                    </p>
                </div>
            @else
                <div class="text-inside-banner d-block d-sm-none">
                    <p>
                        UI UX Designer - Graphic Designer - Product Designer - UI UX Designer - Graphic Designer -
                        Product Designer - UI UX Designer - Graphic Designer - Product Designer - UI UX Designer -
                        Graphic
                        Designer
                        -
                        Product Designer
                    </p>
                </div>
            @endif
        </div>
        <div class="gradient-transition-top"></div>
        <canvas class="c2" data-gradient="wrapper" data-multx="1.27" data-multy="1.15" data-hue="0.201"
            data-brightness=".945" data-mouse="0.68" data-scale=".9" data-noise="1.64" data-time=".201" data-bw=".115"
            data-blue=".15" data-green="0" data-red="0.99" width="2000" height="2000"></canvas>
    </div>
@endif
