@extends('layouts.master')

@section('content')
<div class="card shadow-sm mt-4">
    <div class="card-header bg-warning text-dark">
        <h5 class="mb-0"><i class="fa-solid fa-pen-to-square"></i> Cập nhật khóa học</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <div class="mb-3">
                <label class="form-label fw-bold">Tên khóa học</label>
                <input type="text" name="name" class="form-control" value="{{ $course->name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Giá</label>
                <input type="number" name="price" class="form-control" value="{{ $course->price }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Ảnh khóa học</label>
                <input type="file" name="image" class="form-control">
                @if($course->image)
                    <p class="mt-2 text-muted">Ảnh hiện tại: <img src="{{ asset('storage/' . $course->image) }}" width="50"></p>
                @endif
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Trạng thái</label>
                <select name="status" class="form-control">
                    <option value="draft" {{ $course->status == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ $course->status == 'published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Lưu thay đổi</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>
@endsection