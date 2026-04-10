@extends('layouts.master')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white"><h5>Thêm bài học mới</h5></div>
    <div class="card-body">
        <form action="{{ route('lessons.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Chọn khóa học</label>
                <select name="course_id" class="form-select" required>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col-md-9 mb-3">
                    <label class="form-label">Tiêu đề bài học</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Thứ tự hiển thị</label>
                    <input type="number" name="order" class="form-control" value="1">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Video URL (YouTube/Vimeo)</label>
                <input type="url" name="video_url" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Nội dung bài học</label>
                <textarea name="content" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-success px-4">Lưu bài học</button>
            <a href="{{ route('lessons.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>
@endsection