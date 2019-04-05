<!DOCTYPE html>
<html lang="en">
<?php

require_once("config_1301174252.php");
session_start();
//Masukan Kode disini
//NOTE: JIKA NIM DAN PASSWORD BENAR MAKA HALAMAN INPUT NILAI TERBUKA. JIKA SALAH KEMBALI KE MENU LOGIN
  if(isset($_POST["submit"])){
    $nim = $_POST["nim"];
    $pass = $_POST["password"];
    $login = mysqli_query($conn, "select * from akun where nim='$nim' and password='$pass'");
    $cek = mysqli_num_rows($login);

    if($cek > 0){
      $row = mysqli_fetch_array($login);
      $_SESSION["nim"] = $row["nim"];
      $_SESSION["password"] = $row["password"];
      header("location:inputNilai_1301174252.php");
    }else{
      header("location:login_1301174252.php?login-gagal");
    }
  }


?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Input Nilai- <?= $_SESSION['nim']?></title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
  <div class="content">
    <div class="input">
      <h1>input nilai - <?= $_SESSION['nim']?></h1>
      <form action="insert_1301174252.php" method="POST">
        <input type="text" placeholder="NIM" name="nim" value= '<?= $_SESSION['nim']?>' readonly>
        <input type="text" placeholder="UTS" name="uts">
        <input type="text" placeholder="UAS" name="uas">
        <input type="text" placeholder="Kuis" name="kuis">
        <input type="text" placeholder="Tubes" name="tubes">
        <button type="submit" name='submit'>Input</button>
      </form>
    </div>
  </div>
</body>
</html>
