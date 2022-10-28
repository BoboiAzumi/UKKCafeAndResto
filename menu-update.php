<?php
include "koneksi.php";
include "makelog.php";
session_start();

$id_menu = $_POST["id_menu"];
$nama_menu = $_POST["nama_menu"];
$jenis_menu = $_POST["jenis_menu"];
$harga = str_replace(",", "", mysqli_escape_string($koneksi, $_POST["harga"]));

$sql = "UPDATE tbl_menu SET nama_menu = '$nama_menu', jenis_menu = '$jenis_menu', harga = '$harga' WHERE id_menu = '$id_menu'";
makelog("Mengubah menu ".$nama_menu);
mysqli_query($koneksi, $sql);
header("location:menu.php");
?>