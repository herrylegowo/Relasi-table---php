<?php
    session_start();
    require 'function.php';
    $query = artikel2();
    
    if(isset($_POST["submit"])){
        $artikel = [
            
            "id_user" => $_SESSION["login"]["userId"],
            "judulartikel" => ($_POST["judul"]) ,
            "isiartikel" => ($_POST["isi"]) 
        ];
        $inserKomentar = make($artikel);
        if($inserKomentar){
            echo "
                    <script>
                        alert ('succes');
                        document.location.href = 'artikel.php';
                    </script>
                ";
        }else{
            echo "
                    <script>
                        alert ('Try again');
                        document,location.href = 'artikel.php';
                    </script>
                ";
        }
        
            
    }
    foreach ($query as $row);
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Make your artikel</title>
</head>
<body>
    <h3>Make artikel</h3>
    <form action="" method="POST">
        
        <div style="width: 50%; border: 1px solid #000; padding: 10px; margin-top: 10px;">
            <h1>Judul
                <label for="judul"></label><br>
                <input type="text" name="judul" id="judul" style="widh: 40% border: 1px solid #000; padding: 20px; margin-top: 10px;">
            </h1><hr>
            <p><?= $_SESSION["login"]["nama"]; ?></p><hr>
            <p>Artikel
                <label for="isi"></label>
                <input type="text" name="isi" id="isi" style="width: 70%; border: 1px solid #000; padding: 80px; margin-top: 10px;">
            </p>
        </div><br>
        <button type="submit" name="submit">buat</button>
    </form>
</body>
</html>