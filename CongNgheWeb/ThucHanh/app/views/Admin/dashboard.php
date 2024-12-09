<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Liên kết đến Bootstrap CSS -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tùy chỉnh giao diện -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
        }
        .sidebar a:hover {
            background-color: #575d63;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .header {
            background-color: #f8f9fa;
            padding: 10px 15px;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center text-white">Admin Dashboard</h4>
        <a href="#">Trang chủ</a>
        <a href="#">Quản lý bài viết</a>
        <a href="#">Quản lý người dùng</a>
        <a href="#">Cài đặt</a>
        <a href="#">Đăng xuất</a>
    </div>

    <!-- Content -->
    <div class="content">
        <!-- Header -->
        <div class="header d-flex justify-content-between align-items-center">
            <h3>Chào mừng bạn đến với Dashboard</h3>
            <div>
                <span>Admin</span> | <a  style="text-decoration:none; color:cadetblue;" href="../Home/home.php">Thoát</a>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="row mt-4">
            <!-- Card 1 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tổng số bài viết</h5>
                        <p class="card-text">350</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tổng số người dùng</h5>
                        <p class="card-text">1,500</p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Đang chờ duyệt</h5>
                        <p class="card-text">12</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table for Posts -->
        <div class="mt-4">
            <h4>Danh sách bài viết</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tiêu đề</th>
                        <th>Ngày tạo</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Giới thiệu về công nghệ AI</td>
                        <td>01/12/2024</td>
                        <td><span class="badge bg-success">Đã duyệt</span></td>
                        <td><button class="btn btn-info btn-sm">Xem</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Xu hướng phát triển của Big Data</td>
                        <td>30/11/2024</td>
                        <td><span class="badge bg-warning">Chờ duyệt</span></td>
                        <td><button class="btn btn-info btn-sm">Xem</button></td>
                    </tr>
                    <!-- Các bài viết khác -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Liên kết đến Bootstrap JS và Popper.js -->
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
