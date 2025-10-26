<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = [
            [
                'id' => 1,
                'course_id' => 1,
                'module_id' => 1,
                'title' => 'Test Content Title 1',
                'description' => 'Test Content Description 1',
            ],
            [
                'id' => 2,
                'course_id' => 2,
                'module_id' => 2,
                'title' => 'Test Content Title 2',
                'description' => 'Test Content Description 2',
            ]
        ];
        Content::insert($contents);
    }
}
