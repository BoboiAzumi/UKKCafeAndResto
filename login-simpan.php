<?php
include "koneksi.php";
include "makelog.php";
session_start();

$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);
echo $id_pegawai = $_POST["id_pegawai"];
//$sql = "CALL pPetugasSimpan("username", "$password", "$nama_petugas", "$level");
$sql = "INSERT INTO tbl_login(id_pegawai, username, password) values ('$id_pegawai', '$username', '$password')";
$hsl = mysqli_query($koneksi, $sql);
if($hsl == 1){
    makelog("Menambah username ".$username);
    header("Location:login.php?hasil=1");
}
else{
    header("Location:login.php?hasil=4");
}