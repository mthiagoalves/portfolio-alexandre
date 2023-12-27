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
    <link rel="stylesheet" href="/css/style.css">

</head>

<body>
    <style>
        html,
        body {
            font-family: 'Dongle', sans-serif;
            margin: 0;
            padding: 0;
        }


    </style>

<div id="canvasContainer" class="preloader">
    <div class="div-text-hello">
        <div class="row m-0 align-items-center">
            <div class="col-12 p-0 title-hello">
                <p class="">Hello</p>
            </div>
            <div class="col-9 p-0">
                <p class="text-hello">We're almost there</p>
            </div>
            <div class="col-12 p-0 mt-3">
                <p class="progress-text">0%</p>
            </div>
        </div>
    </div>
    <canvas
        class="custom-class1"
        data-gradient="wrapper"
        data-multx="1.27"
        data-multy="1.15"
        data-hue="0.201"
        data-brightness=".945"
        data-mouse="0.68"
        data-scale=".9"
        data-noise="1.64"
        data-time=".201"
        data-bw=".115"
        data-blue=".12"
        data-green="0"
        data-red="0.33"
        width="1325"
        height="627"
      ></canvas>
    {{-- @include('components.gradient-bg') --}}
</div>



<script src="/js/gradient.js"></script>
</body>

</html>
