<?php
$judul = "TRANSAKSI";
include "header.php";
include "koneksi.php";
if($jabatan != "Kasir"){
    ?>
        <script>
            location.href = "accessdenied.php";
        </script>
    <?php
}
?>

<div class="col-9">
    <div class="container">
        <div class="row">
            <div class="col-5" style="margin-left: -40px;">
                <div class="card border-info shadow-lg mb-3 bg-light">
                    <div class="card-header bg-transparent border-info text-info"><b>CAFE EMILIA ISK</b></div>
                    <div class="card-body">
                        <form action="" method="post" id="transaksiMenu">
                            <input type="hidden" name="no_transaksi" id="no_transaksi">
                            
                            <!-- Tanggal -->
                            <div class="input-group mb-1">
                                <span class="input-group-text lebar1">Tanggal</span>
                                <input type="date" name="tgl_transaksi" required autocomplete="off" class="form-control form-control-sm" value="<?=$tglHariIni;?>" required>
                            </div>

                            <!-- Nama Menu -->
                            <div class="input-group mb-1">
                                <select name="id_menu" id="id_menu" class="form-control form-control-sm form-control-chosen" required>
                                    <option value="" selected>~ Pilih Nama Menu ~</option>
                                    <?php
                                    include "koneksi.php";
                                    $sql = "SELECT * FROM tbl_menu ORDER BY nama_menu";
                                    $query = mysqli_query($koneksi, $sql);
                                    while($data = mysqli_fetch_array($query)){?>
                                        <option value="<?=$data['id_menu'];?>"><?=$data["nama_menu"];?> - Rp. <?=number_format($data["harga"])?></option>
                                    <?php
                                    }?>
                                </select>
                            </div>

                            <!-- Harga -->
                            <div class="input-group mb-1">
                                <span class="input-group-text lebar1">Harga</span>
                                <input type="text" name="harga" class="form-control form-control-sm money text-right" id="harga" value="0" readonly required>
                            </div>
                            
                            <!-- Banyak / Qty -->
                            <div class="input group mb-1">
                                <span class="input-group-text lebar1">Qty</span>
                                <input type="text" name="qty" required class="form-control form-control-sm text-right money angkaSemua" autocomplete="off" placeholder="Input Qty">
                            </div>

                            <!-- No Meja -->
                            <div class="input-group mb-1">
                                <span class="input-group-text lebar1">No Meja</span>
                                <input type="text" name="no_meja" id="idMeja" required class="form-control form-control-sm text-right money angkaSemua" autocomplete="off" placeholder="Input No Meja">
                            </div>

                            <div class="modal-footer">
                                <a class="btn btn-primary btn-sm text-white" id="transaksiSimpan"><i class="fas fa-save"></i> Simpan</a>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer bg-transparent border-info text-info inf">
                        Nama Kasir&nbsp: <?=strtoupper($nama_pegawai);?></br>
                        Tanggal&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?= date('d M Y');?> - <span class="text-right" id="jamKunjung"></span>
                    </div>
                </div>
            </div>
            
            <!-- Detail Transaksi -->
            <div class="col-8 detaild" style="margin-left: -29px;">
                <div class="jumbotron card border-info mb-3">
                    <div class="flx title" style="justify-content:center"></div><br>
                    <div class="card-header bg-transparent border-info">No. Invoice - 
                        <span id="noTransaksiBaru"></span></div>
                        <div class="card-body text-success">
                            <div class="tampilkanTransaksiDetail">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama Menu</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Subtotal</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-info">
                            <table width="100%">
                                <tr>
                                    <td>
                                        Total Keseluruhan
                                    </td>
                                    <td style="float: right;">
                                        <input type="text" name="totalTransaksi" id="totalTransaksi" class="form-control form-control-sm text-right" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Total Bayar
                                    </td>
                                    <td style="float: right;">
                                        <input type="text" name="totalBayar" id="totalBayar" class="form-control form-control-sm money angkaSemua text-right">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Total Kembali
                                    </td>
                                    <td style="float: right;">
                                        <input type="text" name="totalKembali" class="form-control form-control-sm text-right" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="float: right;"><a class="btn btn-info btn-sm text-white mt-1 bayarlah" id="transaksiBayar"><i class="fas fa-dollar-sign"></i> Bayar</a></td>
                                </tr>
                            </table>
                            <div class="flx kasir" style="justify-content:left"></div>
                            <div class="flx waktu" style="justify-content:left"></div>
                            <div class="flx trm" style="justify-content:center"></div>
                        </div>
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
    $(document).ready(function(){
        $(document).on("change", "#id_menu", function(){
            var id_menu = $(this).val();
            $.ajax({
                method:"POST",
                data:{id_menu:id_menu},
                url:'transaksi-cari-ajax.php',
                cache:false,
                success:function(result){
                    $('[name="harga"]').val(result);
                }
            });
        });

        $(document).on("click", "#transaksiSimpan", function(){
            var idHarga = $('[name="harga"]').val();
            var idQty = $('[name="qty"]').val();
            var idMeja = $('[name="no_meja"]').val();
            if(idHarga == "0" || idHarga == ""){
                alert("Menu Belum Dipilih !");
                $('[name="id_menu"]').focus();
            } else if(idQty == ""){
                alert("Qty belum diisi!");
                $('[name="qty"]').focus();
            } else if(idMeja == ""){
                alert("No Meja belum diisi!");
                $('[name="idMeja"]').focus();
            }
            else{
                if(confirm('Data akan disimpan?')){
                    var data = $("#transaksiMenu").serialize();
                    $.ajax({
                        method:"POST",
                        data:data,
                        url:"transaksi-simpan-ajax.php",
                        cache:false,
                        success:function(result){
                            var row = JSON.parse(result);
                            var noTransaksi = row.no_transaksi;
                            var numb = row.total_transaksi;
                            const format = numb.toString().split('').reverse().join('');
                            const convert = format.match(/\d{1,3}/g);
                            const totalTransaksi = convert.join(",").split("").reverse().join("");
                            $("#noTransaksiBaru").text(noTransaksi);
                            $("#no_transaksi").val(noTransaksi);
                            $("#totalTransaksi").val(totalTransaksi);
                            $("#id_menu").val("");
                            $("#id_menu").trigger("chosen:updated");
                            $("[name='harga']").val("0");
                            $("#qty").val('');
                            $("[name='no_meja']").attr('readonly', true);
                            $("[name='tgl_transaksi']").attr('readonly', true);

                            $('.tampilkanTransaksiDetail').load("transaksi-detail.php", {noTransaksi:noTransaksi});
                        }
                    });
                }
                else
                {
                    preventDefault();
                }
            }
        });

        // Hapus
        $(document).on('click', '.transaksiAksi', function(){
            var id_detail = $(this).attr('id');
            $.ajax({
                method:'POST',
                data:{id_detail:id_detail},
                url:'transaksi-delete-ajax.php',
                cache:false,
                success:function(noTrans){
                    if(noTrans == 0){
                        $('#noTransaksiBaru').text('');
                        $('#no_transaksi').val('');
                        $('#totalTransaksi').val('');
                        $('#ttlTransaksi').val('');
                        $('#id_menu').val('');
                        $('#id_menu').trigger("chosen:upload");
                        $('[name="harga"]').val('0');
                        $('#qty').val('');
                        $('#idMeja').val('');
                        $('[name="totalKembali"]').val('');
                        $('#totalBayar').val('');
                        $('[name="no_meja"]').attr('readonly', false);
                        $('[name="tgl_transaksi"]').attr('readonly', false);
                    }else{
                        var noTransaksi = noTrans.substring(0, 17);
                        var ttl = noTrans.length;
                        var numb = noTrans.substring(ttl, 17);

                        const format = numb.toString().split('').reverse().join('');
                        const convert =  format.match(/\d{1,3}/g);
                        const ttlTransaksi = convert.join(',').split('').reverse().join('');

                        $('#totalTransaksi').val(ttlTransaksi);
                        $('.tampilkanTransaksiDetail').load('transaksi-detail.php', {noTransaksi:noTransaksi});
                    }
                    
                }
            });
        });

        // Bayar
        $(document).on('click', '#transaksiBayar', function(){
            var c = confirm("Cetak Struk ?");
            var noTransaksi = $('#noTransaksiBaru').text();
            var totalTransaksi = $('#totalTransaksi').val();
            var ttlTransaksi = totalTransaksi.replace(",","");
            var totalBayar = $('[name="totalBayar"]').val();
            var totalKembali = $('[name="totalKembali"]').val();
            //alert(totalBayar);
            var ttlBayar = totalBayar.replaceAll(",","");

            if(c){
                document.getElementsByClassName("Showdisplay")[0].style = "display:none";
                let detail = document.getElementsByClassName("col-8 detaild")[0].innerHTML;
                document.getElementsByClassName("printableArea")[0].innerHTML = "<center><div class='col-8 detaild'>"+detail+"</div></center>";
                document.getElementsByName("totalTransaksi")[1].value = totalTransaksi;
                document.getElementsByName("totalBayar")[1].value = totalBayar;
                document.getElementsByName("totalKembali")[1].value = totalKembali;
                let table = document.getElementsByTagName("table")[2];
                let row = table.rows;
                var i = 5; 
                for (var j = 0; j < row.length; j++) {
                    row[j].deleteCell(i);
                }
                document.getElementsByClassName("bayarlah")[1].remove();
                document.getElementsByClassName("kasir")[1].innerHTML = "<br>Nama Kasir&nbsp: <?=strtoupper($nama_pegawai);?>";
                document.getElementsByClassName("waktu")[1].innerHTML = "Tanggal&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?= date('d M Y - H:i:s');?></span>";
                document.getElementsByClassName("title")[1].innerHTML = "<h1>CAFE EMILIA ISK</h1>";
                document.getElementsByClassName("trm")[1].innerHTML = "<br>--------------------Terima Kasih--------------------";
                window.print();
                document.getElementsByClassName("printableArea")[0].innerHTML = "";
                document.getElementsByClassName("Showdisplay")[0].style = "display:block";
            }

            if(ttlBayar != "" && parseInt(ttlBayar) >= parseInt(ttlTransaksi)){
                $.ajax({
                    method:'POST',
                    data:{noTransaksi:noTransaksi, totalBayar:totalBayar},
                    url:'transaksi-bayar-ajax.php',
                    cache:false,
                    success:function(res){
                        //alert(res);
                        var noTransaksi = "";
                        $('#noTransaksiBaru').text('');
                        $('#no_transaksi').val('');
                        $('#totalTransaksi').val('');
                        $('#id_menu').val('');
                        $('#id_menu').trigger("chosen:updated");
                        $("[name='harga']").val("0");
                        $("#qty").val('');
                        $("#idMeja").val('');
                        $("[name='no_meja']").attr('readonly', false);
                        $("[name='tgl_transaksi']").attr('readonly', false);
                        $('.tampilkanTransaksiDetail').load('transaksi-detail.php',{noTransaksi:noTransaksi});
                        $("[name='totalBayar']").val('');
                        $("[name='totalKembali']").val('');
                    }
                });
            }
        });

        // Kembali
        $(document).on('keyup', '#totalBayar', function(){
            var totalTransaksi = $('#totalTransaksi').val();
            var ttlTransaksi = totalTransaksi.replaceAll(",","");
            var totalBayar = $('#totalBayar').val();
            var ttlBayar = totalBayar.replaceAll(",","");
            var a = parseInt(ttlTransaksi)-parseInt(ttlBayar);
            const format = a.toString().split('').reverse().join('');
            const convert = format.match(/\d{1,3}/g);
            const b = convert.join(',').split('').reverse().join('');
            $('[name="totalKembali"]').val(b);
        });

    });

    $('.form-control-chosen').chosen({
        allow_single_deselect: true,
    });
</script>