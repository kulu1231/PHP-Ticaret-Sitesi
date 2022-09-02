<?php
	
include("baglanti.php");	
$ad = $_POST["isim"];
$konu = $_POST["konu"];
$mail = $_POST["email"];
$telefon = $_POST["telefon"];
$mesaj = $_POST["mesaj"];
if($ad!=""&&$konu!=""&&$mail!=""&&$telefon!=""&&$mesaj!="")
{																
$ekle = "insert into iletisim(ad,konu,mail,telefon,mesaj) values('$ad','$konu','$mail','$telefon','$mesaj')";
$stat = $baglan->prepare($ekle);
$stat->execute();
header("Location:iletisim.php");
}
	
?>