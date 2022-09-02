<?php
$menuid = $_GET["menu_id"];
include "../baglanti.php";
$sil = "delete from menu where MenuNo = '$menuid'";
$stat = $baglan->prepare($sil);
$stat->execute();
header("Location:menuislemleri.php");
?>