
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// Kết nối cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $file = $_FILES["file"]["tmp_name"];

    if (is_uploaded_file($file)) {

        $handle = fopen($file, "r");

        // Bỏ qua dòng tiêu đề
        fgetcsv($handle);

        // Đọc từng dòng và chèn vào CSDL
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $stmt = $conn->prepare("INSERT INTO tbusers (username, password, lastname, firstname, city, email, course1) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);
            $stmt->execute();
        }

        fclose($handle);

        echo '<div class="container mt-5">
                <div class="alert alert-success text-center">
                    Dữ liệu đã lưu vào CSDL thành công!
                </div>
              </div>';
    } else {
        echo '<div class="container mt-5">
                <div class="alert alert-danger text-center">
                    Không thể upload file. Vui lòng thử lại.
                </div>
              </div>';
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tải lên file Danh sách tài khoản</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
    <script src="./bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tải lên file Danh sách tài khoản</h1>

        <form action="./index.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="file" class="form-label">Chọn file CSV:</label>
                <input type="file" class="form-control" id="file" name="file" accept=".csv" required>
            </div>
            <button type="submit" class="btn btn-primary">Lưu vào CSDL</button>
        </form>
    </div>
</body>
</html>
