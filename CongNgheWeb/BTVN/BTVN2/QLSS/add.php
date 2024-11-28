<?php
require_once './dbconnection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Player</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Add New Player</h1>
    <form action="process.php" method="post" enctype="multipart/form-data">
    <div class='mb-3'>
        <label class="form-label">Name:</label>
        <input class="form-control" type="text" name="name" required>
        <label class="form-label">Age:</label>
        <input class="form-control" type="number" name="age" required>
        <label class="form-label">Evaluate:</label>
        <input class="form-control" type="text" name="evaluate" required>
        <label class="form-label">Nationality:</label>
        <input class="form-control" type="text" name="nationality" required>
        <label class="form-label">Image:</label>
        <input class="form-control" type="file" name="image" accept="image/*" required>
        <button class="btn btn-secondary" type="submit" name="action" value="add">Add</button>
        <button class="btn btn-secondary">
            <a href="index.php" style="text-decoration: none; color:white">Back</a>
        </button>
    </div>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>