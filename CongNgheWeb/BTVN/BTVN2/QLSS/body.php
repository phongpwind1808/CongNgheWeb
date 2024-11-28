<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Evaluate</th>
                    <th>Nationality</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once './dbconnection.php';
                $dbconnection = new dbconnection();
                $conn = $dbconnection->getConn();

                $stmt = $conn->query("SELECT * FROM player");
                $players = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($players as $player) {
                    echo "<tr>
                            <td>{$player['ID']}</td>
                            <td>{$player['Name']}</td>
                            <td>{$player['Age']}</td>
                            <td>{$player['Evaluate']}</td>
                            <td>{$player['Nationality']}</td>
                            <td><img src='{$player['ImagePath']}' alt='Player Image' style='width: 100px; height: auto;'></td>
                            <td>
                                <a href='edit.php?id={$player['ID']}' style='text-decoration:none;'>
                                <button class='btn' style='background-color:  #CFE1B9; color: white;'>Edit</button>
                                </a>
                            <form action='process.php' method='post' style='display:inline-block;'>
                                <input type='hidden' name='id' value='{$player['ID']}'>
                                <button class='btn' type='submit' name='action' value='delete' style='background-color:  #CFE1B9; color: white;'>Delete</button>
                            </form>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>