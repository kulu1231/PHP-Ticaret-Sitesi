<?php

include "../baglanti.php";
$id = $baglan->real_escape_string($_GET["uyeid"]);
$uyesil = "delete from uyeler where no='$id'";
$stat = $baglan->prepare($uyesil);
$stat->execute();
header("Location:uyelistele.php");

?>