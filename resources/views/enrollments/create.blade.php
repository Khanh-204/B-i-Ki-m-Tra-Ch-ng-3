@extends('layouts.master')

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fa-solid fa-user-plus"></i> Đăng ký khóa học mới</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('enrollments.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Chọn khóa học</label>
                        <select name="course_id" class="form-select" required>
                            <option value="">-- Vui lòng chọn khóa học --</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }} ({{ number_format($course->price) }} đ)</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Họ và tên học viên</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên học viên..." required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Email liên hệ</label>
                        <input type="email" name="email" class="form-control" placeholder="email@example.com" required>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Xác nhận đăng ký</button>
                    <a href="{{ route('enrollments.index') }}" class="btn btn-outline-secondary w-100 mt-2">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection