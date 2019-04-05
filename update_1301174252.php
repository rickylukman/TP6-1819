<?php
// include database connection file
include_once("config_1301174252.php");

//MASUKKAN QUERY UNTUK UPDATE
//SETELAH UPDATE BERHASIL AKAN DILANJUTKAN KE HALAMAN REKAP NILAI
if(isset($_POST["submit"])){
  $id = $_GET["id"];
  $uts = $_POST["uts"];
    $uas = $_POST["uas"];
    $kuis = $_POST["kuis"];
    $tubes = $_POST["tubes"];

    $sql = "update nilai set uts = '$uts', uas = '$uas', kuis = '$kuis', tubes = '$tubes' where id = '$id'";
    mysqli_query($conn,$sql);
    header("location:rekapnilai_1301174252.php");
}

?>
