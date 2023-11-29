<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vite + TS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@700&display=swap" rel="stylesheet">

</head>

<body>
    <style>
        html,
        body {
            font-family: 'Dongle', sans-serif;
            margin: 0;
            padding: 0;
        }

        .text-container {
            z-index: 100;
            width: 100vw;
            height: 100vh;
            display: flex;
            position: absolute;
            top: 0;
            left: 0;
            justify-content: center;
            align-items: center;
            font-size: 96px;
            color: white;
            opacity: 0.8;
            user-select: none;
            text-shadow: 1px 1px rgba(0, 0, 0, 0.1);
        }

        :root {
            --color-bg1: #000000;
            --color-bg2: #230000;
            --color1: 255, 123, 46;
            --color2: 205, 0, 96;
            --color3: 255, 0, 34;
            --color4: 3, 1, 51;
            --color5: 50, 2, 133;
            --color-interactive: 245, 123, 113;
            --circle-size: 80%;
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

        .gradient-bg {
            width: 100vw;
            height: 100vh;
            position: relative;
            overflow: hidden;
            background: linear-gradient(40deg, var(--color-bg1), var(--color-bg2));
            top: 0;
            left: 0;
        }

        .gradient-bg svg {
            display: none;
        }

        .gradient-bg .gradients-container {
            filter: url(#goo) blur(40px);
            width: 100%;
            height: 100%;
        }

        .gradient-bg .g1 {
            position: absolute;
            background: radial-gradient(circle at center, rgba(var(--color1)) 0, rgba(var(--color1)) 50%) no-repeat;
            mix-blend-mode: var(--blending);
            width: var(--circle-size);
            height: var(--circle-size);
            top: calc(50% - var(--circle-size) / 2);
            left: calc(50% - var(--circle-size) / 2);
            transform-origin: center center;
            animation: moveVertical 30s ease infinite;
            opacity: 1;
        }

        .gradient-bg .g2 {
            position: absolute;
            background: radial-gradient(circle at center, rgba(var(--color2)) 0, rgba(var(--color2)) 50%) no-repeat;
            mix-blend-mode: var(--blending);
            width: var(--circle-size);
            height: var(--circle-size);
            top: calc(50% - var(--circle-size) / 2);
            left: calc(50% - var(--circle-size) / 2);
            transform-origin: calc(50% - 400px);
            animation: moveInCircle 20s reverse infinite;
            opacity: 1;
        }

        .gradient-bg .g3 {
            position: absolute;
            background: radial-gradient(circle at center, rgba(var(--color3)) 0, rgba(var(--color3)) 50%) no-repeat;
            mix-blend-mode: var(--blending);
            width: var(--circle-size);
            height: var(--circle-size);
            top: calc(50% - var(--circle-size) / 2 + 200px);
            left: calc(50% - var(--circle-size) / 2 - 500px);
            transform-origin: calc(50% + 400px);
            animation: moveInCircle 40s linear infinite;
            opacity: 1;
        }

        .gradient-bg .g4 {
            position: absolute;
            background: radial-gradient(circle at center, rgba(var(--color4)) 0, rgba(var(--color4)) 50%) no-repeat;
            mix-blend-mode: var(--blending);
            width: var(--circle-size);
            height: var(--circle-size);
            top: calc(50% - var(--circle-size) / 2);
            left: calc(50% - var(--circle-size) / 2);
            transform-origin: calc(50% - 200px);
            animation: moveHorizontal 40s ease infinite;
            opacity: 0.7;
        }

        .gradient-bg .g5 {
            position: absolute;
            background: radial-gradient(circle at center, rgba(var(--color5)) 0, rgba(var(--color5)) 50%) no-repeat;
            mix-blend-mode: var(--blending);
            width: calc(var(--circle-size) * 2);
            height: calc(var(--circle-size) * 2);
            top: calc(50% - var(--circle-size));
            left: calc(50% - var(--circle-size));
            transform-origin: calc(50% - 800px) calc(50% + 200px);
            animation: moveInCircle 20s ease infinite;
            opacity: 1;
        }

        .gradient-bg .interactive {
            position: absolute;
            background: radial-gradient(circle at center, rgba(var(--color-interactive)) 0, rgba(var(--color-interactive)) 50%) no-repeat;
            mix-blend-mode: var(--blending);
            width: 100%;
            height: 100%;
            top: -50%;
            left: -50%;
            opacity: 0.7;
        }
    </style>
    <div class="text-container">
        Bubbles
    </div>
    <div class="gradient-bg">
        <svg xmlns="http://www.w3.org/2000/svg">
            <defs>
                <filter id="goo">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -8"
                        result="goo" />
                    <feBlend in="SourceGraphic" in2="goo" />
                </filter>
            </defs>
        </svg>
        <div class="gradients-container">
            <div class="g1"></div>
            <div class="g2"></div>
            <div class="g3"></div>
            <div class="g4"></div>
            <div class="g5"></div>
            <div class="interactive"></div>
        </div>
    </div>
</body>

</html>
