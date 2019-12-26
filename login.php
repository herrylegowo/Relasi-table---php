<?php
    session_start();
      require 'function.php';
      if(isset($_POST["login"])){
          $username = $_POST["username"];
          $password = $_POST["password"];
          $result = mysqli_query($link, "SELECT * from user WHERE nama = '$username' ");
            if(mysqli_num_rows($result) === 1 ){
                $row = mysqli_fetch_assoc($result);
                if(password_verify($password, $row["password"])){
                    $userdata = [
                        "nama" => $row["nama"],
                        "userId" => $row["id_user"]
                    ];
                    $_SESSION["login"] = $userdata;
                    header("location: artikel.php");
                    exit;
                }
            }
            $error = true;
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if(isset($error)) : ?>
    <p style="color: red; font-style: italic;">Username dan password salah</p>
    <?php endif ; ?>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="username">Username</label><br>
                <input type="text" name="username" id="username" placeholder="masukan username...">
            </li>
        </ul>
        <ul>
            <li>
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password" placeholder="masukkan pssword...">
            </li>
        </ul>
        <ul>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>
</html>