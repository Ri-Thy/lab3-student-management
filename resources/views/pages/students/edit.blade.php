@extends('layouts.app')

@section('title', 'Edit Student')

@section('parent', 'Students Directory')

@section('page', 'Edit Student')

@section('content')

<div class="space-y-6">

    <div>
        <h1 class="text-2xl font-bold text-primary">
            Edit Student
        </h1>

        <p class="mt-1 text-slate-600">
            Update the student's information.
        </p>
    </div>

    <div class="rounded-xl bg-white p-6 shadow-sm">

        <form
            method="POST"
            action="{{ route('students.update', $student) }}"
            class="space-y-6"
        >

            @csrf
            @method('PUT')

            @include('partials.form', [
                'genders' => $genders,
                'student' => $student
            ])

            <div class="flex gap-3">

                <x-button
                    href="{{ route('students.index') }}"
                    variant="secondary"
                >
                    Cancel
                </x-button>

                <x-button type="submit">
                    Update Student
                </x-button>

            </div>

        </form>

    </div>

</div>

@endsection