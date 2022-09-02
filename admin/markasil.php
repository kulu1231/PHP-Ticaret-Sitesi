<?php
$katno = $_GET["marka_id"] ?? NULL;
if(!$katno)
{
    header("Location:markalar.php");
    exit();
}
include "../baglanti.php";
$id = $baglan->real_escape_string($_GET["marka_id"]);
$urunsil = "delete from markalar where marka_id='$id'";
$stat = $baglan->prepare($urunsil);
$stat->execute();
header("Location:markalar.php");

?>