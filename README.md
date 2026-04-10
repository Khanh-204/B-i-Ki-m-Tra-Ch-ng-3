# Course Management System (Hệ thống Quản lý Khóa học)

Đây là dự án Mini Project ứng dụng web quản lý khóa học được xây dựng bằng Laravel, bao gồm các tính năng quản lý khóa học, bài học và học viên đăng ký.

## 🚀 Các chức năng chính
- **Khóa học (Courses):** Thêm, sửa, xóa (Soft Delete), xem danh sách.
- **Bài học (Lessons):** Thêm bài học thuộc về khóa học (Relationship 1-N).
- **Đăng ký (Enrollments):** Quản lý học viên đăng ký khóa học (Relationship N-N).
- **Dashboard:** Thống kê tổng quan số lượng khóa học, học viên và tổng doanh thu.
- **Bảo mật & Tối ưu:** Áp dụng Form Request Validation và tối ưu N+1 Query bằng Eager Loading.

## 🛠️ Yêu cầu hệ thống
- PHP >= 8.1
- Composer
- MySQL (XAMPP/Laragon)

## ⚙️ Hướng dẫn cài đặt và chạy dự án

**Bước 1: Clone dự án về máy**
`git clone https://github.com/Khanh-204/B-i-Ki-m-Tra-Ch-ng-3.git`

**Bước 2: Cài đặt thư viện**
`composer install`

**Bước 3: Thiết lập môi trường**
Copy file cấu hình môi trường:
`cp .env.example .env`
Mở file `.env` và cấu hình kết nối Database của bạn (sửa `DB_DATABASE=course_management_db`).

**Bước 4: Tạo App Key**
`php artisan key:generate`

**Bước 5: Chạy Migration để tạo các bảng trong Database**
`php artisan migrate`

**Bước 6: Tạo link liên kết thư mục ảnh**
`php artisan storage:link`

**Bước 7: Chạy Server ảo**
`php artisan serve`
Mở trình duyệt và truy cập: `http://127.0.0.1:8000`