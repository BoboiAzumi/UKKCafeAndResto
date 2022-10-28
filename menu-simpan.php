<?php
include "koneksi.php";
include "makelog.php";
session_start();

$nama_menu = $_REQUEST["nama_menu"];
$jenis_menu = $_REQUEST["jenis_menu"];
if (str_contains($nama_menu, "'")){
    ?>
        <script>
            location.href = "sqlinjection.php";
        </script>
    <?php
}
$harga = str_replace(",", "", mysqli_escape_string($koneksi, $_REQUEST["harga"]));
// $harga = str_replace(",", "", mysqli_escape_string($koneksi, $_POST["harga"]));
$sql = "INSERT INTO tbl_menu(nama_menu, jenis_menu, harga) VALUES ('$nama_menu', '$jenis_menu', '$harga')";
makelog("Menambah menu ".$nama_menu);
echo $sql."<br>";
mysqli_query($koneksi, $sql);
header("location:menu.php");
?>