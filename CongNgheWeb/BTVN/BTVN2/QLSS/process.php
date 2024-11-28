<?php
require_once './dbconnection.php';
$dbconnection = new dbconnection();
$conn = $dbconnection->getConn();

if ($_POST['action'] === 'add') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $evaluate = $_POST['evaluate'];
    $nationality = $_POST['nationality'];

    // Xử lý upload ảnh
    $imagePath = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "uploads/";
        $imagePath = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
    }

    $stmt = $conn->prepare("INSERT INTO player (Name, Age, Evaluate, Nationality, ImagePath) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $age, $evaluate, $nationality, $imagePath]);
    header("Location: index.php");
}

// Sửa thông tin
if ($_POST['action'] === 'update') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $evaluate = $_POST['evaluate'];
    $nationality = $_POST['nationality'];

    $imagePath = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "uploads/";
        $imagePath = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);

        $stmt = $conn->prepare("UPDATE player SET Name = ?, Age = ?, Evaluate = ?, Nationality = ?, ImagePath = ? WHERE ID = ?");
        $stmt->execute([$name, $age, $evaluate, $nationality, $imagePath, $id]);
    } else {
        $stmt = $conn->prepare("UPDATE player SET Name = ?, Age = ?, Evaluate = ?, Nationality = ? WHERE ID = ?");
        $stmt->execute([$name, $age, $evaluate, $nationality, $id]);
    }
    header("Location: index.php");
}

// Xóa
if ($_POST['action'] === 'delete') {
    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM player WHERE ID = ?");
    $stmt->execute([$id]);
    header("Location: index.php");
}
//


?>
