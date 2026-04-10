<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    // Thêm dòng này để cho phép lưu dữ liệu vào các cột tương ứng
    protected $fillable = [
        'course_id', 
        'title', 
        'content', 
        'video_url', 
        'order'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
