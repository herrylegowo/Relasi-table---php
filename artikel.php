<?php
    session_start();
    require 'function.php';
    if(!isset($_SESSION["login"])){
        header("location: login.php");
    }
    $query = artikel();
    
    
    
    if(isset($_POST["submit"])){
        $komentar = [
            "id_artikel" => $_POST["artikelId"],
            "id_user" => $_SESSION["login"]["userId"],
            "komentar" => $_POST["comment"]
        ];
        $inserKomentar = comment($komentar);
        if($inserKomentar){
            header("location: artikel.php");
        }else{
            echo "<script>alert('Ada Masalah Saat Berkomentar!')</script>";
        
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman artikel</title>
</head>
<body>
    <h3>Halaman artikel</h3>
    <h2>Selamat Datang <b style="color:blue"><?= $_SESSION["login"]["nama"] ?></b></h2>
    <table border = 2>
        <tr>
            <th><a href="make_artikel.php">Buat artikel anda</a></th>
        </tr>
    </table><br>
    <table border = 2>
        <tr>
            <th><a href="logout.php">Keluar</a></th>
        </tr>
    </table>
    <?php foreach($query as $artikel): ?>
    <div style="width: 50%; border: 1px solid #000; padding: 10px; margin-top: 10px;">
        <h1 style="margin-top: 0px; margin-bottom: 5px;"><?= $artikel["judul"] ?></h1>
        <p style="font-style: italic;"><?= $artikel["nama"] ?></p>
        <p><?= $artikel["isi"] ?></p>
        <div style="border: 1px solid #000; padding: 5px">
            <form action="" method="POST">
                <table>
                    <tr>
                        <td><input type="text" name="comment" placeholder="Tulis Komentar"></td>
                        <td><input type="hidden" name="artikelId" value="<?= $artikel["id_artikel"] ?>"></td>
                        <td><input type="submit" name="submit" value="Kirim"></td>
                    </tr>
                </table>
            </form>
            <hr>
            <?php foreach($artikel["comment"] as $comments): ?>
            <div style="border: 1px solid #000; padding: 5px; margin-bottom: 5px;">
                <b><?= $comments["nama"] ?></b>
                <p style="margin-top: 5px;"><?= $comments["komentar"] ?></p>
            </div>
            <?php endforeach ?>
            <?php
            ?>
        </div>    
    </div>
    <?php endforeach ?>
</body>
</html>