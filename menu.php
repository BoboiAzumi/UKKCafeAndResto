<?php
$judul = "MASTER MENU";
include "header.php";
include "koneksi.php";
include "konfirmasi.php";
if($jabatan != "Manajer"){
    ?>
        <script>
            location.href = "accessdenied.php";
        </script>
    <?php
}
?>

<div class="col-9">
    <div class="jumbotron container">
        <div class="row">
            <div class="col">
                <h2>Master Menu</h2>
                <hr>
                <button type="button" class="btn btn-primary p-2 mb-3" data-toggle="modal" data-target="#staticBackdrop">
                    <i class="fas fa-plus"></i>Tambah
                </button>
            <?php konfirmasi();?>
            <table class="table table-bordered table-hover table-responsive" id="kelas">
                <thead>
                    <tr class="text-center bg-secondary text-light">
                        <th>No.</th>
                        <th>Nama Menu</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = "SELECT * FROM tbl_menu";    
                    $query = mysqli_query($koneksi, $sql);
                    while($data = mysqli_fetch_array($query)){?>
                    <tr>
                        <td align="center" width="5%"><?= $no++;?>.</td>
                        <td><?=$data["nama_menu"];?></td>
                        <td><?=$data["jenis_menu"];?></td>
                        <td align="right"><?=number_format($data["harga"]);?></td>
                        <td align="center" width="25%"><a href="menu-edit.php?id_menu=<?=$data["id_menu"];?>" class="badge badge-primary p-2" title="Edit" class="badge badge-primary p-2" title="Edit"><i class="fas fa-edit"></i></a> | <a href="menu-delete.php?id_menu=<?=$data["id_menu"];?>" onclick="return confirm('data akan dihapus ?');" class="badge badge-danger p-2" title="Delete"><i class="fas fa-trash"></i></a></td>
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

<!-- Modal Tambah -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel1">
                    Input Master Menu
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span arie-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="menu-simpan.php" method="post">
                    <div class="input-group mb-1">
                        <span class="input-group-text lebar">Nama Menu</span>
                        <input type="text" name="nama_menu" required autocomplete="off" class="form-control form-control-sm" placeholder="Input Nama Menu">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text lebar">Jenis Menu</span>
                        <select name="jenis_menu" class="form-control form-control-sm" required>
                            <option value="" selected>~ Pilih Jenis Menu ~</option>
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                            <option value="Paket 1">Paket 1</option>
                            <option value="Paket 2">Paket 2</option>
                            <option value="Paket 3">Paket 3</option>
                        </select>
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text lebar">Harga</span>
                        <input type="text" name="harga" required autocomplete="off" class="form-control form-control-sm text-right money angkaSemua" placeholder="Input Harga">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>&nbspSimpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#kelas").dataTable({
            "drawCallback":function(){
                $('.paginate_button').addClass('btn btn-sm btn-light');
            }
        });
    })
</script>