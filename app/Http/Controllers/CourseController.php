<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // withCount để lấy số lượng bài học (Lesson) [cite: 57]
        // with để eager load quan hệ, tránh lỗi N+1 [cite: 129]
        $query = Course::with(['lessons', 'students'])->withCount('lessons');

        // Chức năng tìm kiếm theo tên khóa học [cite: 116]
        if($request->has('name')){
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        $courses = $query->paginate(10); // Phân trang 10 mục [cite: 56]

        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Trả về file giao diện create.blade.php nằm trong thư mục resources/views/courses/
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request) 
    {
        // Lấy dữ liệu đã qua kiểm tra (Validation) [cite: 44, 133]
        $data = $request->validated(); 

        // Tự sinh Slug từ tên khóa học để làm URL đẹp [cite: 38]
        $data['slug'] = Str::slug($request->name); 

        // Xử lý upload ảnh vào thư mục storage [cite: 41, 47]
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('courses', 'public');
        }

        // Lưu dữ liệu thật vào Database qua Eloquent [cite: 158]
        Course::create($data); 

        return redirect()->route('courses.index')->with('success', 'Thêm khóa học thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::findOrFail($id); // Tìm khóa học theo ID, nếu không thấy sẽ báo lỗi 404
        return view('courses.edit', compact('course')); // Truyền dữ liệu sang giao diện
    }

    /**
     * Update the specified resource in storage.
     */
    // Hàm xử lý khi bấm nút "Lưu thay đổi"
    public function update(CourseRequest $request, string $id)
    {
        $course = Course::findOrFail($id);
        $data = $request->validated();
        $data['slug'] = \Illuminate\Support\Str::slug($request->name);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('courses', 'public');
        }

        $course->update($data); // Lệnh cập nhật
        return redirect()->route('courses.index')->with('success', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Hàm xử lý khi bấm nút "Xóa"
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        $course->delete(); // Lệnh xóa mềm (Soft Delete)
        return redirect()->route('courses.index')->with('success', 'Đã xóa khóa học!');
    }
}
