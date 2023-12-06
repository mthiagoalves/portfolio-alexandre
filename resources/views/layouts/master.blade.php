<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('meta')

    @include('includes.metas')

</head>

<body>
    @include('components.navbar')

    @include('components.banner-home')
    <main>
        {{ $content }}
    </main>
    <div class="interactive"></div>
    @include('scripts.footer-scripts')
</body>

</html>
