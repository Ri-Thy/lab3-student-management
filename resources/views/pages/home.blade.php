@extends('layouts.guest')

@section('title', 'SMS Lab Portal')

@section('content')

<div class="rounded-2xl bg-white p-8 shadow-sm">

    <div class="max-w-2xl">

        <p class="text-sm font-semibold uppercase tracking-wide text-secondary">
            Laravel Lab 4
        </p>

        <h1 class="mt-3 text-4xl font-bold text-primary">
            Student Management System
        </h1>

        <p class="mt-4 text-lg text-slate-600">
            Welcome to the Student Management System laboratory project.
        </p>

        <div class="mt-6 flex gap-3">
            <x-button href="{{ route('dashboard') }}">
                Open Dashboard
            </x-button>

            <x-button
                href="{{ route('students.index') }}"
                variant="secondary"
            >
                Students Registry
            </x-button>
        </div>

    </div>

</div>

@endsection