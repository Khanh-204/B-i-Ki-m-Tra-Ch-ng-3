<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo 1 khóa học mẫu
        $course = \App\Models\Course::create([
            'name' => 'Laravel Pro 2026',
            'slug' => 'laravel-pro-2026',
            'price' => 500000,
            'status' => 'published'
        ]);

        // Tạo 1 học viên mẫu
        $student = \App\Models\Student::create([
            'name' => 'Nguyễn Văn A',
            'email' => 'a@gmail.com'
        ]);

        // Cho học viên đăng ký khóa học
        $course->students()->attach($student->id);
    }
}
