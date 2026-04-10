<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Management System</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        .sidebar {
            background: #2c3e50;
            min-height: 100vh;
            color: white;
        }

        .sidebar .nav-link {
            color: #bdc3c7;
            transition: 0.3s;
        }

        .sidebar .nav-link:hover {
            color: white;
            background: #34495e;
            border-radius: 5px;
        }

        .sidebar .active {
            background: #3498db;
            color: white !important;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <nav class="col-md-2 d-none d-md-block sidebar p-3">

            <h4 class="text-center py-3 border-bottom">
                <i class="fa-solid fa-graduation-cap"></i> QUẢN LÝ
            </h4>

            <ul class="nav flex-column mt-3">
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
                        <i class="fa-solid fa-chart-line me-2"></i> Tổng quan
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->is('courses*') ? 'active' : '' }}" href="{{ route('courses.index') }}">
                        <i class="fa-solid fa-book me-2"></i> Khóa học
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->is('lessons*') ? 'active' : '' }}" href="{{ route('lessons.index') }}">
                        <i class="fa-solid fa-chalkboard-user me-2"></i> Bài học
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link {{ request()->is('enrollments*') ? 'active' : '' }}" href="{{ route('enrollments.index') }}">
                        <i class="fa-solid fa-user-plus me-2"></i> Đăng ký học
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Main content -->
        <main class="col-md-10 ms-sm-auto px-md-4 py-4">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')

        </main>

    </div>
</div>

</body>
</html>
