<?php
include "koneksi.php";
$id_login = $_GET["id_login"];

$sql = "CALL pLoginDelete($id_login)";
// $sql = "DELETE FROM tbl_login WHERE id_login = '$id_login'";
mysqli_query($koneksi, $sql);
if($hsl == 1){
    header("Location:login.php?hasil=3");
}
else{
    header("Location:login.php?hasil=6");
}

?>