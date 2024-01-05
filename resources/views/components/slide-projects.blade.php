<style>
    .swiper-container {
        overflow: hidden;
    }

    .slide-projects {
        position: relative;
    }

    .slide-projects .overflow {
        position: absolute;
        opacity: 0;
        width: 100%;
        height: 100%;
        top: 0;
        background-color: #2024238a;
        border-radius: .9rem;
        transition: ease-in-out .7s;
    }

    .slide-projects .overflow:hover {
        opacity: 1;
    }

    .img-slide-projects {
        border-radius: .9rem;
    }

    .title-project-overflow {
        color: #ffffff;
        font-size: 1.3rem;
        font-weight: 500;
        letter-spacing: 0.063rem;
        margin-bottom: 1.563rem;
    }

    .description-project-overflow {
        color: #ffffff;
        font-size: 1rem;
        letter-spacing: .5px;
        text-align: start;
    }

    .btn-know-more {
        max-height: 42px;
        color: #ffffff;
        text-decoration: none;
        font-size: 1.25rem;
        border: 0.063rem solid #ffffff;
        border-radius: 1.563rem;
        transition: ease-in-out 0.7s;
        position: absolute;
        bottom: 8%;
        right: 12%;
        display: flex;
        align-items: center;
    }

    .btn-know-more:hover {
        border: 0.063rem solid #ffffff;
        border-radius: 1.563rem;
        background-color: #ffffff20;
    }

    .tag-projects-overflow {
        color: #ffffff;
        text-decoration: none;
        font-size: .9rem;
        border: 1px solid #ffffff;
        border-radius: 1.563rem;
        transition: ease-in-out 0.7s;
    }

    @media(max-width: 756px) {
        .tag-projects-overflow {
            font-size: 0.8rem;
        }
    }

    .mySwiper .swiper-wrapper {
        transition-timing-function: linear;
        -webkit-transition-timing-function: linear !important;
        -o-transition-timing-function: linear !important;
    }
</style>

<div class="swiper-container mySwiper receive-margin">
    <div class="swiper-wrapper">
        @foreach ($projects as $project)
            <div class="swiper-slide">
                <div class="slide-projects">
                    <img src="https://dummyimage.com/580x750/4c6951/fff" alt=""
                        class="img-fluid img-slide-projects">
                    <div class="overflow">
                        <div class="content p-5">
                            <h3 class="title-project-overflow">{{ $project->title }}</h3>
                            <p class="description-project-overflow d-sm-block d-none">{{ $project->description }}</p>
                            <p class="description-project-overflow d-sm-none d-block">
                                {{ strlen($project->description) > 210 ? substr($project->description, 0, 210) . '...' : $project->description }}
                            </p>
                        </div>
                        <div class="col-sm-12 col-12 my-4 my-sm-3">
                            <a href="#" class="btn-know-more p-2 px-4">Know More</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach ($projects as $project)
            <div class="swiper-slide">
                <div class="slide-projects">
                    <img src="https://dummyimage.com/580x750/4c6951/fff" alt=""
                        class="img-fluid img-slide-projects">
                    <div class="overflow">
                        <div class="content p-5">
                            <h3 class="title-project-overflow">{{ $project->title }}</h3>
                            <p class="description-project-overflow d-sm-block d-none">{{ $project->description }}</p>
                            <p class="description-project-overflow d-sm-none d-block">
                                {{ strlen($project->description) > 210 ? substr($project->description, 0, 210) . '...' : $project->description }}
                            </p>
                        </div>
                        <div class="col-sm-12 col-12 my-4 my-sm-3">
                            <a href="#" class="btn-know-more p-2 px-4">Know More</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- <div class="swiper-slide d-sm-block d-none">
            <div class="slide-projects">
            </div>
        </div> --}}
    </div>
</div>
