@extends('layouts.app')

@section('title', 'Dashboard')

@section('parent', 'Student Management System')

@section('page', 'Dashboard')

@section('content')

<div class="space-y-6">

    <!-- Welcome -->
    <div>
        <h1 class="text-2xl font-bold text-primary">
            Dashboard
        </h1>

        <p class="mt-1 text-slate-600">
            Overview of the student registry.
        </p>
    </div>

    <!-- Statistics -->
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">

        <div class="rounded-xl bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">
                Total Students
            </p>

            <p class="mt-2 text-3xl font-bold text-primary">
                {{ $totalStudents }}
            </p>
        </div>

        <div class="rounded-xl bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">
                Male Students
            </p>

            <p class="mt-2 text-3xl font-bold text-primary">
                {{ $maleStudents }}
            </p>
        </div>

        <div class="rounded-xl bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">
                Female Students
            </p>

            <p class="mt-2 text-3xl font-bold text-primary">
                {{ $femaleStudents }}
            </p>
        </div>

        <div class="rounded-xl bg-white p-6 shadow-sm">
            <p class="text-sm text-slate-500">
                Total Genders
            </p>

            <p class="mt-2 text-3xl font-bold text-primary">
                {{ $totalGenders }}
            </p>
        </div>

    </div>

    <!-- Recent Students -->
    <div class="rounded-xl bg-white shadow-sm">

        <div class="border-b px-6 py-4">
            <h2 class="font-semibold text-primary">
                Recent Students
            </h2>
        </div>

        <div class="divide-y">

            @forelse ($recentStudents as $student)

                <div class="flex items-center justify-between px-6 py-4">

                    <div>
                        <p class="font-medium">
                            {{ $student->name }}
                        </p>

                        <p class="text-sm text-slate-500">
                            {{ $student->email }}
                        </p>
                    </div>

                    <a
                        href="{{ route('students.show', $student) }}"
                        class="text-sm font-semibold text-secondary hover:underline"
                    >
                        Details
                    </a>

                </div>

            @empty

                <div class="px-6 py-8 text-center text-slate-500">
                    No students found.
                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection