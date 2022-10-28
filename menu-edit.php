<?php

$judul = "EDIT MASTER MENU";
include "koneksi.php";
include "header.php";
if($jabatan != "Manajer"){
    ?>
        <script>
            location.href = "accessdenied.php";
        </script>
    <?php
}
$id_menu = $_GET["id_menu"];
if(str_contains($id_menu, "'") || str_contains($id_menu, "\"")){
    ?>
        <script>
            location.href = "sqlinjection.php";
        </script>
    <?php
}
$sql = "SELECT * FROM tbl_menu WHERE id_menu = '$id_menu'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
$jenis_menu = $data["jenis_menu"];
?>

<div class="col-6">
    <div class="container">
        <div class="jumbotron row">
            <div class="col">
                <h1>Edit Master Menu</h1>
                <form action="menu-update.php" method="post">
                    <input type="hidden" name="id_menu" value="<?=$id_menu;?>">
                    <div class="input-group mb-1">
                        <span class="input-group-text lebar">Nama Menu</span>
                        <input type="text" name="nama_menu" required autocomplete="off" class="form-control form-control-sm" placeholder="Input Nama Menu" value="<?=$data["nama_menu"];?>">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text lebar">Jenis Menu</span>
                        <select name="jenis_menu" class="form-control form-control-sm" required>
                            <option value="" selected>~ Pilih Jenis Menu ~</option>
                            <option value="Makanan" <?php if($jenis_menu == "Makanan"){echo 'selected="selected"';}?>>Makanan</option>
                            <option value="Minuman" <?php if($jenis_menu == "Minuman"){echo 'selected="selected"';}?>>Minuman</option>
                            <option value="Paket 1" <?php if($jenis_menu == "Paket 1"){echo 'selected="selected"';}?>>Paket 1</option>
                            <option value="Paket 2" <?php if($jenis_menu == "Paket 2"){echo 'selected="selected"';}?>>Paket 2</option>
                            <option value="Paket 3" <?php if($jenis_menu == "Paket 3"){echo 'selected="selected"';}?>>Paket 3</option>
                        </select>
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text lebar">Harga</span>
                        <input type="text" name="harga" required autocomplete="off" class="form-control form-control-sm text-right money angkaSemua" placeholder="Input Harga" value="<?=$data["harga"];?>">
                    </div>

                    <div class="input-group mb-1">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i>Update</button> | <a href="menu.php" class="btn btn-sm btn-warning"><i class="fas fa-redo"></i> Cancel</a>
                    </div>
                </table>
                </form>
            </div>
        </div>
    </div>
</div>
</div>