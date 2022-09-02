<?php
error_reporting(0);
session_start();
ob_start();
include "../baglanti.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Yönetim Paneli | Giriş Yap</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>TREND</b>K</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
     

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Kullanıcı Adı" name="kuladi">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Şifre" name="sifre">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="parolasifirla.php">Parolamı Unuttum</a>
      </p>
      <p class="mb-0">
        <a href="kayitol.php" class="text-center">Yeni Kayıt</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<?php
if($_SERVER["REQUEST_METHOD"]==='POST')
{
$kuladi = $_POST["kuladi"];
$sifre = $_POST["sifre"];
$giris = "select kuladi,sifre from admin where kuladi='$kuladi' and sifre='$sifre'";
$stat = $baglan->prepare($giris);
$stat->bind_result($kadi,$sif);
$stat->execute();
$stat->fetch();

if($kadi == $kuladi && $sif == $sifre)
{
    $_SESSION["admin"] = true;
    header("Location:index.php");
    exit();
}
else
    {
        echo '<p class="mb-0">
        <a style="color:red;font-weight:bold" class="text-center">Kullanıcı adı veya şifre yanlış</a>
      </p>';
    }
}
?>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
