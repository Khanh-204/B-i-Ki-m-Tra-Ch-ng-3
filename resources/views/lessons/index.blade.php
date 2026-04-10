@extends('layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3><i class="fa-solid fa-list-ul"></i> Danh sách bài học</h3>
    <a href="{{ route('lessons.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus"></i> Thêm bài học mới
    </a>
</div>

<table class="table table-hover border">
    <thead class="table-dark">
        <tr>
            <th>Thứ tự</th>
            <th>Tiêu đề bài học</th>
            <th>Thuộc khóa học</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lessons as $lesson)
        <tr>
            <td><span class="badge bg-info text-dark">{{ $lesson->order }}</span></td>
            <td>{{ $lesson->title }}</td>
            <td><strong>{{ $lesson->course->name }}</strong></td> 
            <td>
                <a href="#" class="btn btn-sm btn-outline-warning">Sửa</a>
                <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $lessons->links() }} {{-- Phân trang --}}
@endsection