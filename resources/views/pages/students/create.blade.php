@extends('layouts.app')

@section('title', 'Create Student')

@section('parent', 'Students Directory')

@section('page', 'Create Student')

@section('content')

<div class="space-y-6">

    <div>
        <h1 class="text-2xl font-bold text-primary">
            Create Student
        </h1>

        <p class="mt-1 text-slate-600">
            Add a new student to the registry.
        </p>
    </div>

    <div class="rounded-xl bg-white p-6 shadow-sm">

        <form
            method="POST"
            action="{{ route('students.store') }}"
            class="space-y-6"
        >

            @csrf

            @include('partials.form', [
                'genders' => $genders,
                'student' => null
            ])

            <div class="flex gap-3">

                <x-button
                    href="{{ route('students.index') }}"
                    variant="secondary"
                >
                    Cancel
                </x-button>

                <x-button type="submit">
                    Save Student
                </x-button>

            </div>

        </form>

    </div>

</div>

@endsection