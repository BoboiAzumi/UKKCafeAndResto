<?php
session_start();
include "koneksi.php";
// mysqli_escape_string = mencegah sql injection
$username = mysqli_escape_string($koneksi, $_POST['username']);
$password = mysqli_escape_string($koneksi, $_POST["password"]);

// $username = $_POST["username"];
// $password = $_POST["password"];

// $sql = "CALL pLogin ('$username', '$password');";
$sql = "SELECT b.id_pegawai, b.nama_pegawai, b.photo, b.jabatan FROM tbl_login a INNER JOIN tbl_pegawai b ON a.id_pegawai = b.id_pegawai WHERE a.username = '$username' AND a.password = '$password'";
$query = mysqli_query($koneksi, $sql);
// mysqli_num_rows ($query) > 0 = ditemukan

if(mysqli_num_rows($query)){
    $data = mysqli_fetch_array($query);
    $id_pegawai = $data["id_pegawai"];
    $nama_pegawai = $data["nama_pegawai"];
    $jabatan = $data["jabatan"];

    $_SESSION["id_pegawai"] = $id_pegawai;
    $_SESSION["nama_pegawai"] = $nama_pegawai;
    $_SESSION["jabatan"] = $jabatan;
    $_SESSION["photo"] = $data["photo"];

    $sql1 = "INSERT INTO tbl_log(id_pegawai, nama_pegawai, jabatan, aksi) VALUES ('$id_pegawai', '$nama_pegawai', '$jabatan', 'Login-Melakukan Login')";
    $query = mysqli_query($koneksi, $sql1);

    header("location:dashboard.php");
}
else{
    header("location:loginerror.php");
}
?>