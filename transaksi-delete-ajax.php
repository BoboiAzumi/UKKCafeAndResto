<?php
include "koneksi.php";
$id_detail = $_REQUEST['id_detail'];

$sql = "SELECT * FROM tbl_transaksi_detail WHERE id_detail = '$id_detail' ORDER BY id_detail";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
$no_transaksi = $data['no_transaksi'];
$qty = $data['qty'];
$harga = $data['harga'];
$total_transaksi = $qty * $harga;

$sql = "DELETE FROM tbl_transaksi_detail WHERE id_detail = '$id_detail'";
mysqli_query($koneksi, $sql);
$sql = "SELECT * FROM tbl_transaksi_detail WHERE no_transaksi = '$no_transaksi' ORDER BY id_detail, no_transaksi";
$query = mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query) > 0){
    $sql = "UPDATE tbl_transaksi SET total_transaksi = total_transaksi - '$total_transaksi' WHERE no_transaksi = '$no_transaksi'";
    mysqli_query($koneksi, $sql);

    $sql = "SELECT * FROM tbl_transaksi WHERE no_transaksi = '$no_transaksi' ORDER BY no_transaksi";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
    $total = $data['total_transaksi'];
    echo $no_transaksi.$total;
}
else{
    $sql = "DELETE FROM tbl_transaksi WHERE no_transaksi = '$no_transaksi'";
    mysqli_query($koneksi, $sql);
    echo 0;
}