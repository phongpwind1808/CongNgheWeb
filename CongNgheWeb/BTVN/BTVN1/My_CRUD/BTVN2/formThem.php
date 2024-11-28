<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap.min.css">
    <title>Thêm Hình Ảnh</title>
</head>
<body>
<div class="container">
    <h1>Thêm Hình Ảnh</h1>
    <form action="./upload_image.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id']) ?>">
        <div class="form-group">
            <label for="image">Chọn hình ảnh:</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Tải lên</button>
    </form>
</div>
</body>
</html>