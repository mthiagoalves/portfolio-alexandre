<div class="container-fluid p-0 opacity-load-banner gradient-bg">
    <div class="width-banner">
        @if (!Route::is('pageHomepage'))
        <div class="col-12 p-0 text-center position-absolute pic-ale">
            <img src="{{asset('/img/homepage/banner-initial.png')}}" alt="banner" class="img-fluid m-auto d-none d-sm-block">
            <img src="{{asset('/img/homepage/banner-initial-m.png')}}" alt="banner" class="img-fluid m-auto d-block d-sm-none">
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
            <div class="text-right-banner">
                UI/UX Designer <br>
                Graphic Designer
            </div>
        @endif
        <div class="text-name-main-banner">
            <p>
                Piedade - Alexandre
            </p>
        </div>
        @if (Route::is('pageHomepage'))
            <div class="text-inside-banner">
                <p>
                    UI UX Designer - Graphic Designer - Product Designer
                </p>
            </div>
        @endif
    </div>
    @include('components.gradient-bg')
</div>
