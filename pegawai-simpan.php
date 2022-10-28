<?php
include "koneksi.php";
include "makelog.php";
session_start();

$namaBaru = date("dmYHis");
$nama_pegawai = htmlspecialchars($_POST["nama_pegawai"]);
$jenis_kelamin = htmlspecialchars($_POST["jenis_kelamin"]);
$alamat = htmlspecialchars($_POST["alamat"]);
$telp = htmlspecialchars($_POST["telp"]);
$jabatan = htmlspecialchars($_POST["jabatan"]);
$photo = $_FILES["photo"]["name"];
if($photo != ""){
    $photo = $namaBaru.$_FILES["photo"]["name"];
    //echo $temp = $namaBaru.$_FILES["photo"]["tmp_name"];
    $sql = "INSERT INTO tbl_pegawai(nama_pegawai, jenis_kelamin, alamat, telp, jabatan, photo) VALUES ('$nama_pegawai', '$jenis_kelamin', '$alamat', '$telp', '$jabatan', '$photo')";
    $hsl = mysqli_query($koneksi, $sql);
    if($hsl == 1){
        makelog("Menambah pegawai ".$nama_pegawai);
        move_uploaded_file($_FILES["photo"]["tmp_name"], "photo/".$photo);
        header("location:pegawai.php?hasil=1");
    }
    else{
        header("location:pegawai.php?hasil=3");
    }
}
?>