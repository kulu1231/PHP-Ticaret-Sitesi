<?php
include "../baglanti.php";
$gelenid = $_GET["yorum_id"];
$yorum = "update yorumlar set Yorum_Onay=1 where YorumID='$gelenid'";
$stat = $baglan->prepare($yorum);
$stat->execute();
header("Location:yorumlar.php");
?>