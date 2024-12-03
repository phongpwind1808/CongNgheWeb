<?php
require __DIR__ . '/../models/AdminModel.php';
class AdminController
{
    public function index()
    {
        $flowers = AdminModel::getAllFlower();
        include __DIR__ . '/../views/Admin/header.php';
        include __DIR__ . '/../views/Admin/body.php';
    }
    public function displayAdd()
    {
        include __DIR__ . '/../views/Admin/add.php';
    }
    public function AddFlower()
    {
        // Thêm Hoa mới
        if ($_POST['actionAdd'] === 'add') {
            $name = $_POST['name'];
            $description = $_POST['descrip'];
            // Xử lý upload ảnh
            $imagePath = '';
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $targetDir = "./assets/images/";  // Đường dẫn đến thư mục lưu trữ ảnh
                $imagePath = $targetDir . basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);  // Di chuyển ảnh vào thư mục
            }
            $result = AdminModel::Add($name, $description, $imagePath);
            // Chuyển hướng về trang quản trị sau khi thêm thành công
            if ($result) header("Location: index.php?controller=Admin&action=index");
            exit();
        }
    }

    public function DelFlower()
    {
        if ($_POST['actionDel'] === 'delete') {
            $id = $_POST['id'];
            $result = AdminModel::Del($id);
            // Chuyển hướng về trang quản trị
            if ($result) header("Location: index.php?controller=Admin&action=index");
            exit();
        }
    }

    public function displayedit()
    {
        $id = $_GET['id']; // Lấy ID từ URL
        $flowers = AdminModel::getByID($id);
        include __DIR__ . '/../views/Admin/edit.php';
    }
    public function EditFlower()
    {

        if ($_POST['actionEdit'] === 'Edit') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['descrip'];
            $imagePath = '';

            // Xử lý upload ảnh nếu có
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $targetDir = "./assets/images/";
                $imagePath = $targetDir . basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);

                // Cập nhật dữ liệu hoa
                $result = AdminModel::Edit($name, $description, $imagePath, $id);
            } else {
                // Cập nhật dữ liệu mà không thay đổi hình ảnh
                $flowers = AdminModel::getByID($id);
                $imagePath = $flowers['image'];
                $result = AdminModel::Edit($name, $description, $imagePath, $id);
            }

            // Chuyển hướng về trang quản trị
            header("Location: index.php?controller=Admin&action=index");
            exit();
        }
    }
}
