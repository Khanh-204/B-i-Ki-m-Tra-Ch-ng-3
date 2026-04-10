<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // Đảm bảo đã có $fillable để chống Mass Assignment
    protected $fillable = ['name', 'email'];

    // Thêm hàm này để khai báo quan hệ Nhiều-Nhiều với bảng Course
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments');
    }
}
