<?php
$urunNo = $_GET["urun_id"] ?? NULL;
if(!$urunNo)
{
    header("Location:urunlistele.php");
    exit();
}
include "../baglanti.php";
$id = $baglan->real_escape_string($_GET["urun_id"]);
$urunsil = "delete from urunler where UrunlerID='$id'";
$stat = $baglan->prepare($urunsil);
$stat->execute();
header("Location:urunlistele.php");

?>