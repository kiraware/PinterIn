<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CourseController extends Controller
{
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
