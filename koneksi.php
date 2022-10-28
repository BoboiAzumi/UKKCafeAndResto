<?php
    // error_reporting(0);
    
    $koneksi = mysqli_connect("localhost", "root", "", "cafe");
    if(!$koneksi){
        echo "Koneksi Error :(";
        exit();
    }

?>