@php
    $classes = match ($status) {
        'Active' => 'bg-green-100 text-green-700',
        'Pending' => 'bg-amber-100 text-amber-700',
        'Inactive' => 'bg-red-100 text-red-700',
        default => 'bg-slate-100 text-slate-700',
    };
@endphp

<span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $classes }}">
    {{ $status }}
</span>