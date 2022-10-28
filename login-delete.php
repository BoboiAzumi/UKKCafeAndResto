<?php
include "koneksi.php";
include "makelog.php";
session_start();

$id_login = $_GET["id_login"];

// $sql = "CALL pLoginDelete($id_Login)";
$sql = mysqli_query($koneksi, "SELECT id_pegawai, username FROM tbl_login where id_login = '$id_login'");
$d = mysqli_fetch_array($sql);
$id_pegawai = $d["id_pegawai"];
$username = $d["username"];

$sql = "DELETE FROM tbl_login WHERE id_login = '$id_login'";
mysqli_query($koneksi, $sql);
//mysqli_query($koneksi, "DELETE FROM tbl_pegawai WHERE id_pegawai = '$id_pegawai'");
$hsl = mysqli_query($koneksi, $sql);


if($hsl == 1){
    makelog("Menghapus username ".$username);
    header("location:login.php?hasil=3");
}
else{
    header("location:login.php?hasil=6");
}

?>