<?php
$judul = "MASTER PEGAWAI";
include "header.php";
include "koneksi.php";
if($jabatan == "Kasir"){
    ?>
        <script>
            location.href = "accessdenied.php";
        </script>
    <?php
}
?>

<div class="jumbotron p-3 m-0 shadow col-9">
    <div class="container">
        <div class="col">
            <h2 class="mt-4">Rekapitulasi Log Pegawai</h2>
            <hr>
            <button class="btn btn-primary mb-4" id="hapus">Hapus Log</button>
            <table class="table table-bordered table-hover table-responsive" id="log">
                <thead>
                    <tr class="text-center bg-secondary text-light">
                        <th>No.</th>
                        <th>Nama Pegawai</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = "SELECT * FROM tbl_log ORDER BY id_log DESC";
                    //$sql = "SELECT * FROM tbl_log";
                    error_reporting(0);
                    $query = mysqli_query($koneksi, $sql);
                    while($data = mysqli_fetch_array($query)){
                        $aksi = $data["aksi"];
                        $id_pegawai = $data["id_pegawai"];
                        $nama_pegawai = $data["nama_pegawai"];
                        $jabatan = $data["jabatan"];
                        
                        if($nama_pegawai == ""){
                            $sql1 = "SELECT * FROM tbl_pegawai WHERE id_pegawai = '$id_pegawai'";
                            $query1 = mysqli_query($koneksi, $sql1);
                            $data1 = mysqli_fetch_array($query1);
                            $nama_pegawai = $data1["nama_pegawai"];
                            $jabatan = $data1["jabatan"];

                            $sql2 = "UPDATE tbl_log SET nama_pegawai = '$nama_pegawai', jabatan = '$jabatan' WHERE id_pegawai = '$id_pegawai'";
                            mysqli_query($koneksi, $sql2);
                        }
                        
                    ?>

                    <tr>
                        <td align="center" width="5%"><?= $no++;?>. </td>
                        <td><?= $nama_pegawai;?></td>
                        <td><?= $jabatan;?></td>
                        <td><?= $aksi;?></td>
                        <td align="center" width="5%"><?= $data["date"];?>. </td>
                    </tr>
                    <?php
                    }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<!-- Div jangan di hapus kepunyaan Menu Accordion -->
</div>
</div>

<script>
    $(document).ready(function(){
        $("#log").dataTable({
            "drawCallback":function(){
                $('.paginate_button').addClass('btn btn-sm btn-light');
            },
            "lengthMenu":[[10,25,50,100,-1], [10,25,50,100,"ALL"]]
        });
        $("#hapus").on("click", function(){
            if(confirm("Anda yakin ingin menghapus log ?")){
                location.href = "hapus_log.php";    
            }
        });
    });
</script>