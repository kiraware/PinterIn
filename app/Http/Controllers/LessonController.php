<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function show(Course $course, Lesson $lesson)
    {
        if ($lesson->course_id !== $course->id) {
            abort(404);
        }

        $user = Auth::user();
        if (!$user->is_admin && !$user->purchasedCourses->contains($course->id)) {
            abort(403, 'You are not enrolled in this course.');
        }

        return view('lessons.show', compact('lesson', 'course'));
    }

    public function create(Course $course)
    {
        return view('lessons.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'nullable|string',
            'duration' => 'required|integer',
        ]);

        $course->lessons()->create($validated);
        return redirect()->route('courses.show', $course);
    }

    public function edit(Course $course, Lesson $lesson)
    {
        return view('lessons.edit', compact('lesson', 'course'));
    }

    public function update(Request $request, Course $course, Lesson $lesson)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'nullable|string',
            'duration' => 'required|integer',
        ]);

        $lesson->update($validated);
        return redirect()->route('courses.show', $course);
    }

    public function destroy(Course $course, Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('courses.show', $course);
    }
}
