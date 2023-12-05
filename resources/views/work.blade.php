<style>
    .title-work {
        font-size: 1rem;
        font-weight: 500;
    }

    .text-work {
        font-size: 2.25rem;
        text-indent: 15rem;
        line-height: 2.5rem;
        letter-spacing: .07rem;
    }

    .btn-behance,
    .btn-projects {
        text-decoration: none;
        font-size: 1.25rem;
        border: 0.063rem solid #ffffff;
        border-radius: 1.563rem;
        transition: ease-in-out 0.7s;
        color: #ffffff;
    }

    .btn-behance:hover,
    .btn-projects:hover {
        background-color: #21252920
    }

    /* Card projects */

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

    @media(min-width: 756px) {
        .text-name-main-banner {
            bottom: 0% !important;
        }
    }

    @media(max-width: 756px) {
        .tag-projects-overflow {
            font-size: 0.8rem;
        }

        .title-work {
            font-size: 1rem;
            font-weight: 400;
        }

        .text-work {
            font-size: 1.3rem;
            text-indent: 0;
            line-height: 1.8rem;
            letter-spacing: 0rem;
        }

    }

    /* end card projects */
</style>

<x-master-layout>
    <x-slot name="content">
        <div class="container p-0 container-work mb-5">
            <div class="row justify-content-between m-0 mt-5">
                <div class="col-sm-2 col-12 ">
                    <div class="col-12 p-2 col-sm-12 p-sm-0">
                        <p class="title-work">
                            Work
                        </p>
                    </div>
                </div>
                <div class="col-sm-10 col-12">
                    <div class="col-11 p-2 col-sm-12 p-sm-0">
                        <p class="text-work pb-3">
                            Step into my creative world, where pixels and ideas dance in harmony. This is my portfolio —
                            a
                            collection of stories told through design. From pixels to paper, each piece is a brushstroke
                            of
                            innovation and a testament to the art of user experience. Explore, discover, and let the
                            designs
                            whisper their tales.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center m-0 mt-sm-5 mt-3">
                <div class="col-sm-2 col-12 d-none d-sm-block">
                    <div class="col-12 p-2 col-sm-12 p-sm-0">
                        <a href="" class="btn-behance p-2 px-3">
                            Behance
                        </a>
                    </div>
                </div>
                <div class="col-sm-10 col-12">
                    <div class="row m-0">
                        @foreach ($projects as $project)
                            <div class="col-6 p-2 col-sm-6">
                                <div class="slide-projects">
                                    <img src="https://dummyimage.com/580x750/4c6951/fff" alt=""
                                        class="img-fluid img-slide-projects">
                                    <div class="overflow">
                                        <div class="content p-5 d-none d-sm-block">
                                            <h3 class="title-project-overflow">{{ $project->title }}</h3>
                                            <p class="description-project-overflow d-sm-block d-none">
                                                {{ $project->description }}
                                            </p>
                                            <p class="description-project-overflow d-sm-none d-block">
                                                {{ strlen($project->description) > 210 ? substr($project->description, 0, 210) . '...' : $project->description }}
                                            </p>
                                            <div class="col-12 p-0 mt-2">
                                                <div class="row m-0">
                                                    @foreach ($project->tags as $tag)
                                                        <div class="col-6 pt-2 p-0">
                                                            <div class="col-12 p-1">
                                                                <p class="tag-projects-overflow p-2 px-3">
                                                                    {{ $tag->name }}
                                                                </p>
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
                    </div>
                    <div class="col-12 p-2 col-sm-12 p-sm-0 text-center mt-4">
                        <a href="" class="btn-projects p-2 px-3">
                            Want to see more projects?
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @include('includes.footer')
        <script>
            document.addEventListener('DOMContentLoaded', () => {

                var navbarHeight = document.querySelector('.navbar').offsetHeight;
                document.querySelector('.container-work').style.marginTop = navbarHeight * 2 + 'px';

            });
        </script>
    </x-slot>
</x-master-layout>
