<?php
ob_start();
session_start();
include("baglanti.php");
$uyeid = $_SESSION["id"];
if(!isset($_SESSION["oturum"]))
{
	header("Location:uyegiris.php");
	exit();
}
else
{
$id=$baglan->real_escape_string($_GET["urun_id"]);
$sql = "select UrunlerID,UrunlerAdi,UrunFiyat,UrunAciklama,UrunRenk from urunler where UrunlerID=$id";
$stat = $baglan->prepare($sql);
$stat->execute();
$stat->bind_result($id,$isim,$fiyat,$detay,$renk);
$stat->fetch();
$stat->close();
$_SESSION["isim"] = $isim;
$_SESSION["fiyat"] = $fiyat;
$_SESSION["detay"] = $detay;
$_SESSION["renk"] = $renk;





}

?>
<?php
$uyeid = $_SESSION["id"];
$isim = $_SESSION["isim"];
$fiyat = $_SESSION["fiyat"];
$detay = $_SESSION["detay"] ;
$renk = $_SESSION["renk"];
$id=$baglan->real_escape_string($_GET["urun_id"]);




?>


<?php
$sepetgetir = "select UrunID,Adet,UyeID from sepet where UyeID='$uyeid' and UrunID='$id'";
$sepetg = $baglan->prepare($sepetgetir);
$sepetg->bind_result($sid,$adet,$uid);
$sepetg->execute();

while($sepetg->fetch())
{
	echo $adet."<br>";
}
if($adet >= 1)
{



?>

<?php
$sepetguncelle = "update sepet set Adet=Adet+1 where UrunID='$sid' and UyeID='$uyeid'";
$sepetguncel=$baglan->prepare($sepetguncelle);
$sepetguncel->execute();
header("Location:sepetim.php?updated=1");
}
else
{
	

?>
<?php
$sepetekle = "insert into sepet(UrunID,UyeID,Adet) values('$id','$uyeid','1')";
$ekle = $baglan->prepare($sepetekle);
$ekle->execute();
header("Location:sepetim.php?added=1");

}



?>