<?php
    require 'function.php';
    $user = query("SELECT * FROM artikel");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page comment</title>
</head>
<body>
    <h3>Page comment</h3>
    <form action="" method="POST">
        <table border = 1>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>User</th>
                    <th>Article</th>
                    <th>Comment</th>
                </tr>
            </thead>
            <?php foreach($user as $row) : ?>
            <tbody>
                <tr>
                    <td><?= $row["id_comment"]; ?></td>
                    <td><?= $row["id_user"]; ?></td>
                    <td><?= $row["id_artikel"]; ?></td>
                    <td><?= $row["comment"]; ?></td>
                </tr>
            </tbody>
            <?php endforeach; ?>
        </table>
    </form>
</body>
</html>