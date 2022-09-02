<?php
include "../baglanti.php";
 $no = $_GET["no"];
                 $markadi = $_POST["markadi"];
              
                $katid = $_POST["kat"];
                
                
                $urunguncelle= "update markalar set kat_id='$katid', marka_adi='$markadi' where marka_id = '$no'";
                $stat = $baglan->prepare($urunguncelle);
                $stat->execute();
                $stat->close();
               header("Location:markalar.php");

?>