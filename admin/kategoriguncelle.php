<?php
include "../baglanti.php";
  $no = $_POST["no"];
                 $katadi = $_POST["katad"];
              
                $katguncelle = "update kategoriler set katAdi='$katadi' where katID = '$no'";
                $stat = $baglan->prepare($katguncelle);
                $stat->execute();
                header("Location:kategori.php");
               exit();
?>