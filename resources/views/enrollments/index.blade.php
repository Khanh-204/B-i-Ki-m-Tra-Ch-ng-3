@extends('layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3><i class="fa-solid fa-users"></i> Danh sách học viên theo khóa học</h3>
    <a href="{{ route('enrollments.create') }}" class="btn btn-primary">Đăng ký mới</a>
</div>

@foreach($courses as $course)
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-dark text-white d-flex justify-content-between">
            <h5 class="mb-0">Khóa học: {{ $course->name }}</h5>
            <span>Tổng số: {{ $course->students->count() }} học viên</span> </div>
        <div class="card-body">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>Tên học viên</th>
                        <th>Email</th>
                        <th>Ngày đăng ký</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($course->students as $student)
                    <tr>
                        <td>{{ $student->name }}</td> <td>{{ $student->email }}</td> <td>{{ $student->pivot->created_at ?? 'N/A' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endforeach
@endsection