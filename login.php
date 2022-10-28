<?php
$judul = "MASTER LOGIN";
include "header.php";
include "koneksi.php";
include "konfirmasi.php";
if($jabatan != "Admin"){
    ?>
        <script>
            location.href = "accessdenied.php";
        </script>
    <?php
}
?>

<div class="jumbotron col-9" style="padding-right:200px">
    <div class="container" style="margin-left:40px">
        <div class="row">
            <h2>Rekapitulasi Master Login</h2>
            <hr>
            <button type="button" class="btn btn-success p-2 mb-3" data-toggle="modal" data-target="#staticBackdrop">
                <i class="fas fa-plus"></i> Tambah 
            </button>
            <?php konfirmasi();?>
            <table class="table table-bordered table-hover table-responsive" id="login">
                <thead>
                    <tr class="text-center bg-secondary text-light">
                        <th width="5%">No.</th>
                        <th>Nama</th>
                        <th>Photo</th>
                        <th>Username</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    // $sql = "CALL pLoginTampil()";
                    $sql = "SELECT a.nama_pegawai, a.jabatan, a.photo, a.jenis_kelamin, b.id_login, b.username FROM tbl_pegawai a INNER JOIN tbl_login b ON a.id_pegawai = b.id_pegawai";
                    $query = mysqli_query($koneksi, $sql);
                    while($data = mysqli_fetch_array($query)){
                        $photo = $data["photo"];
                        $jenis_kelamin = $data["jenis_kelamin"];
                        if($photo == "" && $jenis_kelamin == "Laki-laki"){
                            $photo = "photo/male.png";
                        }
                        else if($photo == "" && $jenis_kelamin == "Perempuan"){
                            $photo = "photo/female.png";
                        }else{
                            $photo = "photo/".$photo;
                        }
                    ?>
                    <tr>
                        <td align="center" width="3%"><?=$no++;?>.</td>
                        <td><?=$data["nama_pegawai"];?></td>
                        <td align="center"><img src="<?=$photo;?>" alt="photo" width="40" height="40"></td>
                        <td><?= $data["username"];?></td>
                        <td><?= $data["jabatan"];?></td>
                        <td align="center" width="15%"><a href="login-edit.php?id_login=<?=$data['id_login'];?>" class="badge badge-primary p-2" title="Edit"><i class="fas fa-edit"></i></a> | <a href="login-delete.php?id_login=<?=$data['id_login'];?>" onclick="return confirm('Data akan dihapus ?');" class="badge badge-danger p-2" title="Delete"><i class="fas fa-trash"></i></a></td>
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
<!-- Button trigger modal -->

<!-- Modal Tambah -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Input Master Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="login-simpan.php" method="post">
                    <div class="input-group mb-1">
                        <span class="input-group-text lebar">Nama Pegawai</span>
                        <select name="id_pegawai" class="form-control-chosen form-control-sm" required>
                            <option value="" selected>~ Pilih Nama Pegawai ~</option>
                            <?php
                                include "koneksi.php";
                                $sql = "SELECT * FROM tbl_pegawai ORDER BY nama_pegawai";
                                $query = mysqli_query($koneksi, $sql);
                                while($data = mysqli_fetch_array($query)){
                                    $id_pegawai = $data["id_pegawai"];
                                    $sql1 = "SELECT id_pegawai FROM tbl_login WHERE id_pegawai = '$id_pegawai' ORDER BY id_pegawai";
                                    $query1 = mysqli_query($koneksi, $sql1);
                                    if(mysqli_num_rows($query) > 0){?>
                                        <option value=<?=$data["id_pegawai"];?>><?=$data["nama_pegawai"];?> - <?=$data["jabatan"];?></option>
                                    <?php
                                    }

                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text lebar">Username</span>
                        <input type="text" name="username" required autocomplete="off" class="form-control form-control-sm" placeholder="Input Username">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text lebar">Password</span>
                        <input type="password" name="password" required class="form-control form-control-sm" placeholder="Input Password">
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
        $("#login").dataTable({
            "drawCallback":function(){
                $('.paginate_button').addClass('btn btn-sm btn-light');
            }
        });
        $(".form-control-chosen").chosen({
            allow_single_deselect: true
        });
    });
</script>