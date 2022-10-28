<?php
$judul = "PRINT";
include "koneksi.php";
session_start();

date_default_timezone_set("Asia/Jakarta");
$tglHariIni=date('Y-m-d');
$bulanIni = date("Y")."-".date("m")."-1";
$bulanIni = strtotime($bulanIni);
$bulanIni = date("Y-m-d", $bulanIni);

$tahunIni = date("Y")."-01-1";
$tahunIni = strtotime($tahunIni);
$tahunIni = date("Y-m-d", $tahunIni);

$jabatan = $_SESSION['jabatan'];
if(!isset($_REQUEST["detail"])){
?>
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
<div class="jumbotron">
    
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Laporan Transaksi<br>CAFE EMILIA ISK</h2>
                <hr>
                <div id="tampilkanTransaksiPeriode">
                    <table class="table table-bordered table-responsive table-hover table-sm d-block" id="tblTransaksi">
                        <thead>
                            <tr class="text-center bg-secondary text-light">
                                <th width="5%">No.</th>
                                <th>Tgl</th>
                                <th>No Transaksi</th>
                                <th>Detail</th>
                                <th>Total</th>
                                <th>Meja</th>
                                <th>Kasir</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            $sql;
                            $query;
                            // $sql = "CALL pPetugas()";
                            if(isset($_REQUEST["method"])){
                                $method = $_REQUEST["method"];
                                switch($method){
                                    case "all":
                                        $sql = "SELECT * FROM tbl_transaksi ORDER BY no_transaksi ASC";
                                        $query = mysqli_query($koneksi, $sql);
                                        break;
                                    case "hari":
                                        $sql = "SELECT * FROM tbl_transaksi WHERE tgl_transaksi = '$tglHariIni' ORDER BY no_transaksi ASC";
                                        $query = mysqli_query($koneksi, $sql);
                                        break;
                                    case "bulan":
                                        $sql = "SELECT * FROM tbl_transaksi WHERE tgl_transaksi >= '$bulanIni' AND tgl_transaksi <= '$tglHariIni' ORDER BY no_transaksi ASC";
                                        $query = mysqli_query($koneksi, $sql);
                                        break;
                                    case "tahun":
                                        $sql = "SELECT * FROM tbl_transaksi WHERE tgl_transaksi >= '$tahunIni' AND tgl_transaksi <= '$tglHariIni' ORDER BY no_transaksi ASC";
                                        $query = mysqli_query($koneksi, $sql);
                                        break;
                                    case "periode":
                                        $periodeAwal = $_REQUEST["periodeAwal"];
                                        $periodeAkhir = $_REQUEST["periodeAkhir"];
                                        $sql = "SELECT * FROM tbl_transaksi WHERE tgl_transaksi >= '$periodeAwal' AND tgl_transaksi <= '$periodeAkhir' ORDER BY no_transaksi ASC";
                                        $query = mysqli_query($koneksi, $sql);
                                        break;
                                    default:
                                        $sql = "SELECT * FROM tbl_transaksi ORDER BY no_transaksi ASC";
                                        $query = mysqli_query($koneksi, $sql);
                                        break;
                                }
                            }
                            else{
                                $sql = "SELECT * FROM tbl_transaksi ORDER BY no_transaksi ASC";
                                $query = mysqli_query($koneksi, $sql);
                            }
                            
                            while($data = mysqli_fetch_array($query)){
                                $no_transaksi = $data['no_transaksi'];
                                $tanggal = date_create($data['tgl_transaksi']);
                                ?>
                                <tr>
                                    <td align="center"><?=$no++;?>.</td>
                                    <td align="center"><?=date_format($tanggal, "d-m-Y");?></td>
                                    <td><?=$no_transaksi;?></td>
                                    <td>
                                        <table class="table table-bordered table-sm">
                                            <thead>
                                                <tr class="text-center bg-success" width="auto">
                                                    <th>No.</th>
                                                    <th>Nama Menu</th>
                                                    <th>Harga</th>
                                                    <th>Qty</th>
                                                    <th>Sub</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $nomer = 1;
                                                $sql1 = "SELECT * FROM tbl_transaksi_detail a INNER JOIN tbl_menu b ON a.id_menu = b.id_menu WHERE a.no_transaksi = '$no_transaksi' ORDER BY a.id_detail";
                                                $query1 = mysqli_query($koneksi, $sql1);
                                                while($data1 = mysqli_fetch_array($query1)){?>
                                                    <tr>
                                                        <td align="center"><?=$nomer++;?>.</td>
                                                        <td><?=$data1['nama_menu'];?></td>
                                                        <td align="right"><?=number_format($data1['harga']);?></td>
                                                        <td align="right"><?=number_format($data1['qty']);?></td>
                                                        <td align="right"><?=number_format($data1['harga'] * $data1['qty']);?></td>
                                                    </tr>
                                                    <?php
                                                }?>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td align="right"><?=number_format($data['total_transaksi']);?></td>
                                    <td align="center"><?=$data['no_meja'];?></td>
                                    <td align="center"><?php
                                        $id_pegawai = $data["id_pegawai"];
                                        $kasir = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE id_pegawai = '$id_pegawai'"));
                                        if($kasir == ""){
                                            echo "Pegawai Tidak Diketahui";
                                        }
                                        else{
                                            echo $kasir["nama_pegawai"];
                                        }
                                    ?></td>
                                </tr>
                                <?php
                            }?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</center>

<?php
}
?>