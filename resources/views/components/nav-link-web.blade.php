@props(['active'])

@php
$classes = ($active ?? false)
            ? 'link-navbar active'
            : 'link-navbar';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
