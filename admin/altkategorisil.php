<?php
$katno = $_GET["kat_id"] ?? NULL;
if(!$katno)
{
    header("Location:altkategoriler.php");
    exit();
}
include "../baglanti.php";
$id = $baglan->real_escape_string($_GET["kat_id"]);
$urunsil = "delete from altkategoriler where altKATID='$id'";
$stat = $baglan->prepare($urunsil);
$stat->execute();
header("Location:altkategoriler.php");

?>