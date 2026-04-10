<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        // Lấy danh sách bài học kèm thông tin khóa học để hiển thị [cite: 78, 129]
        $lessons = Lesson::with('course')->orderBy('course_id')->orderBy('order')->paginate(10);
        return view('lessons.index', compact('lessons'));
    }

    public function create()
    {
        $courses = Course::all(); // Để chọn khóa học khi thêm bài học [cite: 72]
        return view('lessons.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|max:255',
            'content' => 'required',
            'video_url' => 'nullable|url',
            'order' => 'required|integer'
        ]);

        Lesson::create($data);
        return redirect()->route('lessons.index')->with('success', 'Thêm bài học thành công!');
    }
}