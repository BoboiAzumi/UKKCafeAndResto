<?php
function konfirmasi(){
    if(isset($_GET["hasil"])){
        $hasil = $_GET["hasil"];
        if($hasil == 1){?>
            <div class="alert alert-success">
            <i class="fas fa-check-circle"></i><strong>Data Berhasil</strong> disimpan!.
            </div>
        <?php
        } else if ($hasil == 2){?>
            <div class="alert alert-success">
            <i class="fas fa-check-circle"></i><strong>Data Berhasil</strong> diubah!.
            </div>
        <?php
        } else if ($hasil == 3){?>
            <div class="alert alert-success">
            <i class="fas fa-check-circle"></i><strong>Data Berhasil</strong> dihapus!.
            </div>
        <?php
        }
        else if ($hasil == 4){?>
            <div class="alert alert-danger">
            <i class="fas fa-times-circle"></i><strong>Data Gagal</strong> disimpan!.
            </div>
        <?php
        }
        else if ($hasil == 5){?>
            <div class="alert alert-danger">
            <i class="fas fa-times-circle"></i><strong>Data Gagal</strong> diubah!.
            </div>
        <?php
        }
        else if ($hasil == 6){?>
            <div class="alert alert-danger">
            <i class="fas fa-times-circle"></i><strong>Data Gagal</strong> dihapus!.
            </div>
        <?php
        }
        else if (str_contains($hasil, "'") || str_contains($hasil, "\"")){
            ?>
                <script>
                    location.href = "sqlinjection.php";
                </script>
            <?php
        }
        
    }
}

?>