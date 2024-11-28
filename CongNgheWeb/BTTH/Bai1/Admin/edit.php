<?php
require_once './dbconnection.php';

// Lấy `id` từ URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Error: ID not provided.");
}

$id = $_GET['id'];

// Kết nối cơ sở dữ liệu
$dbconnection = new dbconnection();
$conn = $dbconnection->getConn();

// Truy vấn thông tin bản ghi
$stmt = $conn->prepare("SELECT * FROM dshoa WHERE id = ?");
$stmt->execute([$id]);
$hoa = $stmt->fetch(PDO::FETCH_ASSOC);

// Kiểm tra bản ghi có tồn tại không
if (!$hoa) {
    die("Error: Hoa not found.");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hoa</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <h1>Sửa thông tin Hoa</h1>
    <form action="process.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <!-- Hidden field for ID -->
        <input class="form-control" type="hidden" name="id" value="<?php echo htmlspecialchars($hoa['id']); ?>">

        <!-- Name Field -->
        <label class="form-label">Tên hoa:</label>
        <input class="form-control" type="text" name="name" value="<?php echo htmlspecialchars($hoa['name']); ?>" required>

        <!-- Description Field -->
        <label class="form-label">Mô tả:</label>
        <input class="form-control" type="text" name="descrip" value="<?php echo htmlspecialchars($hoa['description']); ?>" required>

        <!-- Current Image -->
        <label class="form-label">Ảnh hiện tại:</label>
        <div>
            <img src="<?php echo htmlspecialchars($hoa['image']); ?>" alt="ảnh hoa" style="width: 150px; height: auto;">
        </div>

        <!-- Upload New Image -->
        <label class="form-label">Ảnh thay thế:</label>
        <input class="form-control" type="file" name="image" accept="image/*">

        <!-- Submit Button -->
        <button class="btn btn-secondary" type="submit" name="action" value="update">Cập nhật</button>
        <button class="btn btn-secondary">
            <a href="admin.php" style="text-decoration: none; color:white">Quay lại</a>
        </button>
    </div>
</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
