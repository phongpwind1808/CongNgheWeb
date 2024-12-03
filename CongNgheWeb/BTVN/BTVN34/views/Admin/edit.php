
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hoa</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>

<body>
    <h1>Sửa thông tin Hoa</h1>
    <form action="index.php?controller=Admin&action=EditFlower" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <!-- Hidden field for ID -->
        <input class="form-control" type="hidden" name="id" value="<?=  htmlspecialchars($flowers['id']); ?>">

        <!-- Name Field -->
        <label class="form-label">Tên hoa:</label>
        <input class="form-control" type="text" name="name" value="<?=  htmlspecialchars($flowers['name']); ?>" required>

        <!-- Description Field -->
        <label class="form-label">Mô tả:</label>
        <input class="form-control" type="text" name="descrip" value="<?= htmlspecialchars($flowers['description']); ?>" required>

        <!-- Current Image -->
        <label class="form-label">Ảnh hiện tại:</label>
        <div>
            <img src="<?= htmlspecialchars($flowers['image']); ?>" alt="ảnh hoa" style="width: 150px; height: auto;">
        </div>

        <!-- Upload New Image -->
        <label class="form-label">Ảnh thay thế:</label>
        <input class="form-control" type="file" name="image" accept="image/*">

        <!-- Submit Button -->
        <button class="btn btn-secondary" type="submit" name="actionEdit" value="Edit">Cập nhật</button>
        <button class="btn btn-secondary">
            <a href="admin.php" style="text-decoration: none; color:white">Quay lại</a>
        </button>
    </div>
</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
