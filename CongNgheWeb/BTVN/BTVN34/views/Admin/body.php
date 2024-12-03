<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quan ly hoa</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>

<body>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên hoa</th>
                    <th>Mô tả</th>
                    <th>Hình ảnh</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($flowers as $flower) {
                    echo "<tr>
                            <td>{$flower['id']}</td>
                            <td>{$flower['name']}</td>
                            <td>{$flower['description']}</td>
                            <td><img src='{$flower['image']}' alt='hình ảnh hoa' style='width: 100px; height: auto;'></td>
                            <td>
                               
                                <form action='index.php?controller=Admin&action=displayedit&id={$flower['id']}' method='post' style='display:inline-block;'>
                                    <input type='hidden' name='id' value='{$flower['id']}'>

                                        <button class='btn' name='actionEdit' value='Edit' style='background-color:  #9CBBFC; color: white;'>Chỉnh sửa</button>
                                </form>
                                <form action='index.php?controller=Admin&action=DelFlower' method='post' style='display:inline-block;'>
                                    <input type='hidden' name='id' value='{$flower['id']}'>
                                    <button class='btn' type='submit' name='actionDel' value='delete' style='background-color:  #9CBBFC; color: white;'>Xóa</button>
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