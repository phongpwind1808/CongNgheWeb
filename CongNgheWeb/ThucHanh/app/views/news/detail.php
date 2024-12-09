<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết bài viết</title>
    <!-- Liên kết đến Bootstrap CSS -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">TLUNews</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Admin/login.php">Đăng nhập</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <!-- Container bài viết chi tiết -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <!-- Tiêu đề bài viết -->
                    <h1 class="mb-4">Tiêu đề bài viết chi tiết</h1>

                    <!-- Ảnh bài viết -->
                    <img src="https://via.placeholder.com/800x400" class="img-fluid mb-4" alt="Bài viết chi tiết">

                    <!-- Nội dung bài viết -->
                    <p><strong>Tác giả:</strong> Nguyễn Trung Kiên</p>
                    <p><strong>Ngày đăng:</strong> 01/12/2024</p>
                    <p class="lead">Đây là phần nội dung bài viết chi tiết. Bạn có thể mô tả chi tiết hơn về chủ đề, sự kiện, hoặc câu chuyện mà bài viết muốn truyền tải. Các đoạn văn này có thể dài và phong phú với hình ảnh, video, hoặc các yếu tố khác hỗ trợ nội dung.</p>

                    <h4>Tiêu đề phụ 1</h4>
                    <p>Đoạn văn mô tả chi tiết phần 1 của bài viết.</p>                
                </div>
            </div>
        </div>
    </main>


    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>