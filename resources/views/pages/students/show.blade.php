@extends('layouts.app')

@section('title', 'Student Details')

@section('parent', 'Students Directory')

@section('page', 'Student Details')

@section('content')

<div class="space-y-6">

    <div class="flex items-center justify-between">

        <div>
            <h1 class="text-2xl font-bold text-primary">
                Student Details
            </h1>

            <p class="mt-1 text-slate-600">
                View information about this student.
            </p>
        </div>

        <div class="flex gap-3">

            <x-button
                href="{{ route('students.index') }}"
                variant="secondary"
            >
                Back to Students
            </x-button>

            <x-button
                href="{{ route('students.edit', $student) }}"
            >
                Edit Student
            </x-button>

        </div>

    </div>

    <div class="rounded-xl bg-white p-6 shadow-sm">

        <div class="grid gap-6 md:grid-cols-2">

            <div>
                <p class="text-sm text-slate-500">Name</p>
                <p class="mt-1 text-lg font-semibold">
                    {{ $student->name }}
                </p>
            </div>

            <div>
                <p class="text-sm text-slate-500">Gender</p>
                <p class="mt-1 text-lg font-semibold">
                    {{ $student->gender->name ?? '—' }}
                </p>
            </div>

            <div>
                <p class="text-sm text-slate-500">Email</p>
                <p class="mt-1 text-lg font-semibold">
                    {{ $student->email }}
                </p>
            </div>

            <div>
                <p class="text-sm text-slate-500">Phone</p>
                <p class="mt-1 text-lg font-semibold">
                    {{ $student->phone ?? '—' }}
                </p>
            </div>

            <div>
                <p class="text-sm text-slate-500">Student ID</p>
                <p class="mt-1 text-lg font-semibold">
                    {{ $student->id }}
                </p>
            </div>

        </div>

    </div>

</div>

@endsection