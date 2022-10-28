<?php
include "koneksi.php";
$no_transaksi = $_REQUEST['noTransaksi'];
$total_bayar = str_replace(",",'', mysqli_escape_string($koneksi, $_REQUEST["totalBayar"]));

$sql = "UPDATE tbl_transaksi SET total_bayar = '$total_bayar' WHERE no_transaksi = '$no_transaksi'";
mysqli_query($koneksi, $sql);
?>