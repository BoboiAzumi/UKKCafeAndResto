<?php
date_default_timezone_set("Asia/Jakarta");
$tglHariIni=date('Y-m-d');
$bulanIni = date("Y")."-".date("m")."-1";
$bulanIni = strtotime($bulanIni);
$bulanIni = date("Y-m-d", $bulanIni);

$tahunIni = date("Y")."-01-1";
$tahunIni = strtotime($tahunIni);
$tahunIni = date("Y-m-d", $tahunIni);

//error_reporting(0);
session_start();
if(!isset($_SESSION["id_pegawai"])){
	header("location:index.php");
}
$id_pegawai = $_SESSION['id_pegawai'];
$nama_pegawai = $_SESSION['nama_pegawai'];
$jabatan = $_SESSION['jabatan'];
$photo = "photo/".$_SESSION["photo"];
//$jabatan = "Manajer";
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $judul; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="img/logo.ico" />
    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" href="css/component-chosen.css"/>
    <link rel="stylesheet" href="css/all.min.css">

    <!-- JS -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/fontawesome.js"></script>
    <script src="js/simple.money.format.js"></script>
    <script src="js/chosen.jquery.min.js"></script>
    <script src="js/style.js"></script>

    <style>
        body{
            <?php
            switch($jabatan){
                case "Admin":
                    echo 'background: url("img/Admin.jpg");';
                    break;
                case "Manajer":
                    echo 'background: url("img/Manajer.jpg");';
                    break;
                case "Kasir":
                    echo 'background: url("img/Kasir.jpg");';
                    break;
            }
            ?>
            background-repeat: none;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .flx {
            display: flex;
        }

        .whiteBg{
            background: white;
        }

        a, a:hover{
            text-decoration: none;
            color: black;
        }

        .btn.btn-link.btn-block{
            color: black;
        }

        .btn.btn-link.btn-block:hover{
            text-decoration: no;
        }

        .menuMaster:hover{
            display: block;
            background: rgb(57, 192, 237);
            padding: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .bgMenu{
            background: rgba(57, 192, 237, 0.3);
            display:block;
        }

        .hoverMenu:hover a, .hoverMenu:hover, .hoverMenu:hover button{
            background: rgba(57, 192, 237, 1);
            font-size: 24px;
            text-decoration: none;
        }

        .input-group-text.lebar{
            width: 150px;
            height: 31px;
        }

        .input-group-text.lebar1{
            width: 120px;
            height: 31px;
        }

        .transaksiAksi:hover, .transaksiAksi2:hover{
            cursor: pointer;
        }

        tr>td, tr>th{
            vertical-align: middle!important;
        }


    </style>
</head>
<body>
    <div class="Showdisplay" style="display:block">
    <div class="flx">
    <div class="container">
        <div class="row mt-5">
            <div class="col-3">
                <div class="accordion shadow" id="accordionExample">
                    <div class="card bgMenu hoverMenu">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <a href="dashboard.php" class="btn btn-link btn-block text-left text-white"><strong class="border-secondary">DASHBOARD HOME</strong></a>
                            </h2>
                        </div>
                    </div>

                    <?php
                    if(($jabatan=="Admin" or $jabatan=="Manajer") AND $jabatan != "kasir"){?>
                    <!-- Begin Master -->
                    <div class="card">
                        <div class="card-header hoverMenu">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne">M A S T E R&nbsp&nbsp&nbsp  M E N U</button>
                            </h2>
                        </div>
                    <!-- Detail Master -->
                        <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                            <div class="card-body ml-4">
                    <?php
                    if($jabatan=="Admin"){
                    ?>
                        <div class="menuMaster"><i class="fas fa-check-circle text-success"></i><a href="login.php">Master Login</a></div>
                        <?php
                    }else{
                    ?>
                    <div class="menuMaster"><i class="fas fa-check-circle text-success"></i><a href="pegawai.php">Master Pegawai</a></div>
                    <div class="menuMaster"><i class="fas fa-check-circle text-success"></i><a href="menu.php">Master Menu</a></div>
                    <?php
                }?>
                        </div>
                    </div>
                </div>
                <!-- End Master-->
            <?php
        }?>

            <?php
            if($jabatan=="Kasir"){?>
            <!-- Transaksi -->
            <div class="card">
                <div class="card-header hoverMenu">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">Transaksi</button>
                    </h2>
                </div>
                
                <!-- Detail -->
                <div id="collapseTwo" class="collapse" data-parrent="#accordionExample">
                    <div class="card-body ml-4">
                        <div class="menuMaster"><i class="fas fa-check-circle text-success"></i><a href="transaksi.php">Entri Transaksi</a></div>
                    </div>
                </div>
            </div>
            <!-- End Transaksi -->
            <?php
        }?>
            <div class="card">
                <div class="card-header hoverMenu">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree">Laporan</button>
                    </h2>
                </div>
                <div id="collapseThree" data-parent="#accordionExample">
                    <div class="card-body ml-4">
                    <?php
                        if($jabatan != "Admin"){?>
                            <div class="menuMaster"><i class="fas fa-check-circle text-success"></i><a href="transaksi-laporan.php">Laporan Transaksi</a></div>
                            <!-- <div class-"menuMaster"> <i class="fas fa-check-circle text-success"></i><a href="history.php" target="_blank">Laporan Transaksi</a></div>-->
                        <?php
                    }?>
                        
                        <?php
                        if($jabatan=="Admin" or $jabatan == "Manajer"){?>
                            <!-- <div class="menuMaster"><i class="fas fa-check-circle text-success"></i><a href="history.php" target="_blank">Log History..</a></div> -->
                            <div class="menuMaster"><i class="fas fa-check-circle text-success"></i><a href="log.php">Log History..</a></div>
                        <?php
                    }?>

                        </div>
                                </div>
                            </div>

                            <div class="card bgMenu hoverMenu">
                                <div class="card-header">
                                    <h2 class="mb-0">
                                        <a href="logout.php" class="btn btn-link btn-block text-left text-white"><strong class="border-secondary">LOG OUT</strong></a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                </div>