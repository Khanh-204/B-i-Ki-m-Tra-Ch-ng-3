<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Enrollment;

class DashboardController extends Controller
{
    public function index()
    {
        // Đếm tổng số lượng
        $totalCourses = Course::count();
        $totalStudents = Student::count();

        // Tính doanh thu từ bảng enrollments
        $revenue = Course::join('enrollments', 'courses.id', '=', 'enrollments.course_id')
                         ->sum('courses.price');

        // Tìm khóa học có nhiều học viên nhất
        $topCourse = Course::withCount('students')
                           ->orderBy('students_count', 'desc')
                           ->first();

        // 5 khóa học mới nhất
        $latestCourses = Course::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalCourses',
            'totalStudents',
            'revenue',
            'topCourse',
            'latestCourses'
        ));
    }
}
