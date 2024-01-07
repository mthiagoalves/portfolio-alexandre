@section('meta')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
@endsection

<style>
    .title-work {
        font-size: 1rem;
        font-weight: 500;
    }

    .text-work {
        font-size: 1.5rem;
        line-height: 2.5rem;
        letter-spacing: .07rem;
    }

    .btn-behance,
    .btn-projects {
        text-decoration: none;
        font-size: 1.25rem;
        border: 0.063rem solid #EBEBEB;
        border-radius: 1.563rem;
        transition: ease-in-out 0.7s;
        color: #EBEBEB;
        background-color: transparent;
    }

    .btn-behance {
        max-height: 2.625rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-behance:hover,
    .btn-projects:hover {
        background-color: #EBEBEB20;
    }

    .fixed {
        position: fixed;
    }

    @media(max-width: 756px) {
        .fixed {
            position: static;
        }
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
        color: #EBEBEB;
        font-size: 1.3rem;
        font-weight: 500;
        letter-spacing: 0.063rem;
        margin-bottom: 1.563rem;
    }

    .description-project-overflow {
        color: #EBEBEB;
        font-size: 1rem;
        letter-spacing: .5px;
        text-align: start;
    }

    .btn-know-more {
        color: #EBEBEB;
        text-decoration: none;
        font-size: 1.25rem;
        border: 1px solid #EBEBEB;
        border-radius: 1.563rem;
        transition: ease-in-out 0.7s;
        position: absolute;
        bottom: 8%;
        right: 12%;
        max-height: 2.625rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-know-more:hover {
        border: 1px solid #EBEBEB;
        border-radius: 1.563rem;
        background-color: #EBEBEB20;
    }

    .tag-projects-overflow {
        color: #EBEBEB;
        text-decoration: none;
        font-size: 1rem;
        border: 1px solid #EBEBEB;
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
            line-height: 1.8rem;
            letter-spacing: 0rem;
        }

    }

    /* end card projects */
</style>

@php
    class Project
    {
        public $title;
        public $description;
        public $image;
        public $link;

        public function __construct($title, $description, $image, $link)
        {
            $this->title = $title;
            $this->description = $description;
            $this->image = $image;
            $this->link = $link;
        }
    }

    $allProjects = [
        new Project('Late Evening Club - Techno Event', "Late Evening Club is your ticket to a one-of-a-kind nightlife experience, where pulsating techno beats meet captivating visuals, creating a unique atmosphere that goes beyond the ordinary. As the creative force behind the project, my role was to shape the club's identity, merging cool vibes with cutting-edge visuals to offer an unforgettable night out. Join us as we redefine the nightlife scene, breaking free from the norm and fostering a community that leaves a lasting impact on the cultural landscape.", 'https://i.imgur.com/WUZDJUJ.png', "#chatubao"),
        new Project('Ocidental Japan - Posters', 'Discover the essence of cultural duality in my latest project – 10 vertical posters seamlessly blending Western and Japanese influences. Five posters radiate positivity, while the other five embrace the allure of negativity. Created in a brief span, these visuals capture the beauty of rapid artistic expression, weaving a captivating narrative through the lens of Ocidental Japan.', 'https://i.imgur.com/WnzrNHG.png', "#chatubao"),
        new Project('Book Fair - Poster', "My project for Feira do Livro 2016 aimed to seamlessly unite the essence of the book fair with the enchanting backdrop of Palácio de Cristal do Porto. Recognizing the site's unique charm, known for its architecture and the free-roaming peacocks in its park, I envisioned a visual concept that harmoniously merged literature and location.", 'https://i.imgur.com/L6KWPmm.png', "#chatubao"),
        new Project('Daydream Nation - Cover', "This project delves into Sonic Youth's groundbreaking 'Daydream Nation' album, celebrated for its influence on alternative rock. Inspired by the band's avant-garde spirit, we've reinterpreted the iconic album cover, blending elements from the original with our unique artistic vision.", 'https://i.imgur.com/CbxhLFi.png', "#chatubao"),
        new Project('American Gangster - Poster', "The 'American Gangster' poster, crafted for a school project back in 2015, seamlessly blends the iconic New York City skyline with the film's gritty underworld narrative. ", 'https://i.imgur.com/cJx2Jb4.png', "#chatubao"),
        new Project('ADMA Revolution - T-shirt', "Crafted as a homage to the historic 25 de abril de 1974, this commemorative t-shirt is designed for ADMA's unique celebration—a visual ode to Portugal's revolutionary past. Serving as a canvas of liberation and unity, each shirt is meticulously handcrafted through manual serigraphy with two vibrant colors.", 'https://i.imgur.com/4AGdqi5.png', "#chatubao"),
        new Project('Gazela - UI/UX Case Study', "Crafting a dynamic online hub seamlessly embedded within Gazela's website, this project invites users to propose, vote, and share causes, fostering a vibrant digital community and amplifying Gazela's online presence.", 'https://i.imgur.com/xp0Dp2I.png', "#chatubao"),
        new Project('Opo Tour - App Thinking', 'The OpoTour project consists of developing an application in partnership with GILT (Isep Instituto Superior de Engenharia do Porto). The theme of the project is Tourism and Leisure and emerged from the prototyping prize of the Metrolab Hackaton e Prototipagem contest in the Porto Metropolitan Area.', 'https://i.imgur.com/lSqwbYI.png', "#chatubao"),
        new Project('Focinhos Felizes - UI/UX Case Study', 'Introducing an innovative digital solution for Focinhos Felizes – a pet hotel nestled in Porto. This project focuses on enhancing user experience and interface through the creation of a dynamic app and desktop website.', 'https://i.imgur.com/O6ka7yJ.png', "#chatubao"),
        new Project('Proibidão - Cover', "Dive into the evocative world of Rokelhe's single 'Proibidão' through its captivating cover art. Inspired by the song's melodic dark vibe and profound themes reminiscent of epic mythological battles, the design features Hercules, liberated in the realm of ancient Gods. Drawing from Vincenzo de Rossi's powerful statue, 'Hercules kills Hippolytus, the Queen of the Amazons', the cover art encapsulates the weight and intensity of Rokelhe's music, inviting listeners on a visual journey through the profound aspects of life.", 'https://i.imgur.com/lY8ZQyo.png', "#chatubao"),
        new Project('Aqua Leve - Water Filter Jug', 'Embark on a journey of clean and refreshing hydration with Aqua Leve, a water filter jug developed in collaboration with CODIL in 2019/2020. This innovative product, is now available in Sonae MC - Continente hypermarkets, brings the purity of filtered water to households across Portugal.', 'https://i.imgur.com/VtvURl1.png', "#chatubao"),
        new Project('Rota Azul - Oporto Tour', "Experience the charm of Oporto in a unique way with 'Rota Azul.' Immerse yourself in the city's beauty as you embark on a tour, meandering through its streets adorned with distinctive ceramic wall tiles. Perfect for both locals and curious foreigners, 'Rota Azul' invites you to explore the city's architectural wonders, creating an unforgettable journey through the heart of Oporto.", 'https://i.imgur.com/Q6iEfY4.png', "#chatubao"),
        new Project('Typography between Cities', "Through carefully crafted posters, we've encapsulated the essence of each city, intertwining captivating visuals with dedicated typography. Immerse yourself in the nostalgia of iconic landmarks, vibrant cultures, and the unique charm that defined these global metropolises during this remarkable era.", 'https://i.imgur.com/PR5p8TH.png', "#chatubao"),
        new Project('Pirigrita - Typeface', "Meet Pirigrita, a 2017-born monospaced typeface intricately designed to capture the essence of lethargy and aversion to the world. Originating from the Latin term 'prigritia', this unique font took center stage in a 2018 poster commemorating Bauhaus' centennial during a workshop with Andreu Balios. Explore the narrative of inactivity and neglect through Pirigrita, a typographic expression that transcends mere letters.", 'https://i.imgur.com/rR1seh8.png', "#chatubao"),
        new Project('Con.do.mí.ni.o - Book', "Enter the world of 'Con.do.mí.ni.o', a captivating book that unfolds within the walls of a shared building. Each page paints a vivid portrait of a tenant, delving into their unique personality traits and the dynamic situations that unfold between them. The book's pagination mirrors the diversity of characters, creating a dynamic reading experience where every turn of the page unveils a new facet of this eclectic community.", 'https://i.imgur.com/5kdlZrf.png', "#chatubao"),
        new Project('Con.do.mí.ni.o - Book', "Explore the evolution of Bauhaus over a century with 'Timeline 100 Years Bauhaus' – a brochure that encapsulates the iconic design movement celebrated in 2018. Immerse yourself in the varied typographies from that era, each page unveiling a different facet of Bauhaus design. Delve into the rich history through anecdotes and curiosities, creating a visually compelling journey that pays homage to the influential design movement.", 'https://i.imgur.com/SoYsXBk.png', "#chatubao"),
        new Project("L'Étranger by Albert Camus", "Unlock the enigma of Albert Camus' L'Étranger with a unique book design. The cover's visual significance remains a mystery until you reach the end, creating a profound connection between the narrative and its external presentation. Immerse yourself in the journey, where the cover's true meaning unfolds only as you conclude the last page, providing a thought-provoking and immersive experience that aligns with the existential themes of the book.", 'https://i.imgur.com/6pCZhxF.png', "#chatubao"),
        new Project('Azulejo - Packaging', "This unique packaging is more than just a container; it becomes a memorable gift as it encases an exquisite tile. Designed to evoke the charm of Porto's architectural identity, Azulejo Packaging seamlessly blends functionality with sentiment, offering a delightful reminder of the city's cultural legacy in every tile.", 'https://i.imgur.com/6Z5iqoB.png', "#chatubao"),
        new Project('Boka - Canteen', "Boka, a graphic identity project for Ceiia, was focused on sustainability and freshness, the project features dynamic weekly menus displayed on posters in the cafeteria. QR codes on printed menus offer convenient digital access. The logo highlights three main dishes, and the seafront-inspired pattern reflects the company's location in Matosinhos. Boka is a swift yet impactful blend of aesthetics and functionality.", 'https://i.imgur.com/mcHKuUP.png', "#chatubao"),
    ];
@endphp

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
                            Step into my creative world, where ideas get translated into pixels. This is my portfolio —
                            a collection of answers to different challenges, solutioned through design. Discover the
                            stories behind each project and feel free to share your insights.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-start m-0 mt-sm-5 mt-3 receive">
                <div class="col-sm-2 col-1 mt-3 d-none d-sm-block">
                    <div class="col-12 p-2 col-sm-12 p-sm-0">
                        <a href="" class="btn-behance p-2 px-3 fixed">
                            Behance
                        </a>
                    </div>
                </div>
                <div class="col-sm-10 col-12 d-none d-sm-block">
                    <div class="row m-0">
                        @php $count = 0; @endphp
                        @foreach ($allProjects as $project)
                            @php
                                $count++;
                            @endphp
                            @if ($count < 5)
                                <div class="col-6 p-2 col-sm-6">
                                    <div class="slide-projects">
                                        <img src="{{ $project->image }}" alt=""
                                            class="img-fluid img-slide-projects">
                                        <div class="overflow">
                                            <div class="content p-5 d-none d-sm-block">
                                                <h3 class="title-project-overflow">{{ $project->title }}</h3>
                                                <p class="description-project-overflow d-sm-block d-none">
                                                    {{ $project->description }}
                                                </p>
                                            </div>
                                            <a href="{{ $project->link}}" class="btn-know-more p-2 px-3">Know More</a>
                                        </div>
                                    </div>
                                </div>
                            @elseif($count >= 5)
                                @if ($count == 5)
                                    <div id="demo-stock" class="row col-12 m-0 p-0 collapse demo-stock">
                                @endif
                                <div class="col-6 p-2 col-sm-6">
                                    <div class="slide-projects">
                                        <img src="{{ $project->image }}" alt=""
                                            class="img-fluid img-slide-projects">
                                        <div class="overflow">
                                            <div class="content p-5 d-none d-sm-block">
                                                <h3 class="title-project-overflow">{{ $project->title }}</h3>
                                                <p class="description-project-overflow">
                                                    {{ $project->description }}
                                                </p>
                                            </div>
                                            <a href="{{ $project->link}}" class="btn-know-more p-2 px-3">Know More</a>
                                        </div>
                                    </div>
                                </div>
                                @if ($loop->last)
                    </div>
                    @endif
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="col-sm-10 col-12 d-block d-sm-none">
                <div class="row m-0">
                    @php $count = 0; @endphp
                    @foreach ($projects as $project)
                        @php
                            $count++;
                        @endphp
                        @if ($count < 4)
                            <div class="col-12 p-2">
                                <div class="slide-projects">
                                    <img src="{{ $project->image }}" alt=""
                                        class="img-fluid img-slide-projects">
                                    <div class="overflow">
                                        <a href="{{ $project->link}}" class="btn-know-more p-2 px-3">Know More</a>
                                    </div>
                                </div>
                            </div>
                        @elseif($count >= 4)
                            @if ($count == 4)
                                <div id="demo-stock" class="row col-12 m-0 p-0 collapse demo-stock">
                            @endif
                            <div class="col-12 p-2">
                                <div class="slide-projects">
                                    <img src="{{ $project->image }}" alt=""
                                        class="img-fluid img-slide-projects">
                                    <div class="overflow">
                                        <a href="{{ $project->link}}" class="btn-know-more p-2 px-3">Know More</a>
                                    </div>
                                </div>
                            </div>
                            @if ($loop->last)
                </div>
                @endif
                @endif
                @endforeach
            </div>
        </div>
        <div class="col-12 p-2 col-sm-12 p-sm-0 text-center mt-4">
            <a class="btn-projects p-2 px-3 demo-stock" style="cursor: pointer" data-toggle="collapse"
                data-target="#demo-stock">
                Want to see more projects?
            </a>
        </div>
        </div>
        </div>
        @include('includes.footer')
        <script>
            document.addEventListener('DOMContentLoaded', () => {

                if (window.innerWidth < 756) {
                    var navbarHeight = document.querySelector('.navbar').offsetHeight;
                    document.querySelector('.container-work').style.marginTop = navbarHeight + 'px';
                } else {
                    var navbarHeight = document.querySelector('.navbar').offsetHeight;
                    document.querySelector('.container-work').style.marginTop = navbarHeight * 2 + 'px';
                }

            });

            document.addEventListener('click', function(event) {
                var target = event.target;
                var demoStockElements = document.querySelectorAll('.demo-stock');

                demoStockElements.forEach(function(divCollapse) {
                    if (target && target.getAttribute('data-toggle') === 'collapse' && target.classList
                        .contains('btn-projects')) {
                        if (target.classList.contains('clicked')) {
                            target.classList.remove('clicked');
                            divCollapse.classList.remove('show');
                            target.innerHTML = "Let's see more projects ⌛";
                        } else {
                            target.classList.add('clicked');
                            divCollapse.classList.add('show');
                            target.innerHTML = 'Show less projects ⌛';
                        }
                    }
                });
            });
        </script>
    </x-slot>
</x-master-layout>
