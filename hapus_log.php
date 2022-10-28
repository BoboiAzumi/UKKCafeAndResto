<?php
require "koneksi.php";  
session_start();

if(!isset($_SESSION["jabatan"])){
    header("location:index.php");
}
else{
    if($_SESSION["jabatan"] == "Kasir"){
        header("location:dashboard.php");
    }
    else{
        mysqli_query($koneksi, "DELETE FROM tbl_log WHERE 1");

        mysqli_query($koneksi, "INSERT INTO tbl_log (id_pegawai, nama_pegawai, jabatan, aksi) VALUES ('".$_SESSION["id_pegawai"]."','".$_SESSION["nama_pegawai"]."','".$_SESSION["jabatan"]."','Menghapus seluruh Log History')");
        header("location:log.php");
    }
}
?>