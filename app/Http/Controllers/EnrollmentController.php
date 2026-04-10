<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        // Hiển thị danh sách đăng ký, tối ưu truy vấn để tránh lỗi N+1
        $courses = Course::with('students')->has('students')->get();
        return view('enrollments.index', compact('courses'));
    }

    public function create()
    {
        $courses = Course::published()->get(); // Chỉ cho đăng ký khóa học đã xuất bản [cite: 132]
        return view('enrollments.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'name' => 'required|string',
            'email' => 'required|email'
        ]);

        // 1. Tìm hoặc tạo mới học viên dựa trên email [cite: 68]
        $student = Student::firstOrCreate(
            ['email' => $request->email],
            ['name' => $request->name]
        );

        // 2. Gắn học viên vào khóa học (Quan hệ Many-to-Many) [cite: 70, 162]
        // syncWithoutDetaching giúp tránh lỗi nếu học viên đăng ký lại cùng 1 khóa
        $student->courses()->syncWithoutDetaching([$request->course_id]);

        return redirect()->route('dashboard')->with('success', 'Đăng ký thành công! Doanh thu đã cập nhật.');
    }
}
