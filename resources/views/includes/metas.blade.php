<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'AP.') }}</title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
<link rel="icon"
    href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%221.1em%22 font-size=%2270%22>AP.</text></svg>">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}"> --}}

<!-- Scripts -->
{{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
<style>
    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
        font-family: "Roboto", "Courier New", Courier, monospace;
        max-width: 100vw;
        scroll-behavior: smooth;
    }

    body {
        overflow-x: hidden;
        background-color: #01001b;
        color: #ffffff;
    }

    ::-webkit-scrollbar {
        width: 5px;
    }

    ::-webkit-scrollbar-track {
        background-color: #ffffff;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #000000;
        opacity: 0;
        transition: opacity 0.3s;
    }

    ::-webkit-scrollbar-thumb:hover {
        opacity: 1;
    }

    :root {
        --color-bg1: #000000;
        --color-bg2: #010023;
        --color1: 251, 0, 30;
        --color2: 255, 40, 30;
        --color3: 181, 0, 100;
        --color4: 181, 0, 100;
        --color5: 189, 0, 68;
        --color-white: #ffffff;
        --color-interactive: 245, 123, 113;
        --circle-size: 80%;
        --circle-interactive-size: 40%;
        --blending: hard-light;
    }

    @keyframes moveInCircle {
        0% {
            transform: rotate(0deg);
        }

        50% {
            transform: rotate(180deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes moveVertical {
        0% {
            transform: translateY(-50%);
        }

        50% {
            transform: translateY(50%);
        }

        100% {
            transform: translateY(-50%);
        }
    }

    @keyframes moveHorizontal {
        0% {
            transform: translateX(-50%) translateY(-10%);
        }

        50% {
            transform: translateX(50%) translateY(10%);
        }

        100% {
            transform: translateX(-50%) translateY(-10%);
        }
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @keyframes sliderTextLeft {
        0% {
            transform: translateX(0%);
        }

        100% {
            transform: translateX(-500%);
        }
    }

    @keyframes sliderTextRight {
        0% {
            transform: translateX(-500%);
        }

        100% {
            transform: translateX(0%);
        }
    }

    @keyframes globeBounce {
        0% {
            transform: translate(-50%, -40%);
        }

        50% {
            transform: translate(-50%, -60%);
        }

        100% {
            transform: translate(-50%, -40%);
        }
    }

    @keyframes globe {
        0% {
            transform: translate(-50%, -50%) rotate(15deg);
        }

        50% {
            transform: translate(-50%, -50%) rotate(-15deg);
        }

        100% {
            transform: translate(-50%, -50%) rotate(15deg);
        }
    }

    @keyframes circle1 {
        0% {
            border-radius: 50%;
            box-shadow: inset 0.1em 0px 0px 0.08em var(--color-white);
            width: 100%;
        }

        49% {
            border-radius: 50%;
            box-shadow: inset 0.1em 0px 0px 0.08em var(--color-white);
            background: transparent;
        }

        50% {
            border-radius: 0%;
            width: 0.175em;
            background: var(--color-white);
        }

        51% {
            border-radius: 50%;
            box-shadow: inset -0.1em 0px 0px 0.08em var(--color-white);
            background: transparent;
        }

        100% {
            border-radius: 50%;
            box-shadow: inset -0.1em 0px 0px 0.08em var(--color-white);
            width: 100%;
        }
    }

    nav {
        background-color: transparent;
        z-index: 9999;
        top: 0;
    }

    .opacity-navbar-local-time {
        opacity: 0;
        position: absolute;
        top: -30rem;
    }

    .gradient-transition-top,
    .gradient-transition-bottom {
        position: absolute;
        width: 100%;
        height: 50%;
    }

    .gradient-transition-bottom {
        top: -2px;
        left: 0;
        z-index: 1;
        background: linear-gradient(180deg, #01001b 0%, rgba(1, 0, 27, 0) 100%);
    }

    .gradient-transition-top {
        bottom: -2px;
        left: 0;
        z-index: 2;
        background: linear-gradient(360deg, #01001b 0%, rgba(1, 0, 27, 0) 100%);
    }

    .margin-y-80 {
        margin-top: 5rem;
        margin-bottom: 5rem;
    }

    .margin-mb-80 {
        margin-bottom: 5rem;
    }

    .navbar-top-opacity {
        opacity: 0;
    }

    .preloader {
        height: 0;
        opacity: 0;
        width: 100vw;
        position: fixed;
        z-index: 100;
        transition: opacity 0.5s ease;
        background: linear-gradient(48deg, var(--color-bg2), var(--color-bg1));
    }

    .gradient-bg {
        width: 100vw;
        height: 100vh;
        position: relative;
        overflow: hidden;
        background: linear-gradient(40deg, var(--color-bg1), var(--color-bg2));
    }

    .container-footer {
        width: 100vw;
        height: 100vh;
        position: relative;
        overflow: hidden;
        background: linear-gradient(40deg, var(--color-bg1), var(--color-bg2));
    }

    .canvas-container {
        position: relative;
    }

    canvas {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 0;
        width: 100%;
        height: 100%;
    }

    .progress-text {
        color: #ffffff;
        font-size: 3.5rem;
        margin: 0;
        text-align: right;
        opacity: 1;
        transition: opacity 0.3s ease-in-out;
    }

    .div-text-hello {
        position: absolute;
        bottom: 5%;
        left: 5%;
        width: 90%;
        z-index: 1;
        pointer-events: none;
    }

    .title-hello {
        color: #ffffff;
        font-size: 12rem;
        margin: 0;
        line-height: .8;
    }

    .text-hello {
        color: #fff;
        font-size: 3.5rem;
        margin: 0.625rem 0.938rem;
        line-height: 0;
    }

    .opacity-load-nav,
    .opacity-load-banner,
    .navbar-top {
        opacity: 1;
        transition: opacity 0.8s ease-in-out;
    }

    .navbar-brand img {
        max-width: 4.375rem;
        filter: invert(1);
    }

    .nav-item a {
        color: #ffffff;
        text-decoration: none;
        font-size: 1.25rem;
        padding: 0.5rem 1rem;
        border: 0.063rem solid transparent;
        border-radius: 1.563rem;
        transition: ease-in-out 0.7s;
    }

    .nav-item a:hover {
        border: 0.063rem solid #ffffff;
        border-radius: 1.563rem;
        background-color: #ffffff20;
    }

    a.link-navbar.active {
        border: 0.063rem solid #ffffff;
        border-radius: 1.563rem;
        background-color: #ffffff20;
    }

    .navbar-toggler:focus {
        box-shadow: none;
    }

    .width-banner {
        width: 100%;
        height: 100vh;
        position: relative;
    }

    .pic-ale {
        z-index: 2;
    }

    .located-in-pt {
        position: absolute;
        z-index: 3;
        background-color: #ffffff19;
        bottom: 45%;
        width: 18rem;
        height: 5.938rem;
        border-top-right-radius: 3.125rem;
        border-bottom-right-radius: 3.125rem;
    }

    .text-right-banner {
        position: absolute;
        z-index: 3;
        bottom: 47%;
        right: 3%;
        color: #ffffff;
        font-size: 2rem;
        line-height: 2.2rem;
    }

    .img-located-in-pt {
        position: absolute;
        right: 1.25rem;
        top: 1rem;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
    }

    .img-located-in-pt img {
        width: 80%;
        margin: 0 auto;
    }

    .text-located-in-pt {
        position: absolute;
        top: 1.875rem;
        left: 4.5rem;
        color: #ffffff;
        line-height: 1rem;
        text-align: start;
        font-size: 0.96rem;
        width: 30%;
    }

    .text-name-main-banner {
        position: absolute;
        bottom: 12%;
        width: 100%;
        white-space: nowrap;
        overflow: hidden;
        z-index: 3;
    }

    .text-name-main-banner p {
        color: #ffffff;
        text-align: center;
        font-size: 10rem;
        transition: all 0.5s;
        animation: sliderTextLeft 45s linear infinite;
    }

    .text-inside-banner {
        position: absolute;
        bottom: 5%;
        width: 100%;
        white-space: nowrap;
        overflow: hidden;
        z-index: 3;
    }

    .text-inside-banner p {
        color: #ffffff;
        text-align: center;
        font-size: 3.5rem;
        transition: all 0.5s;
        animation: sliderTextRight 45s linear infinite;
    }

    .text-scroll-banner {
        position: absolute;
        bottom: 0%;
        width: 100%;
        white-space: nowrap;
        overflow: hidden;
        z-index: 3;
        opacity: 1;
        transition: all 0.5s ease-in-out;
    }

    .text-scroll-banner p {
        color: #ffffff;
        text-align: center;
        font-size: 1rem;
        line-height: 1rem;
    }

    .navbar-footer {
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }

    .text-lets-work-together,
    .disable-events {
        pointer-events: none;
    }

    .fixed-footer-bottom {
        position: absolute;
        bottom: 0%;
    }

    .text-lets-work-together {
        position: absolute;
        bottom: 12%;
        width: 100%;
    }

    .text-lets-work-together p {
        color: #ffffff;
        text-align: center;
        font-size: 13rem;
        line-height: 15.625rem;
        transition: all 0.5s;
        animation: sliderTextLeft 45s linear infinite;
        text-wrap: nowrap;
    }

    @media (min-width: 1650px) {
        .pic-ale {
            bottom: 0;
        }
    }

    @media (min-width: 1100px) {
        .img-located-in-pt img:hover {
            animation: rotate 8s linear infinite;
        }
    }

    @media (max-width: 756px) {
        .nav-item a {
            border: 0.063rem solid #ffffff;
        }

        .navbar-toggler-icon {
            filter: invert(1);
        }

        .navbar-toggler {
            border: 0.063rem solid #ffffff;
            border-radius: 1.563rem;
        }

        .div-text-hello{
            bottom: 10%;
        }

        .title-hello {
            font-size: 9rem;
        }

        .text-hello,
        .progress-text {
            font-size: 1.5rem;
        }

        .text-right-banner {
            bottom: 5%;
        }

        .text-name-main-banner {
            bottom: 15%;
        }

        .text-inside-banner{
            bottom: 8%;
        }

        .text-name-main-banner p,
        .text-lets-work-together p {
            font-size: 8rem;
            text-align: start;
            padding: 1rem;
            line-height: 4rem;
        }

        .text-inside-banner p {
            font-size: 3rem;
        }

        .pic-ale {
            bottom: 0;
        }

        li.nav-item {
            margin: 0 auto;
        }

        .nav-item a {
            display: block;
            width: 130px;
        }
    }

    /* digital ball */
    .line-globe {
        overflow: visible;
        z-index: 5;
    }

    .digital-ball {
        width: clamp(9em, 12vw, 11em);
        height: clamp(9em, 12vw, 11em);
        background: var(--color-dark);
        border-radius: 50%;
        top: 32px;
        left: 32px;
        transform: translate(-50%, -50%);
        position: absolute;
        z-index: 1;
        overflow: hidden;
        background: var(--color-blue);
    }

    .digital-ball .overlay {
        opacity: 0;
        transition: opacity 1s ease-in-out;
        animation: digitalball 6s ease-in-out infinite;
    }

    .line-globe .digital-ball:hover .overlay {
        opacity: 1;
    }

    .globe {
        position: absolute;
        z-index: 1;
        top: 50%;
        left: 50%;
        width: 3em;
        height: 3em;
        transform: translate(-50%, -50%);
        border-radius: 50%;
        overflow: hidden;
        will-change: transform;
    }

    .globe-wrap {
        top: 50%;
        left: 50%;
        width: 100%;
        height: 100%;
        position: absolute;
        z-index: 1;
        display: block;
        border-radius: 50%;
        transform: translate(-50%, -50%) rotate(30deg);
        animation: globe 5.4s cubic-bezier(0.35, 0, 0.65, 1) infinite;
        overflow: hidden;
        box-shadow: inset 0px 0px 0px 0.125em var(--color-white);
    }

    .globe .circle {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        height: 100%;
        transform: translate(-50%, -50%);
        border-radius: 50%;
        box-shadow: inset 0.1em 0px 0px 0.08em var(--color-white);
        animation: circle1 2.7s linear infinite;
        font-size: 0.75em;
        z-index: 1;
    }

    .globe :nth-child(1) {
        animation-delay: -1.8s;
    }

    .globe :nth-child(2) {
        animation-delay: -0.9s;
    }

    .globe .circle-hor {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 150%;
        transform: translate(-50%, -50%);
        border-radius: 50%;
        height: 55%;
        box-shadow: inset 0px 0px 0px 0.15em var(--color-white);
        font-size: 0.75em;
        z-index: 1;
    }

    .globe .circle-hor-middle {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 150%;
        transform: translate(-50%, -50%);
        border-radius: 0%;
        height: 0.15em;
        background: var(--color-white);
        font-size: 0.75em;
        z-index: 1;
    }

    @media screen and (max-width: 1000px) {
        .digital-ball {
            transform: translate(-20%, -50%);
        }
    }

    /* end digital ball */
</style>
@section('style-include')
@show
