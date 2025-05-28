<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'title' => 'Fullstack Web Development',
                'description' => 'Learn to build web apps with HTML, CSS, JavaScript, and Laravel.',
                'price' => 300000,
                'thumbnail' => 'thumbnails/web-dev.jpg',
            ],
            [
                'title' => 'Mobile App Development with Flutter',
                'description' => 'Create beautiful native apps with Flutter and Dart.',
                'price' => 150000,
                'thumbnail' => 'flutter.jpg',
            ],
            [
                'title' => 'Data Science Bootcamp',
                'description' => 'Master data analysis, visualization, and machine learning.',
                'price' => 100000,
                'thumbnail' => 'data-science.jpg',
            ],
            [
                'title' => 'UI/UX Design Fundamentals',
                'description' => 'Learn user-centered design, wireframing, and prototyping.',
                'price' => 149000,
                'thumbnail' => 'ui-ux.jpg',
            ],
            [
                'title' => 'Cybersecurity Essentials',
                'description' => 'Understand network security, encryption, and ethical hacking.',
                'price' => 50000,
                'thumbnail' => 'cybersecurity.jpg',
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
