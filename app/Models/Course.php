<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes; // Kích hoạt xóa mềm [cite: 62]

    protected $fillable = ['name', 'slug', 'price', 'description', 'image', 'status'];

    public function lessons() {
        return $this->hasMany(Lesson::class); // 1 khóa có nhiều bài học [cite: 66, 160]
    }

    public function students() {
        return $this->belongsToMany(Student::class, 'enrollments'); // Nhiều học viên [cite: 70, 162]
    }

    // Thêm hàm này vào trong class Course
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}