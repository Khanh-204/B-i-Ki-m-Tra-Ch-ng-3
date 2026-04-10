@extends('layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Danh sách khóa học</h3>
    <a href="{{ route('courses.create') }}" class="btn btn-primary">Thêm khóa học mới</a>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Ảnh</th>
            <th>Tên khóa học</th>
            <th>Giá</th>
            <th>Trạng thái</th>
            <th>Số bài học</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
        <tr>
            <td>
                @if($course->image)
                    <img src="{{ asset('storage/' . $course->image) }}" width="80">
                @else
                    <span>No Image</span>
                @endif
            </td>
            <td>{{ $course->name }}</td>
            <td>{{ number_format($course->price) }} VNĐ</td>
            <td>
                @if($course->status == 'published')
                    <span class="badge bg-success">Published</span>
                @else
                    <span class="badge bg-secondary">Draft</span>
                @endif
            </td>
            <td>{{ $course->lessons_count }}</td> <td>
                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Xóa khóa học này?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-3">
    {{ $courses->links() }}
</div>
@endsection