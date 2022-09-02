<?php
$katno = $_GET["kat_id"] ?? NULL;
if(!$katno)
{
    header("Location:kategori.php");
    exit();
}
include "../baglanti.php";
$id = $baglan->real_escape_string($_GET["kat_id"]);
$urunsil = "delete from kategoriler where katID='$id'";
$stat = $baglan->prepare($urunsil);
$stat->execute();
header("Location:kategori.php");

?>