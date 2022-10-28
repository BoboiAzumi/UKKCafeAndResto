<?php
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Kesalahan Login</title>
        <link rel="stylesheet" href="css/edit_web/error.css">
    </head>
    <body>
        <div class="kotak">
            <div style="margin-left:0px;margin-top:5px;font-size:22px;margin-bottom:15px;">Error</div>
            <img src="img/errorlogin.jpg" alt="Logonya Error Bang" width="200px" height="200px" style="margin-left:14px;">
            <div style="margin-left:0px;margin-top:35px;font-size:22px;margin-bottom:15px;">Username / Password salah!</div>
        </div>
    </body>
</html>

<?php
header("refresh:3;url=index.php");
?>