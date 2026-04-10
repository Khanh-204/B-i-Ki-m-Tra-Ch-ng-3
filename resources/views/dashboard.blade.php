@extends('layouts.master')

@section('content')
<h3 class="mb-4">Hệ thống quản lý - Dashboard</h3>

<div class="row">
    <div class="col-md-3">
        <div class="card bg-primary text-white p-3">
            <h5>Khóa học</h5>
            <h2>{{ $totalCourses }}</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white p-3">
            <h5>Học viên</h5>
            <h2>{{ $totalStudents }}</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-warning text-dark p-3">
            <h5>Doanh thu</h5>
            <h2>{{ number_format($revenue) }} đ</h2>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-info text-white p-3">
            <h5>Hot Course</h5>
            <p class="mb-0">{{ $topCourse->name ?? 'N/A' }}</p>
        </div>
    </div>
</div>

<h4 class="mt-5">5 Khóa học mới nhất</h4>
<table class="table table-sm mt-3">
    <thead>
        <tr>
            <th>Tên</th>
            <th>Ngày tạo</th>
            <th>Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        @foreach($latestCourses as $c)
        <tr>
            <td>{{ $c->name }}</td>
            <td>{{ $c->created_at->format('d/m/Y') }}</td>
            <td>{{ $c->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection