<?php
session_start();
include("baglanti.php");
$adi = $_POST["adi"];
$soyadi = $_POST["soyadi"];
$email = $_POST["email"];
$kuladi = $_POST["kuladi"];
$sifre = $_POST["sifre"];

$il = $_POST["il"];
$ilce = $_POST["ilce"];
$tarih = date('d/m/Y H:i:s');

$uyekontrol = "select kullaniciadi from uyeler where kullaniciadi='$kuladi'";
$uye = $baglan->prepare($uyekontrol);
$uye->bind_result($kulad);
$uye->execute();
while($uye->fetch())
{
    echo '<script>alert("Kullanıcı adı alınmış.")</script>';
    die();
    
}

$uyeol= "insert into uyeler(ad,soyad,kullaniciadi,sifre,email,ilceID,sehirID,kayit_Tarihi) values('$adi','$soyadi','$kuladi','$sifre','$email','$ilce','$il','$tarih')";
$stat = $baglan->prepare($uyeol);
$stat->execute();




?>