<?php
require_once './dbconnection.php';
$dbconnection = new dbconnection();
$conn = $dbconnection->getConn();

// Thêm Hoa mới
if ($_POST['action'] === 'add') {
    $name = $_POST['name'];
    $description = $_POST['descrip'];

    // Xử lý upload ảnh
    $imagePath = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "../images/";  // Đường dẫn đến thư mục lưu trữ ảnh
        $imagePath = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);  // Di chuyển ảnh vào thư mục
    }

    // Chèn dữ liệu hoa vào cơ sở dữ liệu
    $stmt = $conn->prepare("INSERT INTO dshoa (name, description, image) VALUES (?, ?, ?)");
    $stmt->execute([$name, $description, $imagePath]);

    // Chuyển hướng về trang quản trị sau khi thêm thành công
    header("Location: admin.php");
    exit();
}

// Sửa thông tin
if ($_POST['action'] === 'update') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['descrip'];
    $imagePath = '';

    // Xử lý upload ảnh nếu có
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "../images/";
        $imagePath = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);

        // Cập nhật dữ liệu hoa
        $stmt = $conn->prepare("UPDATE dshoa SET name = ?, description = ?, image = ? WHERE id = ?");
        $stmt->execute([$name, $description, $imagePath, $id]);
    } else {
        // Cập nhật dữ liệu mà không thay đổi hình ảnh
        $stmt = $conn->prepare("UPDATE dshoa SET name = ?, description = ? WHERE id = ?");
        $stmt->execute([$name, $description, $id]);
    }

    // Chuyển hướng về trang quản trị
    header("Location: admin.php");
    exit();
}

// Xóa
if ($_POST['action'] === 'delete') {
    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM dshoa WHERE id = ?");
    $stmt->execute([$id]);

    // Chuyển hướng về trang quản trị
    header("Location: admin.php");
    exit();
}
?>
