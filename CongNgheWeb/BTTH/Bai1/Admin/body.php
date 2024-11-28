<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quan ly hoa</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên hoa</th>
                    <th>Mô tả</th>
                    <th>Hình ảnh</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once './dbconnection.php';
                $dbconnection = new dbconnection();
                $conn = $dbconnection->getConn();

                $stmt = $conn->query("SELECT * FROM dshoa");
                $dshoa = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($dshoa as $hoa) {
                    echo "<tr>
                            <td>{$hoa['id']}</td>
                            <td>{$hoa['name']}</td>
                            <td>{$hoa['description']}</td>
                            <td><img src='{$hoa['image']}' alt='hình ảnh hoa' style='width: 100px; height: auto;'></td>
                            <td>
                                <a href='edit.php?id={$hoa['id']}' style='text-decoration:none;'>
                                <button class='btn' style='background-color:  #9CBBFC; color: white;'>Chỉnh sửa</button>
                                </a>
                            <form action='process.php' method='post' style='display:inline-block;'>
                                <input type='hidden' name='id' value='{$hoa['id']}'>
                                <button class='btn' type='submit' name='action' value='delete' style='background-color:  #9CBBFC; color: white;'>Xóa</button>
                            </form>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>