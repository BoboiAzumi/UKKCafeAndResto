<?php
include "koneksi.php";
include "makelog.php";
session_start();

$id_login = $_POST["id_login"];
$id_pegawai = $_POST["id_pegawai"];
$username = $_POST["username"];
$password = $_POST["password"];

//$sql = "CALL pPetugasUpdate('$nama_petugas', '$username', '$password', '$level', '$id_petugas')";
$sql = "UPDATE tbl_login SET id_pegawai = '$id_pegawai', username = '$username', password = '$password' where id_login = '$id_login'";
$hsl = mysqli_query($koneksi, $sql);

if($hsl == 1){
    makelog("Mengubah informasi username ".$username);
    header("location:login.php?hasil=2");
}
else{
    header("location:login.php?hasil=5");
}