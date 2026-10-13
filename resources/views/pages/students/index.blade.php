@extends('layouts.app')

@section('title', 'Students Directory')

@section('parent', 'Student Management System')

@section('page', 'Students Directory')

@section('content')

<div class="space-y-6">

    <div class="flex items-center justify-between">

        <div>
            <h1 class="text-2xl font-bold text-primary">
                Students Directory
            </h1>

            <p class="mt-1 text-slate-600">
                Browse and search registered students.
            </p>
        </div>

        <x-button href="{{ route('students.create') }}">
            Add Student
        </x-button>

    </div>

    @if (session('success'))
        <div class="rounded-lg bg-green-100 px-4 py-3 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <div class="rounded-xl bg-white p-6 shadow-sm">

        <form method="GET"
              action="{{ route('students.index') }}"
              class="grid gap-4 md:grid-cols-3">

            <div>
                <label class="mb-1 block text-sm font-medium">
                    Search
                </label>

                <input
                    type="text"
                    name="search"
                    value="{{ $search }}"
                    placeholder="Name, email, or phone"
                    class="w-full rounded-lg border border-slate-300 px-4 py-2"
                >
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium">
                    Gender
                </label>

                <select
                    name="gender"
                    class="w-full rounded-lg border border-slate-300 px-4 py-2"
                >
                    <option value="">All genders</option>

                    @foreach ($genders as $gender)
                        <option
                            value="{{ $gender->id }}"
                            @selected((string) $selectedGender === (string) $gender->id)
                        >
                            {{ $gender->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-end">
                <x-button type="submit">
                    Search
                </x-button>
            </div>

        </form>

    </div>

    <div class="overflow-hidden rounded-xl bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full text-left text-sm">

                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-4 font-semibold">Student</th>
                        <th class="px-6 py-4 font-semibold">Email</th>
                        <th class="px-6 py-4 font-semibold">Phone</th>
                        <th class="px-6 py-4 font-semibold">Gender</th>
                        <th class="px-6 py-4 text-right font-semibold">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($students as $student)

                        <tr class="border-t border-slate-100">

                            <td class="px-6 py-4 font-medium text-slate-900">
                                {{ $student->name }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $student->email }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $student->phone ?? '—' }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $student->gender->name ?? '—' }}
                            </td>

                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">

                                    <a
                                        href="{{ route('students.show', $student) }}"
                                        class="rounded-lg bg-slate-100 px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-200"
                                    >
                                        View
                                    </a>

                                    <a
                                        href="{{ route('students.edit', $student) }}"
                                        class="rounded-lg bg-blue-100 px-3 py-2 text-sm font-medium text-blue-700 hover:bg-blue-200"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        method="POST"
                                        action="{{ route('students.destroy', $student) }}"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            onclick="return confirm('Are you sure you want to delete this student?')"
                                            class="rounded-lg bg-red-100 px-3 py-2 text-sm font-medium text-red-700 hover:bg-red-200"
                                        >
                                            Delete
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-slate-500">
                                No students found.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection