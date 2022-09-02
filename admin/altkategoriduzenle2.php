<?php
include "../baglanti.php";
 $no = $_GET["no"];
                 $altadi = $_POST["altkatadi"];
              
                $katid = $_POST["kat"];
                
                
                $urunguncelle= "update altkategoriler set kat_id='$katid', altKatAdi='$altadi' where altKATID = '$no'";
                $stat = $baglan->prepare($urunguncelle);
                $stat->execute();
                $stat->close();
               header("Location:altkategoriler.php");

?>