<?php
session_start();
include("baglanti.php");
$kuladi = $_POST["kuladi"];
$sifre = $_POST["sifre"];

$sql = "select no,ad,soyad,kullaniciadi,sifre from uyeler where kullaniciadi='".$kuladi."'";
$stat=$baglan->prepare($sql);
$stat->bind_result($id,$ad,$soyad,$adi,$sif);
$stat->execute();


$stat->fetch();

	if($kuladi==$adi && $sif == $sifre )
	{
		$_SESSION["oturum"] = true;
		$_SESSION["id"] = $id;
		$_SESSION["adi"] = $kuladi;
		$_SESSION["parola"] = $sifre;
		$_SESSION["ad"] = $ad;
		$_SESSION["soyad"] = $soyad;
		header("Location:index.php");
	}
	else
	{
	 echo "Kullanıcı adı veya şifreniz yanlış";
	}





?>