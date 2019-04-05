<!DOCTYPE html>
<html lang="en">
<?php

require_once("config_1301174252.php");
session_start();
//MASUKKAN KODE DISINI
  $sql = "select * from nilai where id='$_GET[id]'";
//MASUKKAN QUERY UNTUK MENDAPATKAN NILAI YANG INGIN DIUPDATE

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Input Nilai-<?= $_SESSION['nim']?></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
    <div class="content">
        <div class="input">
            <h1>input nilai - <?= $_SESSION['nim'] ?></h1>
            <!-- BUAT PERULANGAN UNTUK MENGELUARKAN HASIL DARI NILAI YANG TELAH DIAMBIL DARI DATABASE -->
            <?php
            if($result = mysqli_query($conn,$sql)){
              while ($getNilai=mysqli_fetch_array($result)) {
                ?>
            <form action="update_1301174252.php?id=<?= $getNilai['id']?>" method="POST"><!--GANTI ID NYA-->
                <input type="text" placeholder="NIM" name="nim" value='<?= $getNilai["id"]?>' readonly><!--GANTI VALUE JADI NIM-->
                <input type="text" placeholder="UTS" name="uts" value='<?= $getNilai["uts"]?>'><!--GANTI VALUE JADI NILAI UTS-->
                <input type="text" placeholder="UAS" name="uas" value='<?= $getNilai["uas"]?>'><!--GANTI VALUE JADI NILAI UAS-->
                <input type="text" placeholder="Kuis" name="kuis"value='<?= $getNilai["kuis"]?>'><!--GANTI VALUE JADI NILAI KUIS-->
                <input type="text" placeholder="Tubes" name="tubes" value='<?= $getNilai["tubes"]?>'><!--GANTI VALUE JADI NILAI TUBES-->
                <button type="submit" name='submit'>Edit</button>
            </form>
            <?php
                }
              }
             ?>
        </div>
    </div>
</body>
</html>
