<?php
session_start();

$score = isset($_SESSION['score']) ? $_SESSION['score'] : 0;
$total = isset($_SESSION['total']) ? $_SESSION['total'] : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Quả</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Kết Quả Làm Bài</h1>
        <div class="alert alert-success text-center">
            Bạn trả lời đúng <strong><?php echo $score; ?></strong> / <?php echo $total; ?> câu.
        </div>
        <a href="index.php" class="btn btn-primary">Làm lại</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
