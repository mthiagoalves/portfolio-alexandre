@section('meta')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
@endsection

<style>
    .title-about-me,
    .title-work-experience,
    .title-skills,
    .title-languages {
        font-size: 1rem;
        font-weight: 500;
    }

    .text-about-me,
    .text-skills,
    .text-languages {
        font-size: 1.8rem;
        line-height: normal;
        letter-spacing: .07rem;
    }

    .subtitle-work-experience {
        font-size: 1.25rem;
        font-weight: 500;
        margin: 0;
    }

    .text-work-experience {
        font-size: 1.25rem;
        margin: 0;
    }

    .btn-lkd,
    .btn-skills {
        text-decoration: none;
        font-size: 1.25rem;
        border: 0.063rem solid #EBEBEB;
        border-radius: 1.563rem;
        transition: ease-in-out 0.7s;
        color: #EBEBEB;
        width: 18rem;
        height: 2.625rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-lkd:hover,
    .btn-skills:hover {
        background-color: #EBEBEB20;
    }

    .btn {
        transition: opacity 0.7s;
    }

    .btn-hidden {
        opacity: 0;
    }

    .border-div {
        border-top: 1px solid #EBEBEB20;
    }

    @media(min-width: 756px) {
        .text-name-main-banner {
            bottom: 0% !important;
        }
    }


    @media(max-width: 756px) {

        .title-about-me,
        .title-work-experience,
        .title-skills,
        .title-languages {
            font-size: 1rem;
            font-weight: 400;
        }


        .text-about-me,
        .text-skills,
        .text-languages {
            font-size: 1.3rem;
            line-height: 1.8rem;
            letter-spacing: 0rem;
        }
    }
</style>

<x-master-layout>
    <x-slot name="content">
        <div class="container p-0 margin-y-80">
            <div class="row justify-content-between m-0">
                <div class="col-sm-2 col-12 ">
                    <div class="col-12 p-2 col-sm-12 p-sm-0">
                        <p class="title-about-me">
                            About me
                        </p>
                    </div>
                </div>
                <div class="col-sm-10 col-12 div-text-right-in-mobile">
                    <div class="col-11 p-2 col-sm-12 p-sm-0">
                        <p class="text-about-me pb-3">
                            Hello, my name’s Alexandre Piedade, I’m a junior UI/UX Designer from Porto, Portugal. I'm
                            excited to kickstart my career in user experience and interface design and make a real
                            difference. My passion lies in crafting intuitive interfaces, conducting user research, and
                            bringing creative concepts to life.
                        </p>
                        <p class="text-about-me pb-3">
                            When I'm not immersed in the world of design, you'll find me exploring my love for
                            motorcycles, traveling to new places, or trying to figure out how many designer handbags can
                            actually fit in my closet.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between margin-y-80">
                <div class="col-sm-2 col-12">
                    <div class="col-12 p-2 col-sm-12 p-sm-0">
                        <p class="title-work-experience">
                            Work Experience
                        </p>
                    </div>
                </div>
                <div class="col-sm-10 col-12 p-0 pb-sm-3 pb-3">
                    <div class="row m-0">
                        <div class="col-sm-2 col-12">
                            <div class="col-12 p-2 col-sm-12 p-sm-0">
                                <p class="subtitle-work-experience">
                                    2022 - 2023
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="col-12 p-2 col-sm-12 p-sm-0">
                                <p class="subtitle-work-experience">
                                    Covet Group
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="col-11 p-2 col-sm-12 p-sm-0">
                                <p class="text-work-experience">
                                    Graphic Designer for Circu, Brabbu, Maison Valentina & Rug’Society · Circu’s Account
                                    Manager
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-12 offset-sm-2 p-0 py-3 border-div">
                    <div class="row m-0">
                        <div class="col-sm-2 col-12">
                            <div class="col-12 p-2 col-sm-12 p-sm-0">
                                <p class="subtitle-work-experience">
                                    2021 - 2022
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="col-12 p-2 col-sm-12 p-sm-0">
                                <p class="subtitle-work-experience">
                                    Wedding Media International <br> & Porto de Ideias</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="col-11 p-2 col-sm-12 p-sm-0">
                                <p class="text-work-experience">
                                    Graphic Designer
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-12 offset-sm-2 p-0 py-4 border-div">
                    <div class="row m-0">
                        <div class="col-sm-2 col-12">
                            <div class="col-12 p-2 col-sm-12 p-sm-0">
                                <p class="subtitle-work-experience">
                                    2018 - 2022
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="col-12 p-2 col-sm-12 p-sm-0">
                                <p class="subtitle-work-experience">Iloft Porto</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="col-11 p-2 col-sm-12 p-sm-0">
                                <p class="text-work-experience">
                                    Head Designer & Barman
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-12 offset-sm-2 p-0 py-4 border-div">
                    <div class="row m-0">
                        <div class="col-sm-2 col-12">
                            <div class="col-12 p-2 col-sm-12 p-sm-0">
                                <p class="subtitle-work-experience">
                                    2017 - Present
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="col-12 p-2 col-sm-12 p-sm-0">
                                <p class="subtitle-work-experience">Freelancer</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="col-11 p-2 col-sm-12 p-sm-0">
                                <p class="text-work-experience">
                                    Designer
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-12 offset-sm-2 p-0 py-4 border-div">
                    <div class="row m-0">
                        <div class="col-sm-2 col-12">
                            <div class="col-12 p-2 col-sm-12 p-sm-0">
                                <p class="subtitle-work-experience">
                                    2016 - 2021
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="col-12 p-2 col-sm-12 p-sm-0">
                                <p class="subtitle-work-experience">Industria Club </p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="col-11 p-2 col-sm-12 p-sm-0">
                                <p class="text-work-experience">
                                    Barman & Barback
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-12 offset-sm-2 p-0 py-4 border-div">
                    <div class="row m-0">
                        <div class="col-sm-2 col-12">
                            <div class="col-12 p-2 col-sm-12 p-sm-0">
                                <p class="subtitle-work-experience">
                                    2016 - 2018
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="col-12 p-2 col-sm-12 p-sm-0">
                                <p class="subtitle-work-experience">Varanda do Sol </p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="col-11 p-2 col-sm-12 p-sm-0">
                                <p class="text-work-experience">
                                    Pizzaiolo & Waiter
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-12 offset-sm-2 mt-4 text-sm-start text-center">
                    <a href="#" class="btn-lkd p-2 px-3">
                        Want to see my Linkedin?
                    </a>
                </div>
            </div>
            <div class="row justify-content-between margin-y-80">
                <div class="col-sm-2 col-12 ">
                    <div class="col-12 p-2 col-sm-12 p-sm-0">
                        <p class="title-skills">
                            Skills
                        </p>
                    </div>
                </div>
                <div class="col-sm-10 col-12">
                    <div class="col-11 p-2 col-sm-12 p-sm-0">
                        <p class="text-skills pb-3">
                            User Interface Design · User Experience Design · Problem Solving · Research Skills · Design
                            Thinking · Website Design · Editorial Design · Brand Identity · Package Design · Graphic
                            Design
                            · Product Design · Photography · Printing
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between margin-y-80">
                <div class="col-sm-2 col-12">
                    <div class="col-12 p-2 col-sm-12 p-sm-0">
                        <p class="title-work-experience">
                            Education
                        </p>
                    </div>
                </div>
                <div class="col-10 p-0 pb-4">
                    <div class="row m-0">
                        <div class="col-sm-2 col-12">
                            <div class="col-12 p-2 col-sm-12 p-sm-0">
                                <p class="subtitle-work-experience">
                                    2023
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="col-12 p-2 col-sm-12 p-sm-0">
                                <p class="subtitle-work-experience">
                                    EDIT. - Disruptive Digital Education
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="col-11 p-2 col-sm-12 p-sm-0">
                                <p class="text-work-experience">
                                    Postgrad in User Experience & User Interface Design
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-12 offset-sm-2 p-0 py-4 border-div">
                    <div class="row m-0">
                        <div class="col-sm-2 col-12">
                            <div class="col-12 p-2 col-sm-12 p-sm-0">
                                <p class="subtitle-work-experience">
                                    2019 - 2021
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="col-12 p-2 col-sm-12 p-sm-0">
                                <p class="subtitle-work-experience">
                                    University of Porto FBAUP / FEUP</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="col-11 p-2 col-sm-12 p-sm-0">
                                <p class="text-work-experience">
                                    Master’s degree in Industrial and Product Design
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-12 offset-sm-2 p-0 py-4 border-div">
                    <div class="row m-0">
                        <div class="col-sm-2 col-12">
                            <div class="col-12 p-2 col-sm-12 p-sm-0">
                                <p class="subtitle-work-experience">
                                    2016 - 2019
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="col-12 p-2 col-sm-12 p-sm-0">
                                <p class="subtitle-work-experience">ESAD - Matosinhos</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="col-11 p-2 col-sm-12 p-sm-0">
                                <p class="text-work-experience">
                                    Bachelor’s degree in Graphic & Communication Design
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-12 offset-sm-2 p-0 py-4 border-div">
                    <div class="row m-0">
                        <div class="col-sm-2 col-12">
                            <div class="col-12 p-2 col-sm-12 p-sm-0">
                                <p class="subtitle-work-experience">
                                    2013 - 2016
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="col-12 p-2 col-sm-12 p-sm-0">
                                <p class="subtitle-work-experience">EASR - Porto</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="col-11 p-2 col-sm-12 p-sm-0">
                                <p class="text-work-experience">
                                    Artistic Course, Specialized in Graphic Design
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-12 offset-sm-2 mt-4 text-sm-start text-center">
                    <a href="#" class="btn-skills p-2 px-3">
                        Wanna see some projects?
                    </a>
                </div>
            </div>
            <div class="row justify-content-between margin-y-80">
                <div class="col-sm-2 col-12 ">
                    <div class="col-12 p-2 col-sm-12 p-sm-0">
                        <p class="title-languages">
                            Languages
                        </p>
                    </div>
                </div>
                <div class="col-sm-10 col-12">
                    <div class="col-11 p-2 col-sm-12 p-sm-0">
                        <p class="text-languages pb-3">
                            Portuguese · English · Spanish
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @include('includes.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            const buttonLkd = document.querySelector('.btn-lkd');
            const buttonSkills = document.querySelector('.btn-skills');

            buttonLkd.addEventListener('mouseover', function() {
                buttonLkd.classList.add('btn-hidden');
                setTimeout(() => {
                    buttonLkd.textContent = "Let's see my Linkedin 😎";
                    buttonLkd.classList.remove('btn-hidden');
                }, 300);
            });

            buttonLkd.addEventListener('mouseout', function() {
                buttonLkd.classList.add('btn-hidden');
                setTimeout(() => {
                    buttonLkd.textContent = "Want to see my Linkedin?";
                    buttonLkd.classList.remove('btn-hidden');
                }, 300);
            });

            buttonSkills.addEventListener('mouseover', function() {
                buttonSkills.classList.add('btn-hidden');
                setTimeout(() => {
                    buttonSkills.textContent = "Let's see some projects 🎨";
                    buttonSkills.classList.remove('btn-hidden');
                }, 300);
            });

            buttonSkills.addEventListener('mouseout', function() {
                buttonSkills.classList.add('btn-hidden');
                setTimeout(() => {
                    buttonSkills.textContent = "Want to see some projects?";
                    buttonSkills.classList.remove('btn-hidden');
                }, 300);
            });
        </script>
    </x-slot>
</x-master-layout>
