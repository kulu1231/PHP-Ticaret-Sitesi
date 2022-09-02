<?php
session_start();
include "baglanti.php";
$sepetid=$_SESSION["id"];
$sepetsil = "delete from sepet where UyeID='$sepetid'";
$stat = $baglan->prepare($sepetsil);
$stat->execute();
header("Location:siparislerim.php");
?>