<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Student;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();

        $maleStudents = Student::whereHas('gender', function ($query) {
            $query->where('name', 'Male');
        })->count();

        $femaleStudents = Student::whereHas('gender', function ($query) {
            $query->where('name', 'Female');
        })->count();

        $totalGenders = Gender::count();

        $recentStudents = Student::with('gender')
            ->latest()
            ->take(5)
            ->get();

        return view('pages.dashboard.index', compact(
            'totalStudents',
            'maleStudents',
            'femaleStudents',
            'totalGenders',
            'recentStudents'
        ));
    }
}