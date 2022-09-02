<?php
include "../baglanti.php";
 $no = $_GET["no"];
                 $urunadi = $_POST["urunadi"];
              
                $urunfiyat = $_POST["urunfiyat"];
                $urunaciklama = $_POST["urunaciklama"];
                $urunrenk = $_POST["urunrenk"];
                $indirim = $_POST["indirim"];
                $kat = $_POST["kat"];
                $altkat = $_POST["altkat"];
                $marka = $_POST["marka"];
                
                $urunguncelle= "update urunler set UrunlerAdi='$urunadi', UrunFiyat='$urunfiyat', UrunAciklama='$urunaciklama', UrunRenk='$urunrenk', indirim='$indirim', kat_id='$kat', altkategoriID='$altkat', MarkaID='$marka' where UrunlerID = '$no'";
                $stat = $baglan->prepare($urunguncelle);
                $stat->execute();
                $stat->close();
               header("Location:urunlistele.php");

?>