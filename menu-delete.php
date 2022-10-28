<?php
include "koneksi.php";
include "makelog.php";
session_start();

$id_menu = htmlspecialchars($_GET["id_menu"]);
$sql = mysqli_query($koneksi, "SELECT * FROM tbl_menu where id_menu = '$id_menu'");
$d = mysqli_fetch_array($sql);
$nama_menu = $d["nama_menu"];

$sql = "DELETE FROM tbl_menu WHERE id_menu = '$id_menu'";
mysqli_query($koneksi, $sql);
makelog("Menghapus menu ".$nama_menu);
header("location:menu.php");
?>