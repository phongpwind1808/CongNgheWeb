<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Player</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>

<body>
    <h1>Thêm hoa mới</h1>
    <form action="index.php?controller=Admin&action=AddFlower" method="post" enctype="multipart/form-data">
    <div class='mb-3'>
        <label class="form-label">Tên loài hoa:</label>
        <input class="form-control" type="text" name="name" required>
        <label class="form-label">Mô tả:</label>
        <input class="form-control" type="text" name="descrip" required>
        <label class="form-label">Hình ảnh:</label>
        <input class="form-control" type="file" name="image" accept="image/*" required>
        <button class="btn btn-secondary" type="submit" name="actionAdd" value="add">Thêm</button>
        <button class="btn btn-secondary">
            <a href="admin.php" style="text-decoration: none; color:white">Quay lại</a>
        </button>
    </div>
</form>
</body>

</html>