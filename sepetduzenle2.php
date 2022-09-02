<?php
session_start();
include "baglanti.php";
$sepetid = $_POST["sepetid"];
    $urunid = $_POST["urunid"];
   
    $adet = $_POST["adet"] - 1;
    if($adet == 0)
    {
        $sepetsil = "delete from sepet where UrunID = '$urunid' and UyeID = '$sepetid' ";
         $stat = $baglan->prepare($sepetsil);
        $stat->execute();
    
        header("Location:sepetim.php");
    }
     else
     {
          $sepetguncel = "update sepet set Adet='$adet' where UrunID = '$urunid' and UyeID = '$sepetid' ";
    $stat = $baglan->prepare($sepetguncel);
    $stat->execute();
    
    header("Location:sepetim.php");
     }
   





?>