<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .content {
            max-width: 1200px; /* Giới hạn kích thước của trang */
            width: 100%;
            padding: 20px;
            box-sizing: border-box; /* Bao gồm padding vào kích thước tổng */
        }
    </style>
</head>

<body>
    <div class="content">
    <?php include './header.php'; ?>
    <?php include './body.php'; ?>
    <?php include './footer.php'; ?>
    </div>
</body>

</html>