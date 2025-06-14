<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CourseController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->is_admin) {
            $courses = Course::all();
        } else {
            $courses = $user->purchasedCourses;
        }

        return view('courses.index', compact('courses'));
    }

    public function publicIndex()
    {
        $courses = Course::all();
        $user = Auth::user();

        $enrolledCourses = [];

        if ($user && ! $user->is_admin) {
            $enrolledCourses = $user->purchasedCourses->pluck('id')->toArray();
        }

        return view('courses.public', compact('courses', 'user', 'enrolledCourses'));
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $filename = time().'.'.$request->thumbnail->extension();
        $request->thumbnail->storeAs('thumbnails', $filename);
        $validated['thumbnail'] = $filename;

        Course::create($validated);

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($course->thumbnail && Storage::exists('thumbnails/'.$course->thumbnail)) {
                Storage::delete('thumbnails/'.$course->thumbnail);
            }

            $filename = time().'.'.$request->thumbnail->extension();
            $request->thumbnail->storeAs('thumbnails', $filename);
            $validated['thumbnail'] = $filename;
        }

        $course->update($validated);

        return redirect()->route('courses.show', $course)->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }

    /**
     * Show the course's thumbnail.
     */
    public function showThumbnail(Course $course): StreamedResponse
    {
        $path = 'thumbnails/'.$course->thumbnail;

        if (Storage::disk('local')->exists($path)) {
            $headers = [
                'Content-Type' => File::mimeType(Storage::disk('local')->path($path)),
            ];

            return Storage::download($path, $course->thumbnail, $headers);
        }

        abort(404);
    }
}
