<?php
require "koneksi.php";

function makelog($aksi){
    global $koneksi;
    $id_pegawai = $_SESSION['id_pegawai'];
    $nama_pegawai = $_SESSION['nama_pegawai'];
    $jabatan = $_SESSION['jabatan'];

    $sql1 = "INSERT INTO tbl_log(id_pegawai, nama_pegawai, jabatan, aksi) VALUES ('$id_pegawai', '$nama_pegawai', '$jabatan', '$nama_pegawai - $aksi')";
    $query = mysqli_query($koneksi, $sql1);
    return 0;
}
?>