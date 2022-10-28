<?php
$judul = "EDIT MASTER PEGAWAI";
include "header.php";
include "koneksi.php";
if($jabatan != "Manajer"){
    ?>
        <script>
            location.href = "accessdenied.php";
        </script>
    <?php
}
$id_pegawai = $_GET["id_pegawai"];
if(str_contains($id_pegawai, "'") || str_contains($id_pegawai, "\"")){
    ?>
        <script>
            location.href = "sqlinjection.php";
        </script>
    <?php
}
$sql = "SELECT * FROM tbl_pegawai WHERE id_pegawai = '$id_pegawai'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
$jenis_kelamin = $data["jenis_kelamin"];
$jabatan = $data["jabatan"];
$photo = $data["photo"];

if($photo == "" && $jenis_kelamin == "Laki-laki"){
    $photo = "male.png";
}
else if($photo == "" && $jenis_kelamin == "Perempuan"){
    $photo = "female.png";
}
?>

<div class="jumbotron col-6">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Edit Master Pegawai</h2>
                <form action="pegawai-update.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_pegawai" value="<?=$id_pegawai;?>">
                    
                    <div class="input-group input-group-sm mb-1">
                        <span class="input-group-text lebar">Nama Pegawai</span>
                        <input type="text" name="nama_pegawai" required autocomplete="off" class="form-control" placeholder="Input Nama Pegawai" value="<?=$data["nama_pegawai"];?>">
                    </div>
                    <div class="input-group input-group-sm mb-1">
                        <span class="input-group-text lebar">Jenis Kelamin</span>
                        <select name="jenis_kelamin" class="form-control form-control-sm" required>
                                <option value="Laki-laki" <?php if($jenis_kelamin == "Laki-laki"){echo 'selected="selected"';}?>>Laki-laki</option>
                                <option value="Perempuan" <?php if($jenis_kelamin == "Perempuan"){echo 'selected="selected"';}?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text lebar">Alamat</span>
                        <textarea name="alamat" id="" cols="30" rows="2" class="form-control"><?=$data["alamat"];?></textarea>
                    </div>
                    <div class="input-group input-group-sm mb-1">
                        <span class="input-group-text lebar">No Telp / HP</span>
                        <input type="text" name="telp" required autocomplete="off" class="form-control" placeholder="Input No Telp / HP" value="<?=$data["telp"];?>">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text lebar">Jabatan</span>
                        <select name="jabatan" class="form-control form-control-sm" required>
                            <option value="" selected>~ Pilih Jabatan ~</option>
                            <option value="Admin" <?php if($jabatan == "Admin"){echo 'selected="selected"';}?>>Admin</option>
                            <option value="Kasir" <?php if($jabatan == "Kasir"){echo 'selected="selected"';}?>>Kasir</option>
                            <option value="Manajer" <?php if($jabatan == "Manajer"){echo 'selected="selected"';}?>>Manajer</option>
                        </select>
                    </div>

                    <!-- Gambar -->
                    <div class="input-group mb-1">
                        <span class="input-group-text lebar">Gambar</span>
                        <img src="photo/<?=$photo;?>" alt="photo" width="200px">
                    </div>

                    <!-- Photo -->
                    <div class="input-group mb-1">
                        <span class="input-group-text lebar">Photo</span>
                        <input type="file" name="photo" class="form-control form-control-sm" accept="image/*">
                    </div>

                    <div class="input-group mb-1 input-sm">
                        <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Update </button> | <a href="pegawai.php" class="btn btn-sm btn-warning"><i class="fas fa-redo"></i> Cancel</a>
                    </div>
                </table>
            </form>
        </div>
    </div>
</div>
</div>

</div>
</div>