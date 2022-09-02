<?php
session_start();
ob_start();
 include "baglanti.php";


 $sepetid = $_SESSION["id"];
 $baslik = $_POST["baslik"];
 $cadde = $_POST["cadde"];
 $sokak=$_POST["sokak"];
 $mahalle=$_POST["mahalle"];
 $binano=$_POST["binano"];
 $kat=$_POST["kat"];
 $ilce=$_POST["ilce"];
 $il=$_POST["il"];
 $postakodu=$_POST["postakodu"];
 $adres = "insert into adres(adres_baslik,Cadde,Sokak,Mahalle,BinaNo,Kat,ilce_id,il_id,posta_kodu,uye_id) values('$baslik','$cadde','$sokak','$mahalle','$binano','$kat','$ilce','$il','$postakodu','$sepetid')";
$stat = $baglan->prepare($adres);
$stat->execute();


?>