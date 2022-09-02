<?php
$yorumno = $_GET["yorum_id"] ?? NULL;
if(!$yorumno)
{
    header("Location:yorumlar.php");
    exit();
}
include "../baglanti.php";
$id = $baglan->real_escape_string($_GET["yorum_id"]);
$yorumsil = "delete from yorumlar where YorumID='$id'";
$stat = $baglan->prepare($yorumsil);
$stat->execute();
header("Location:yorumlar.php");

?>