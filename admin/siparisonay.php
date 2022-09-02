<?php
include "../baglanti.php";
$no = $_GET["siparis_id"];
$siparisguncelle = "update siparis set siparis_durum=siparis_durum+1 where Siparis_no='$no'";
$stat = $baglan->prepare($siparisguncelle);
$stat->execute();
header("Location:siparisler.php");
?>