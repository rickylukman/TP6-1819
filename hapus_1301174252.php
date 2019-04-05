<?php
// include database connection file
include_once("config_1301174252.php");

//MASUKKAN QUERY UNTUK HAPUS
//SETELAH HAPUS BERHASIL AKAN DILANJUTKAN KE HALAMAN REKAP NILAI
$id = $_GET["id"];
$sql = "delete from nilai where id = '$id'";
mysqli_query($conn,$sql);
header("location:rekapnilai_1301174252.php");

?>
