<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách Hoa</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>

<body>
    <div style="padding: 30px 10px 10px; " >
    <h1 style="color: #374256 ">Top những loài hoa đẹp nhất</h1>
    </div>

    <div class="flower-list">
    <?php
       
       foreach ($flowers as $flower): ?>
           <div class="flower-item">
               <h3><?php echo $flower['name']; ?></h3>
               <img src="<?php echo $flower['image']; ?>" alt="<?php echo $flower['name']; ?>" style="width: 100px; height: auto;">
               <p><?php echo $flower['description']; ?></p>
           </div>
       <?php endforeach; ?>
    </div>
</body>

</html>