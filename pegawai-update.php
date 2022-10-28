<?php
include "koneksi.php";
include "makelog.php";
session_start();

$namaBaru = date("dmYHis");
$id_pegawai = htmlspecialchars($_POST["id_pegawai"]);
$nama_pegawai = htmlspecialchars($_POST["nama_pegawai"]);
$jenis_kelamin = htmlspecialchars($_POST["jenis_kelamin"]);
$alamat = htmlspecialchars($_POST["alamat"]);
$telp = htmlspecialchars($_POST["telp"]);
$jabatan = htmlspecialchars($_POST["jabatan"]);
$photo = $_FILES["photo"]["name"];
if($photo != ""){
    $photo = $namaBaru.$_FILES["photo"]["name"];
    $sql = "SELECT * FROM tbl_pegawai WHERE id_pegawai = '$id_pegawai'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
    $poto = $data["photo"];

    $sql = "UPDATE tbl_pegawai SET
    nama_pegawai = '$nama_pegawai',
    jenis_kelamin = '$jenis_kelamin',
    alamat = '$alamat',
    telp = '$telp',
    photo = '$photo',
    jabatan = '$jabatan'
    WHERE id_pegawai = '$id_pegawai'";

    $hsl = mysqli_query($koneksi, $sql);
    if($hsl == 1){
        if($poto != ""){
            unlink("photo/".$poto);
        }
        move_uploaded_file($_FILES["photo"]["tmp_name"], "photo/".$photo);
        header("location:pegawai.php?hasil=2");
    }
    else{
        header("location:pegawai.php?hasil=5");
    }
}
else{
    $sql = "SELECT * FROM tbl_pegawai WHERE id_pegawai = '$id_pegawai'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);

    $sql = "UPDATE tbl_pegawai SET
    nama_pegawai = '$nama_pegawai',
    jenis_kelamin = '$jenis_kelamin',
    alamat = '$alamat',
    telp = '$telp',
    jabatan = '$jabatan'
    WHERE id_pegawai = '$id_pegawai'";

    $hsl = mysqli_query($koneksi, $sql);
    if($hsl == 1){
        makelog("Mengubah informasi pegawai ".$nama_pegawai);
        header("location:pegawai.php?hasil=2");
    }
    else{
        header("location:pegawai.php?hasil=5");
    }
}
?>