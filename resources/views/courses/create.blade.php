@extends('layouts.master')

@section('content')
<h3>Thêm khóa học mới</h3>
<form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Tên khóa học</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        
        @error('name')
            <div class="text-danger mt-1"><small>{{ $message }}</small></div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Giá</label>
        <input type="number" name="price" class="form-control" value="{{ old('price') }}">
        
        @error('price')
            <div class="text-danger mt-1"><small>{{ $message }}</small></div>
        @enderror
    </div>
    <div class="mb-3">
        <label>Ảnh khóa học</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="mb-3">
        <label>Trạng thái</label>
        <select name="status" class="form-control">
            <option value="draft">Draft</option>
            <option value="published">Published</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Lưu lại</button>
</form>
@endsection