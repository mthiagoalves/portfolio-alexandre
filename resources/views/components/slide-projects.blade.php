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
        background-color: #202423d6;
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
        max-height: 42px;
        color: #EBEBEB;
        text-decoration: none;
        font-size: 1.25rem;
        border: 0.063rem solid #EBEBEB;
        border-radius: 1.563rem;
        transition: ease-in-out 0.7s;
        position: absolute;
        bottom: 8%;
        right: 12%;
        display: flex;
        align-items: center;
    }

    .btn-know-more:hover {
        border: 0.063rem solid #EBEBEB;
        border-radius: 1.563rem;
        background-color: #EBEBEB20;
    }

    .tag-projects-overflow {
        color: #EBEBEB;
        text-decoration: none;
        font-size: .9rem;
        border: 1px solid #EBEBEB;
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
        @for ($i = 0; $i < 2; $i++)
            <div class="swiper-slide">
                <div class="slide-projects">
                    <img src="https://i.imgur.com/xp0Dp2I.png" alt="" class="img-fluid img-slide-projects">
                    <div class="overflow">
                        <div class="content p-5">
                            <h3 class="title-project-overflow">Gazela - UI/UX Case Study</h3>
                            <p class="description-project-overflow d-sm-block d-none">Crafting a dynamic online hub
                                seamlessly embedded within Gazela's website, this project invites users to propose,
                                vote,
                                and share causes, fostering a vibrant digital community and amplifying Gazela's online
                                presence.</p>
                            <p class="description-project-overflow d-sm-none d-block">
                                {{ strlen("Crafting a dynamic online hub seamlessly embedded within Gazela's website, this project invites users to propose, vote, and share causes, fostering a vibrant digital community and amplifying Gazela's online presence.") > 210 ? substr("Crafting a dynamic online hub seamlessly embedded within Gazela's website, this project invites users to propose, vote, and share causes, fostering a vibrant digital community and amplifying Gazela's online presence.", 0, 210) . '...' : "Crafting a dynamic online hub seamlessly embedded within Gazela's website, this project invites users to propose, vote, and share causes, fostering a vibrant digital community and amplifying Gazela's online presence." }}
                            </p>
                        </div>
                        <div class="col-sm-12 col-12 my-4 my-sm-3">
                            <a href="https://www.behance.net/gallery/186955825/Gazela-UIUX-Case-Study" target="_blank" class="btn-know-more p-2 px-4">Know More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slide-projects">
                    <img src="https://i.imgur.com/O6ka7yJ.png" alt="" class="img-fluid img-slide-projects">
                    <div class="overflow">
                        <div class="content p-5">
                            <h3 class="title-project-overflow">Focinhos Felizes - UI/UX Case Study</h3>
                            <p class="description-project-overflow d-sm-block d-none">Introducing an innovative digital
                                solution for Focinhos Felizes – a pet hotel nestled in Porto. This project focuses on
                                enhancing user experience and interface through the creation of a dynamic app and
                                desktop
                                website.</p>
                            <p class="description-project-overflow d-sm-none d-block">
                                {{ strlen('Introducing an innovative digital solution for Focinhos Felizes – a pet hotel nestled in Porto. This project focuses on enhancing user experience and interface through the creation of a dynamic app and desktop website.') > 160 ? substr('Introducing an innovative digital solution for Focinhos Felizes – a pet hotel nestled in Porto. This project focuses on enhancing user experience and interface through the creation of a dynamic app and desktop website.', 0, 160) . '...' : 'Introducing an innovative digital solution for Focinhos Felizes – a pet hotel nestled in Porto. This project focuses on enhancing user experience and interface through the creation of a dynamic app and desktop website.' }}
                            </p>
                        </div>
                        <div class="col-sm-12 col-12 my-4 my-sm-3">
                            <a href="https://www.behance.net/gallery/178772159/Focinhos-Felizes-Pet-Hotel-UIUX-Case-Study" class="btn-know-more p-2 px-4" target="_blank">Know More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slide-projects">
                    <img src="https://i.imgur.com/lSqwbYI.png" alt="" class="img-fluid img-slide-projects">
                    <div class="overflow">
                        <div class="content p-5">
                            <h3 class="title-project-overflow">Opo Tour - App Thinking</h3>
                            <p class="description-project-overflow d-sm-block d-none">The OpoTour project consists of
                                developing an application in partnership with GILT (ISEP Instituto Superior de
                                Engenharia do
                                Porto). The theme of the project is Tourism and Leisure and emerged from the prototyping
                                prize of the Metrolab Hackaton e Prototipagem contest in the Porto Metropolitan Area.
                            </p>
                            <p class="description-project-overflow d-sm-none d-block">
                                {{ strlen('The OpoTour project consists of developing an application in partnership with GILT (ISEP Instituto Superior de Engenharia do Porto). The theme of the project is Tourism and Leisure and emerged from the prototyping prize of the Metrolab Hackaton e Prototipagem contest in the Porto Metropolitan Area.') > 160 ? substr('The OpoTour project consists of developing an application in partnership with GILT (ISEP Instituto Superior de Engenharia do Porto). The theme of the project is Tourism and Leisure and emerged from the prototyping prize of the Metrolab Hackaton e Prototipagem contest in the Porto Metropolitan Area.', 0, 160) . '...' : 'The OpoTour project consists of developing an application in partnership with GILT (ISEP Instituto Superior de Engenharia do Porto). The theme of the project is Tourism and Leisure and emerged from the prototyping prize of the Metrolab Hackaton e Prototipagem contest in the Porto Metropolitan Area.' }}
                            </p>
                        </div>
                        <div class="col-sm-12 col-12 my-4 my-sm-3">
                            <a href="https://www.behance.net/gallery/86739339/Opo-Tour" class="btn-know-more p-2 px-4" target="_blank">Know More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slide-projects">
                    <img src="https://i.imgur.com/WUZDJUJ.png" alt="" class="img-fluid img-slide-projects">
                    <div class="overflow">
                        <div class="content p-5">
                            <h3 class="title-project-overflow">Late Evening Club - Techno Event</h3>
                            <p class="description-project-overflow d-sm-block d-none">Late Evening Club is your ticket
                                to a
                                one-of-a-kind nightlife experience, as the creative force behind the project, my role
                                was to
                                shape the club's identity, merging cool vibes with cutting-edge visuals to offer an
                                unforgettable night out. Join us as we redefine the nightlife scene, breaking free from
                                the
                                norm and fostering a community that leaves a lasting impact on the cultural landscape.
                            </p>
                            <p class="description-project-overflow d-sm-none d-block">
                                {{ strlen("Late Evening Club is your ticket to a one-of-a-kind nightlife experience, as the creative force behind the project, my role was to shape the club's identity, merging cool vibes with cutting-edge visuals to offer an unforgettable night out. Join us as we redefine the nightlife scene, breaking free from the norm and fostering a community that leaves a lasting impact on the cultural landscape.") > 160? substr("Late Evening Club is your ticket to a one-of-a-kind nightlife experience, as the creative force behind the project, my role was to shape the club's identity, merging cool vibes with cutting-edge visuals to offer an unforgettable night out. Join us as we redefine the nightlife scene, breaking free from the norm and fostering a community that leaves a lasting impact on the cultural landscape.", 0, 160) . '...': "Late Evening Club is your ticket to a one-of-a-kind nightlife experience, as the creative force behind the project, my role was to shape the club's identity, merging cool vibes with cutting-edge visuals to offer an unforgettable night out. Join us as we redefine the nightlife scene, breaking free from the norm and fostering a community that leaves a lasting impact on the cultural landscape." }}
                            </p>
                        </div>
                        <div class="col-sm-12 col-12 my-4 my-sm-3">
                            <a href="https://www.behance.net/gallery/187004763/Techno-Event" class="btn-know-more p-2 px-4" target="_blank">Know More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slide-projects">
                    <img src="https://i.imgur.com/4AGdqi5.png" alt="" class="img-fluid img-slide-projects">
                    <div class="overflow">
                        <div class="content p-5">
                            <h3 class="title-project-overflow">ADMA Revolution - T-shirt</h3>
                            <p class="description-project-overflow d-sm-block d-none">Crafted as a homage to the
                                historic 25
                                de abril de 1974, this commemorative t-shirt is designed for ADMA's unique celebration—a
                                visual ode to Portugal's revolutionary past. Serving as a canvas of liberation and
                                unity,
                                each shirt is meticulously handcrafted through manual serigraphy.</p>
                            <p class="description-project-overflow d-sm-none d-block">
                                {{ strlen("Crafted as a homage to the historic 25 de abril de 1974, this commemorative t-shirt is designed for ADMA's unique celebration—a visual ode to Portugal's revolutionary past. Serving as a canvas of liberation and unity, each shirt is meticulously handcrafted through manual serigraphy.") > 160 ? substr("Crafted as a homage to the historic 25 de abril de 1974, this commemorative t-shirt is designed for ADMA's unique celebration—a visual ode to Portugal's revolutionary past. Serving as a canvas of liberation and unity, each shirt is meticulously handcrafted through manual serigraphy.", 0, 160) . '...' : "Crafted as a homage to the historic 25 de abril de 1974, this commemorative t-shirt is designed for ADMA's unique celebration—a visual ode to Portugal's revolutionary past. Serving as a canvas of liberation and unity, each shirt is meticulously handcrafted through manual serigraphy." }}
                            </p>
                        </div>
                        <div class="col-sm-12 col-12 my-4 my-sm-3">
                            <a href="https://www.behance.net/gallery/187159077/ADMA-REVOLUTION" class="btn-know-more p-2 px-4" target="_blank">Know More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slide-projects">
                    <img src="https://i.imgur.com/lY8ZQyo.png" alt="" class="img-fluid img-slide-projects">
                    <div class="overflow">
                        <div class="content p-5">
                            <h3 class="title-project-overflow">Proibidão - Cover</h3>
                            <p class="description-project-overflow d-sm-block d-none">This cover art was inspired by the
                                song's melodic dark vibe and profound themes. The cover encapsulates the weight and
                                intensity of Rokelhe's music, inviting listeners on a visual journey through the
                                profound
                                aspects of life.</p>
                            <p class="description-project-overflow d-sm-none d-block">
                                {{ strlen("This cover art was inspired by the song's melodic dark vibe and profound themes. The cover encapsulates the weight and intensity of Rokelhe's music, inviting listeners on a visual journey through the profound aspects of life.") > 160 ? substr("This cover art was inspired by the song's melodic dark vibe and profound themes. The cover encapsulates the weight and intensity of Rokelhe's music, inviting listeners on a visual journey through the profound aspects of life.", 0, 160) . '...' : "This cover art was inspired by the song's melodic dark vibe and profound themes. The cover encapsulates the weight and intensity of Rokelhe's music, inviting listeners on a visual journey through the profound aspects of life." }}
                            </p>
                        </div>
                        <div class="col-sm-12 col-12 my-4 my-sm-3">
                            <a href="https://www.behance.net/gallery/186507573/Proibidao-Rokelhe" class="btn-know-more p-2 px-4" target="_blank">Know More</a>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
