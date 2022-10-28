<?php
include "koneksi.php";
session_start();
if(isset($_SESSION["id_pegawai"])){
	header("location:dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>LOGIN UKK CAFE | CAFE EMILIA ISK</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Aplikasi UKK Cafe">
        <meta name="author" content="Aplikasi UKK Cafe">
        <link rel="shortcut icon" href="img/logo.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/edit_web/style_login.css">
        <link rel="stylesheet" href="css/all.min.css">
        <script src="js/fontawesome_c.js"></script>
    </head>
    <body>
        <div class="kotak">
            <form class="form-signin" action="proses.php" method="post">
                <img src="img/Emilia_Logo.png" alt="Logonya Error Bang" width="200px" height="200px" style="margin-left:14px;">
                <div style="margin-left:0px;margin-top:35px;font-size:22px;margin-bottom:15px;">Aplikasi Cafe Emilia ISK</div>
                <div class="inputgr">
                    <div class="input-group mb-o px-3">
                        <div class="input-group-text">
                            <i class="fas fa-user text-muted mis">
                            </i>
                        </div>
                        <input type="text" id="username" name="username" class="form-control form-control-sm" placeholder="Username" autocomplete="off" autofocus="on" required/>
                    </div>
                    <div class="input-group mb-1 px-3">
                        <div class="input-group-text">
                            <i class="fas fa-key text-muted">
                            </i>
                        </div>
                        <input type="password" id="password" name="password" class="form-control form-control-sm" placeholder="Password" autocomplete="off" required/>
                    </div>
                    <div class="fl">
                        <button class="btn btn-sm btn-dark" type="submit"><i class="fa fa-lock mx-2"></i>Sign in</button>
                    </div>
                </div>   
            </form>
            <h5 class="copy">Copyright &copy; <?=date('Y');?></h5>
        </div>
    </body>
</html>