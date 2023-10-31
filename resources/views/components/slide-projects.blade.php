<style>
    .swiper-container {
        overflow: hidden;
    }

    /* .swiper-slide-prev .slide-projects .overflow,
    .swiper-slide-next .slide-projects .overflow {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        background-color: #2024238a;
        border-radius: 25px;
        transition: ease-in-out 1s;
    } */

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
        border-radius: 1.563rem;
        transition: ease-in-out .7s;
    }

    .slide-projects .overflow:hover {
        opacity: 1;
    }

    .img-slide-projects {
        border-radius: 1.563rem;
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
        text-align: justify;
        text-align-last: start;
    }

    .btn-know-more {
        color: #ffffff;
        text-decoration: none;
        font-size: 1.25rem;
        border: 1px solid #ffffff;
        border-radius: 1.563rem;
        transition: ease-in-out 0.7s;
        position: absolute;
        bottom: 8%;
        right: 12%;
    }

    .btn-know-more:hover {
        border: 1px solid #ffffff;
        border-radius: 1.563rem;
        background-color: #ffffff20;
    }

    .tag-projects-overflow {
        color: #ffffff;
        text-decoration: none;
        font-size: 1rem;
        border: 1px solid #ffffff;
        border-radius: 1.563rem;
        transition: ease-in-out 0.7s;
    }

    @media(max-width: 756px) {
        .tag-projects-overflow {
            font-size: 0.8rem;
        }
    }
</style>

<div class="swiper-container mySwiper">
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
                            <div class="col-12 p-0 mt-2">
                                <div class="row m-0">
                                    @foreach ($project->tags as $tag)
                                        <div class="col-6 pt-2 p-0">
                                            <div class="col-12 p-1">
                                                <p class="tag-projects-overflow p-2 px-3">{{ $tag->name }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <a href="#" class="btn-know-more p-2 px-3">Know More</a>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="swiper-slide">
            <div class="slide-projects">
            </div>
        </div>
    </div>
</div>
