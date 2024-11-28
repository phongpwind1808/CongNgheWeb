<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir = "./img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;

    // Kiểm tra file có phải ảnh không
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File không phải là ảnh.";
        $uploadOk = 0;
    }

    // Di chuyển file vào thư mục img
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "File đã được tải lên.";
            
            // Cập nhật dữ liệu sản phẩm
            $product_id = $_POST['id'];

            // Bao gồm file products.php
            include './products.php';

            // Gắn đường dẫn ảnh vào sản phẩm tương ứng
            $products[$product_id - 1]['image'] = $target_file;

            // Ghi lại mảng $products vào file products.php
            file_put_contents('./products.php', '<?php $products = ' . var_export($products, true) . ';');

            // Quay lại trang danh sách
            header("Location: index.php");
        } else {
            echo "Có lỗi xảy ra khi tải file.";
        }
    }
}
?>
