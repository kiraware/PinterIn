<?php

namespace App\Http\Controllers;

use App\Models\Course;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::with(['lessons', 'users'])->latest()->get();

        return view('welcome', compact('courses'));
    }
}
