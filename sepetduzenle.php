<?php
session_start();
ob_start();
include "baglanti.php";

    $adet = $_POST["adet"] + 1;
     $sepetid = $_POST["sepetid"];
    $urunid = $_POST["urunid"];
   
    $sepetguncel = "update sepet set Adet='$adet' where UrunID = '$urunid' and UyeID = '$sepetid' ";
    $stat = $baglan->prepare($sepetguncel);
    $stat->execute();
    
    header("Location:sepetim.php");





?>