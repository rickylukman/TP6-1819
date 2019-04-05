<?php
    require_once("config_1301174252.php");
    //MASUKKAN KODE DISINI UNTUK INPUT KE DATABASE
    //NOTE : SETELAH INPUT BERHASIL MAKA AKAN DILANJUTKAN KE HALAMAN REKAP NILAI
    if(isset($_POST["submit"])){
    $nim = $_POST["nim"];
    $uts = $_POST["uts"];
    $uas = $_POST["uas"];
    $kuis = $_POST["kuis"];
    $tubes = $_POST["tubes"];
    $sql = "insert into nilai(id,uts,uas,kuis,tubes) values('$nim','$uts','$uas','$kuis','$tubes')";
    mysqli_query($conn,$sql);
    header("location:rekapnilai_1301174252.php");
  }
?>
