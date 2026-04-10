<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique(); // Tên khóa học không dấu để làm URL [cite: 38]
            $table->decimal('price', 10, 2); // Giá khóa học [cite: 39]
            $table->text('description')->nullable(); // Mô tả [cite: 40]
            $table->string('image')->nullable(); // Đường dẫn ảnh [cite: 41]
            $table->enum('status', ['draft', 'published'])->default('draft'); // Trạng thái [cite: 42]
            $table->softDeletes(); // Chức năng xóa mềm theo yêu cầu [cite: 62]
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};