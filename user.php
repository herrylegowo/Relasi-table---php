<?php
    require 'function.php';
    if(isset($_POST["submit"])){
        if(regist($_POST) > 0){
            echo "
                    <script>
                        alert ('User baru berhasil ditambahkan');
                    </script>
                 ";
        }else{
            echo mysqli_error($link);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman registrasi</title>
</head>
<body>
    <h1>Registrasi</h1>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="nama">Nama</label><br>
                <input type="text" name="nama" id="nama">
            </li>
        </ul>
        <ul>
            <li>
                <label for="email">Email</label><br>
                <input type="text" name="email" id="email">
            </li>
        </ul>
        <ul>
            <li>
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password">
            </li>
        </ul>
        <ul>
            <li>
                <label for="password2">Regist password</label><br>
                <input type="password" name="password2" id="password2">
            </li>
        </ul>
        <ul>
            <li>
                <button type="submit" name="submit">Regist</button>
            </li>
        </ul>
    </form>
</body>
</html>