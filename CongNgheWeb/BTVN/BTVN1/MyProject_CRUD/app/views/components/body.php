<?php
require_once '../../models/playerModel.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <table class="table " style="width: 80%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Evaluate</th>
                <th scope="col">Nationality</th>
                <th scope="col">ActionRecord</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($players as $player) {
            ?>
                <tr>
                    <th scope="row"><?= $player->getId();?></th>
                    <td><?= $player->getName();?></td>
                    <td><?= $player->getAge();?></td>
                    <td><?= $player->getEvalua();?></td>
                    <td><?= $player->getNation();?></td>
                </tr>
            <?php
            }
            ?>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </tbody>
    </table>
</body>

</html>