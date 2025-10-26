<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'id' => 1,
                'title' => 'Test Course Title 1',
                'level' => 1,
                'price' => 100,
                'description' => 'Test Course Description 1',
            ],
            [
                'id' => 2,
                'title' => 'Test Course Title 2',
                'level' => 2,
                'price' => 200,
                'description' => 'Test Course Description 2',
            ]
        ];
        Course::insert($courses);
    }
}
