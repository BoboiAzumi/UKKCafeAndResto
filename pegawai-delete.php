<?php
include "koneksi.php";
include "makelog.php";
session_start();

$id_pegawai = $_GET["id_pegawai"];
if(str_contains($id_pegawai, "'") || str_contains($id_pegawai, "\"")){
    ?>
        <script>
            location.href = "sqlinjection.php";
        </script>
    <?php
}
$sql = "SELECT * FROM tbl_pegawai WHERE id_pegawai = '$id_pegawai'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
$nama_pegawai = $data["nama_pegawai"];
$photo = $data["photo"];

$query = "DELETE FROM tbl_pegawai WHERE id_pegawai = '$id_pegawai'";
$hsl = mysqli_query($koneksi, $query);
if($hsl == 1){
    makelog("Menghapus pegawai ".$nama_pegawai);
    if($photo != ""){
        unlink("photo/".$photo);
        header("location:pegawai.php?hasil=3");
    }
    else{
        header("location:pegawai.php?hasil=6");
    }
}
?>