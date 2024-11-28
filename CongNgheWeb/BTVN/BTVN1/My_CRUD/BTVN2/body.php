<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap.min.css">
    <?php 
        include './products.php';
        static $dem = 0;
    ?>
    <title>Quản lý sản phẩm</title>
</head>
<body>
<div class="container" style="width: 80%; margin: 0 auto;">
    <h1>Quản Lý Sản Phẩm</h1>
    <table class="table mt-3">
        <thead>
            <tr style="border-top: solid 1px #000;">
                <th scope="col">ID</th>
                <th scope="col">Tên</th>
                <th scope="col">Giá</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <th scope="row"><?= htmlspecialchars(++$dem) ?></th>
                <td><?= htmlspecialchars($product['name']) ?></td>
                <td><?= htmlspecialchars($product['price']) ?></td>
                <td>
                  <?php if (!empty($product['image'])): ?>
                    <img src="<?= htmlspecialchars($product['image']) ?>" alt="Hình ảnh sản phẩm" style="width: 100px; height: auto;">
                  <?php else: ?>
                   <em>Chưa có hình ảnh</em>
                  <?php endif; ?>
                </td>

                <td>
                    <!-- Link thêm hình ảnh -->
                    <a href="./formThem.php?id=<?= $dem ?>" class="btn btn-primary btn-sm">Thêm hình ảnh</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
