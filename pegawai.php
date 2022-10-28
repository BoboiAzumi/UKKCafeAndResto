<?php
$judul = "MASTER PEGAWAI";
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
<div class="jumbotron col-9">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Rekapitulasi Master Pegawai</h2>
                <hr>
                <button type="button" class="btn btn-success p-2 mb-3" data-toggle="modal" data-target="#staticBackdrop">
                    <i class="fas fa-plus"></i>Tambah
                </button>
                <?php konfirmasi();?>
                <table class="table table-bordered table-hover table-responsive" id="pegawai">
                    <thead>
                        <tr class="text-center bg-secondary text-light">
                            <th>No.</th>
                            <th>Nama Pegawai</th>
                            <th>Photo</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Telp</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $sql = "SELECT * FROM tbl_pegawai";
                        $query = mysqli_query($koneksi, $sql);
                        while($data = mysqli_fetch_array($query)){
                            $photo = $data["photo"];
                            $jenis_kelamin = $data["jenis_kelamin"];
                            if($photo == "" && $jenis_kelamin == "Laki-laki"){
                                $photo = "male.png";
                            }
                            else if($photo == "" && $jenis_kelamin == "Perempuan"){
                                $photo = "female.png";
                            }
                        ?>
                        <tr>
                            <td align="center" width="5%"><?=$no++;?>.</td>
                            <td><?=$data["nama_pegawai"];?></td>
                            <td align="center"><img src="photo/<?=$photo;?>" alt="photo" width="40" height="40"></td>
                            <td><?=$data["jenis_kelamin"];?></td>
                            <td><?=$data["alamat"];?></td>
                            <td><?=$data["telp"];?></td>
                            <td><?=$data["jabatan"];?></td>
                            <td width="18%"><a href="pegawai-edit.php?id_pegawai=<?=$data["id_pegawai"];?>" class="badge badge-primary p-2" title="Edit"><i class="fas fa-edit"></i></a> | <a href="pegawai-delete.php?id_pegawai=<?=$data["id_pegawai"];?>" onclick="return confirm('Data akan dihapus ?');" class="badge badge-danger p-2" title="Delete"><i class="fas fa-trash"></i></a></td>
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

<!-- Modal Tambah -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">
                    Input Master Pegawai
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="pegawai-simpan.php" method="post" enctype="multipart/form-data">
                    <div class="input-group input-group-sm mb-1">
                        <span class="input-group-text lebar">Nama Pegawai</span>
                        <input type="text" name="nama_pegawai" required autocomplete="off" class="form-control" placeholder="Input Nama Pegawai">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text lebar">Jenis Kelamin</span>
                        <select name="jenis_kelamin" class="form-control form-control-sm" required>
                            <option value="" selected>~ Pilih Jenis Kelamin ~</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="input-group input-group-sm mb-1">
                        <span class="input-group-text lebar">Alamat</span>
                        <textarea name="alamat" id="" cols="30" rows="2" class="form-control"></textarea>
                    </div>
                    <div class="input-group input-group-sm mb-1">
                        <span class="input-group-text lebar">No Telp / HB</span>
                        <input type="text" name="telp" required autocomplete="off" class="form-control form-control-sm" placeholder="Input No Telp / HP">
                    </div>

                    <!-- Jabatan -->
                    <div class="input-group mb-1">
                        <span class="input-group-text lebar">Jabatan</span>
                        <select name="jabatan" class="form-control form-control-sm" required>
                            <option value="" selected>~ Pilih Jabatan ~</option>
                            <option value="Admin">Admin</option>
                            <option value="Kasir">Kasir</option>
                            <option value="Manajer">Manajer</option>
                        </select>
                    </div>

                    <!-- Photo -->
                    <div class="input-group mb-1">
                        <span class="input-group-text lebar">Photo</span>
                        <input type="file" name="photo" class="form-control form-control-sm" accept="image/*">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary btn-sm"><i class="fas fa-save"></i>&nbspSimpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#pegawai").dataTable({
            "drawCallback":function(){
                $('.paginate_button').addClass('btn btn-sm btn-light');
            }
        });
    });
</script>