<?php

namespace App\Http\Controllers;

use App\Enums\LessonDifficulty;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LessonController extends Controller
{
    public function show(Course $course, Lesson $lesson)
    {
        $user = auth()->user();

        if (! $user->is_admin && ! $user->purchasedCourses->contains($course)) {
            abort(403, 'Unauthorized');
        }

        return view('lessons.show', compact('course', 'lesson'));
    }

    public function create(Course $course)
    {
        return view('lessons.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'difficulty' => [Rule::enum(LessonDifficulty::class)],
            'duration' => 'required|integer|min:1',
        ]);

        $course->lessons()->create($validated);

        return redirect()->route('courses.show', $course);
    }

    public function edit(Course $course, Lesson $lesson)
    {
        return view('lessons.edit', compact('course', 'lesson'));
    }

    public function update(Request $request, Course $course, Lesson $lesson)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'difficulty' => [Rule::enum(LessonDifficulty::class)],
            'duration' => 'required|integer|min:1',
        ]);

        $lesson->update($validated);

        return redirect()->route('courses.lessons.show', [$course, $lesson]);
    }
}
