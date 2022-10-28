<?php
$judul = "MASTER LAPORAN";
include "header.php";
include "koneksi.php";
$jabatan = $_SESSION['jabatan'];
if(!isset($_REQUEST["detail"])){
?>

<div class="col-9 jumbotron">
    
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Rekapitulasi Transaksi</h2>
                <div class="input-group mb-1">
                    <span class="input-group-text lebar1">Dari</span>
                    <input type="date" id="periodeDari" class="form-control form-control-sm" value="<?=$tglHariIni;?>">
                    <span class="input-group-text lebar1">Sampai</span>
                    <input type="date" id="periodeSampai" class="form-control form-control-sm" value="<?=$tglHariIni;?>">
                    <a class="btn btn-sm btn-primary text-white" id="periodeCari"><i class="fas fa-search"></i></a>
                    <a class="btn btn-sm btn-success text-white" id="periodePrint"><i class="fas fa-print"></i></a>
                    <a class="btn btn-sm btn-warning text-white" id="periodeBack"><i class="fas fa-redo"></i></a>
                </div>
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
                            // $sql = "CALL pPetugas()";
                            $sql = "SELECT * FROM tbl_transaksi ORDER BY tgl_transaksi DESC, no_transaksi DESC";
                            $query = mysqli_query($koneksi, $sql);
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
                                                    <?php
                                                    if($jabatan === "Manajer"){?>
                                                        <th>Aksi</th>
                                                        <?php
                                                    }?>
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
                                                    <?php
                                                    if($jabatan=="Manajer"){?>
                                                        <td align="center"><i class="fas fa-trash text-danger transaksiAksi2" id="<?=$data1['id_detail'];?>" title="hapus"></i></td>
                                                    <?php
                                                    }?>
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


<div class="printableArea"></div>

<script>
    var isPeriode = false;
    $(document).ready(function(){
        $('#tblTransaksi').dataTable({
            "drawCallback":function(){
                $('.paginate_button').addClass('btn btn-sm btn-light');
            },
            "lengthMenu":[[10,25,50,100,-1], [10,25,50,100,"ALL"]]
        });
        // Menampilkan Tabel Transaksi Per Periode
        $(document).on('click', '#periodeCari', function(){
            isPeriode = true;
            var periodeDari = $('#periodeDari').val();
            var periodeSampai = $('#periodeSampai').val();
            $.ajax({
                method:'POST',
                data:{periodeDari:periodeDari, periodeSampai:periodeSampai},
                url:'transaksi-cari-periode.php',
                cache:false,
                success:function(){
                    $('#tampilkanTransaksiPeriode').load('transaksi-cari-periode.php',{
                        periodeDari:periodeDari, periodeSampai:periodeSampai
                    });
                }
            });
        });

        $(document).on('click', '#periodePrint',function(){
            document.getElementsByClassName("Showdisplay")[0].style = "display:none";
            document.getElementsByClassName("printableArea")[0].style = "display:block";
            if(isPeriode){
                var periodeDari = $('#periodeDari').val();
                var periodeSampai = $('#periodeSampai').val();
                $.ajax({
                    method:'POST',
                    data:{method:"periode", periodeAwal:periodeDari, periodeAkhir:periodeSampai},
                    url:'transaksi-laporan-print.php',
                    cache:false,
                    success:function(result){
                        document.getElementsByClassName("printableArea")[0].innerHTML = result;
                        window.print();
                        document.getElementsByClassName("printableArea")[0].innerHTML = "";
                        document.getElementsByClassName("printableArea")[0].style = "display:none";
                        document.getElementsByClassName("Showdisplay")[0].style = "display:block";
                    }
                });
            }
            else{
                $.ajax({
                    method:'POST',
                    data:{method:"all"},
                    url:'transaksi-laporan-print.php',
                    cache:false,
                    success:function(result){
                        document.getElementsByClassName("printableArea")[0].innerHTML = result;
                        window.print();
                        document.getElementsByClassName("printableArea")[0].innerHTML = "";
                        document.getElementsByClassName("printableArea")[0].style = "display:none";
                        document.getElementsByClassName("Showdisplay")[0].style = "display:block";
                    }
                });
            }
            
        });
        
        $(document).on('click', '#periodeBack', function(){
            location.href = "transaksi-laporan.php";
        });

        // Hapus
        $(document).on('click','.transaksiAksi2', function(){
            var id_detail = $(this).attr('id');
            var periodeDari = $('#periodeDari').val();
            var periodeSampai = $('#periodeSampai').val();
            $.ajax({
                method:'POST',
                data:{id_detail:id_detail},
                url:'transaksi-delete-ajax.php',
                cache:false,
                success:function(){
                    $('#tampilkanTransaksiPeriode').load('transaksi-cari-periode.php', {periodeDari:periodeDari, periodeSampai:periodeSampai});
                }
            });
            
        });
    });
</script>

<?php
}else{
    if($_REQUEST["detail"] == "bulan_ini"){
        include "transaksi-laporan-bulan.php";
    }
    else if($_REQUEST["detail"] == "hari_ini"){
        include "transaksi-laporan-hari.php"; 
    }
    else if($_REQUEST["detail"] == "tahun_ini"){
        include "transaksi-laporan-tahun.php";
    }
    else if($_REQUEST["detail"] == "keseluruhan"){
        include "transaksi-laporan-keseluruhan.php";
    }
    else{
        echo "<script>location.href = 'transaksi-laporan.php'</script>";
    }
?>

<?php
}
?>