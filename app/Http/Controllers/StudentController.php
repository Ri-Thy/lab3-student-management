<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::with('gender');

        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        if ($request->filled('gender')) {
            $query->where('gender_id', $request->input('gender'));
        }

        $students = $query->latest()->get();
        $genders = Gender::orderBy('name')->get();

        return view('pages.students.index', [
            'students' => $students,
            'genders' => $genders,
            'search' => $request->input('search', ''),
            'selectedGender' => $request->input('gender', ''),
        ]);
    }

    public function create()
    {
        $genders = Gender::orderBy('name')->get();

        return view('pages.students.create', compact('genders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:students,email'],
            'phone' => ['nullable', 'string', 'max:50'],
            'gender_id' => ['required', 'exists:genders,id'],
        ]);

        Student::create($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    public function show(Student $student)
    {
        $student->load('gender');

        return view('pages.students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $genders = Gender::orderBy('name')->get();

        return view('pages.students.edit', compact('student', 'genders'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('students', 'email')->ignore($student->id),
            ],
            'phone' => ['nullable', 'string', 'max:50'],
            'gender_id' => ['required', 'exists:genders,id'],
        ]);

        $student->update($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}