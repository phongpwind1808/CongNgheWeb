<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách Hoa</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <?php
    include './header.php';
    ?>
    <div style="padding: 30px 10px 10px; " >
    <h1 style="color: #374256 ">Top những loài hoa đẹp nhất</h1>
    </div>

    <div class="flower-list">
        <?php
        // Kết nối đến cơ sở dữ liệu
        require_once '../Admin/dbconnection.php';
        $dbconnection = new dbconnection();
        $conn = $dbconnection->getConn();

        // Lấy dữ liệu hoa từ bảng dshoa
        $stmt = $conn->query("SELECT * FROM dshoa");
        $flowers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Hiển thị dữ liệu hoa
        foreach ($flowers as $flower): ?>
            <div class="flower-item">
                <h3><?php echo $flower['name']; ?></h3>
                <img src="<?php echo $flower['image']; ?>" alt="<?php echo $flower['name']; ?>" style="width: 100px; height: auto;">
                <p><?php echo $flower['description']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
    include '../Admin/footer.php';
    ?>
</body>

</html>