@props([
    'href' => null,
    'type' => 'button',
    'variant' => 'primary',
])

@php
    $variants = [
        'primary' => 'bg-primary text-white hover:opacity-90',
        'secondary' => 'bg-secondary text-white hover:opacity-90',
        'danger' => 'bg-red-600 text-white hover:bg-red-700',
    ];

    $classes = 'inline-flex items-center justify-center rounded-lg px-4 py-2 text-sm font-semibold transition ' .
        ($variants[$variant] ?? $variants['primary']);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif