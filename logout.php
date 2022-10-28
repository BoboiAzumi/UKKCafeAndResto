<?php
include "koneksi.php";
session_start();
if(!isset($_SESSION["id_pegawai"])){
	header("location:../");
}
$id_pegawai = $_SESSION["id_pegawai"];
$nama_pegawai = $_SESSION["nama_pegawai"];
$jabatan = $_SESSION["jabatan"];

$sql1 = "INSERT INTO tbl_log(id_pegawai, nama_pegawai, jabatan, aksi) values ('$id_pegawai', '$nama_pegawai', '$jabatan', 'Melakukan Logout')";
$query = mysqli_query($koneksi, $sql1);

session_destroy();
header("location:index.php");

?>