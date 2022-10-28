<?php
$judul = "EDIT MASTER LOGIN";
include "header.php";
include "koneksi.php";

$id_login = urldecode($_GET["id_login"]);
if(str_contains($id_login, "'") || str_contains($id_login, "\"")){
    ?>
        <script>
            location.href = "sqlinjection.php";
        </script>
    <?php
}

$sql = "SELECT * FROM tbl_login a INNER JOIN tbl_pegawai b ON a.id_pegawai = b.id_pegawai where a.id_login = '$id_login'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
$id_pegawai = $data["id_pegawai"];
if($jabatan != "Admin"){
    ?>
        <script>
            location.href = "accessdenied.php";
        </script>
    <?php
}

?>

<div class="jumbotron col-6">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Edit Master Login</h2>
                <form action="login-update.php" method="post">
                    <input type="hidden" name="id_login" value="<?= $id_login;?>">
                    <div class="input-group mb-1">
                        <span class="input-group-text lebar">Nama Pegawai</span>
                        <select name="id_pegawai" required class="form-control form-control-sm">
                            <?php
                            include "koneksi.php";
                            $sql = "SELECT id_pegawai, nama_pegawai, jabatan FROM tbl_pegawai ORDER BY nama_pegawai";
                            $query = mysqli_query($koneksi, $sql);
                            while($dt = mysqli_fetch_array($query)){
                                $id_peg = $dt["id_pegawai"];?>
                                <option value="<?=$id_peg;?>" <?php if($id_peg == $id_pegawai){echo 'selected="selected"';}?>><?= $dt["nama_pegawai"];?> - <?= $dt["jabatan"];?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text lebar">Username</span>
                        <input type="text" name="username" class="form-control form-control-sm" required autocomplete="off" value="<?=$data["username"];?>">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text lebar">Password</span>
                        <input type="text" name="password" class="form-control form-control-sm" required value="<?=$data["password"];?>">
                    </div>
                    <div class="input-group mb-1">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i>Update</button> | <a href="login.php" class="btn btn-sm btn-warning"><i class="fas fa-redo"></i> Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>