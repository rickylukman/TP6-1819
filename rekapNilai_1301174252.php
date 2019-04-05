<!DOCTYPE html>
<html lang="en">
<?php


require_once("config_1301174252.php");
session_start();
//MASUKKAN KODE DISINI
//AMBIL NIM DARI DATABASE
//AMBIL NILAI DARI DATABASE
/*BUAT FUNGSI UNTUK MENGHASILKAN INDEX
    A jika 80 < total <= 100,
    AB jika 70 < total <= 80,
    B jika 60 < total <= 70,
    C jika 50 < total <= 60 dan
    D jika 40 < total <= 50,
    E jika selain kondisi lainnya

    DIMANA total = uts*25% + uas*25% + kuis*15% + tubes*35%
*/
function getIndex($uts, $uas, $kuis, $tubes){
        $total = ($uts*0.25) + ($uas*0.25) + ($kuis*0.15) + ($tubes*0.35);
        if(($total <= 100) && ($total > 80)){
            $index = "A";
            return $index;
        }else if(($total <= 80) && ($total > 70)){
            $index = "AB";
            return $index;
        }else if(($total <= 70) && ($total > 60)){
            $index = "B";
            return $index;
        }else if(($total <= 60) && ($total > 50)){
            $index = "C";
            return $index;
        }else if(($total <= 50) && ($total > 40)){
            $index = "D";
            return $index;
        }else{
            $index = "E";
            return $index;
        }
    }

/*BUAT FUNGSI UNTUK MENGHASILKAN KETERANGAN
    Indeks A maka keterangan = Kece,
    Indeks AB maka keterangan = Mantap,
    Indeks B maka keterangan = Ya,
    Indeks C maka keterangan = Hm,
    Indeks D maka keterangan = Aduh,
    Indeks E maka keterangan = Isi sendiri
*/
function keterangan($indeks){
    if($indeks == "A"){
        $ket = "Kece";
        return $ket;
    }else if($indeks == "AB"){
        $ket = "Mantap";
        return $ket;
    }else if($indeks == "B"){
        $ket = "Ya";
        return $ket;
    }else if($indeks == "C"){
        $ket = "Hm";
        return $ket;
    }else if($indeks == "D"){
        $ket = "Aduh";
        return $ket;
    }else if($indeks == "E"){
        $ket = "Wadidaw";
        return $ket;
    }
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rekap Nilai - <?= $nim?>]</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
    <div class="content">
        <div class="show">
            <h1>rekap nilai <?= $_SESSION["nim"]?></h1>
            <table>
                <tr>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>Kuis</th>
                    <th>Tubes</th>
                    <th>Index</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
                <!-- BUAT PERULANGAN UNTUK MENGELUARKAN HASIL DARI NILAI YANG TELAH DIAMBIL DARI DATABASE -->
                <?php
                  $nim = $_SESSION["nim"];
                  $sql = "select * from nilai where id = '$nim'";
                  if($result = mysqli_query($conn,$sql)){
                      while ($getNilai=mysqli_fetch_array($result)) {
                ?>

                <tr>
                  <td><?= $getNilai["uts"]?></td>
                    <td><?= $getNilai["uas"]?></td>
                    <td><?= $getNilai["kuis"]?></td>
                    <td><?= $getNilai["tubes"]?></td>
                    <td><?= getIndex($getNilai["uts"],$getNilai["uas"],$getNilai["kuis"],$getNilai["tubes"]);?></td>
                    <td><?= keterangan(getIndex($getNilai["uts"],$getNilai["uas"],$getNilai["kuis"],$getNilai["tubes"]));?></td>
                    <td>
                        <?php echo " <a href='edit_1301174252.php?id=$getNilai[id]'>edit</a>" ?>
                        <?php echo " <a href='hapus_1301174252.php?id=$getNilai[id]'>Hapus</a>" ?>
                    </td>
                </tr>

                <?php
                          }

                      }
                 ?>

            </table>
            <a href="logout_1301174252.php">Logout</a>
        </div>
    </div>
</body>
</html>
