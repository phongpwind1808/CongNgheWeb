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
$stmt = $conn->prepare("SELECT * FROM player WHERE ID = ?");
$stmt->execute([$id]);
$player = $stmt->fetch(PDO::FETCH_ASSOC);

// Kiểm tra bản ghi có tồn tại không
if (!$player) {
    die("Error: Player not found.");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Player</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Edit Player</h1>
    <form action="process.php" method="post" enctype="multipart/form-data">
    <!-- Input ẩn lưu ID -->
    <div class='mb-3'>
        <input class="form-control" type="hidden" name="id" value="<?php echo htmlspecialchars($player['ID']); ?>">

        <label class="form-label">Name:</label>
        <input class="form-control" type="text" name="name" value="<?php echo htmlspecialchars($player['Name']); ?>" required>

        <label class="form-label">Age:</label>
        <input class="form-control" type="number" name="age" value="<?php echo htmlspecialchars($player['Age']); ?>" required>

        <label class="form-label">Evaluate:</label>
        <input class="form-control" type="text" name="evaluate" value="<?php echo htmlspecialchars($player['Evaluate']); ?>" required>

        <label class="form-label">Nationality:</label>
        <input class="form-control" type="text" name="nationality" value="<?php echo htmlspecialchars($player['Nationality']); ?>" required>

        <label class="form-label">Current Image:</label>
        <div>
            <img src="<?php echo htmlspecialchars($player['ImagePath']); ?>" alt="Player Image" style="width: 150px; height: auto;">
        </div>

        <label class="form-label">Change Image:</label>
        <input class="form-control" type="file" name="image" accept="image/*">

        <button class="btn btn-secondary" type="submit" name="action" value="update">Update</button>
        <button class="btn btn-secondary">
            <a href="index.php" style="text-decoration: none; color:white">Back</a>
        </button>
    </div>
</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>