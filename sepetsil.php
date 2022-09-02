<?php
session_start();
include "baglanti.php";
$id=$baglan->real_escape_string($_GET["urun_id"]);
$uyeid = $_SESSION["id"];
$sepetsil = "delete from sepet where UrunID='$id' and UyeID='$uyeid'";
$sepetsilstat = $baglan->prepare($sepetsil);
$sepetsilstat->execute();
header("Location:sepetim.php");


?>