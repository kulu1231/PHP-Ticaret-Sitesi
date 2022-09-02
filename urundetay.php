<?php
session_start();
include "baglanti.php";

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anasayfa</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a09b300764.js" crossorigin="anonymous"></script>
<link rel="shortcut icon" href="img/icon.png">
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
	
	<?php
	include "header.php";
	?>
	
	 <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Tüm Kategoriler</span>
                        </div>
                        <ul>
                          <?php
						$tur = "select * from kategoriler k INNER JOIN altkategoriler ak on k.katID = ak.kat_id";
						$turstat = $baglan->prepare($tur);
						$turstat->bind_result($katid,$katad,$altkatid,$altkatadi,$fk_katid);
						$turstat->execute();
					
						while($turstat->fetch())
						{
						  
						   	echo '<li><a href="urunler.php?kat_id='.$altkatid.'">'.$altkatadi.'</a></li>';
						}
						?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form method="post" action="arama.php">
                                <div class="hero__search__categories">
                                    Tüm Kategoriler
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" name="search" placeholder="Neye ihtiyaç duydunuz?">
                                <button type="submit" class="site-btn">ARAMA</button>
                            </form>
                        </div>
                         <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+90 555 000 27 78</h5>
                                <span>7/24 Destek</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

   <section class="product-details spad">,
   <?php
		 
$id=$baglan->real_escape_string($_GET["urun_id"]);
$sql = "select * from urunler u INNER JOIN resimler r ON r.urun_id = u.UrunlerID where u.UrunlerID = '$id' ";
$stat = $baglan->prepare($sql);
$stat->execute();
$stat->bind_result($id,$ad,$fiyat,$aciklama,$renk,$indirim,$katid,$altid,$markaid,$resimid,$urunid,$resim);
$stat->fetch();
												


											?>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img width="150" height="300" class="product__details__pic__item--large"
                                src="img/product/<?php echo $resim; $stat->close(); ?>" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <?php
                            $sql2 = "select * from urunler u INNER JOIN resimler r ON r.urun_id = u.UrunlerID where u.UrunlerID = '$id'  ";
                            $stat2 = $baglan->prepare($sql2);
                            $stat2->execute();
                            $stat2->bind_result($id,$ad,$fiyat,$aciklama,$renk,$indirim,$katid,$altid,$markaid,$resimid,$urunid,$resim);
                            
                            while($stat2->fetch())
                            {
                                echo ' <img data-imgbigurl="img/product/'.$resim.'"
                                src="img/product/'.$resim.'" alt="">';
                            }
                            
                            ?>
                           
                          
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $ad; ?></h3>
                        
                        <div class="product__details__price"><?php  echo number_format($fiyat,2,',','.').' &#8378'; ?></div>
                        <p><?php echo $aciklama; ?></p>
                       
                        <a href="sepetekle.php?urun_id=<?php echo $id;?>" class="primary-btn">Sepete Ekle</a>
                       
                        <ul>
                            <li><b>Renk : </b> <span ><i style="color:<?php echo $renk; ?>" class="fa-solid fa-square"></i></span></li>
                           
                            <li><b>Share on</b>
                                <div class="share">
                                    <?php
            
                echo ' <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>';
           
            ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                          <?php
                          $uruno = $_GET["urun_id"];
                          $yorumlar = "select count(*) from yorumlar where UrunID='$uruno' and Yorum_Onay=1";
                          $stat = $baglan->prepare($yorumlar);
                          $stat->bind_result($toplam);
                          $stat->execute();
                          $stat->fetch();
                          
                          ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Yorumlar <span>(<?=$toplam?>)</span></a>
                            </li>
                        </ul>
                    <?php $stat->close(); ?>
                         <?php
                         
                          
                          $yorum = "select * from yorumlar where UrunID='$uruno' and Yorum_Onay=1";
                          $stat3 = $baglan->prepare($yorum);
                          $stat3->bind_result($yorumid,$adsoyad,$icerik,$tarih,$onay,$uid);
                          $stat3->execute();
                          while($stat3->fetch())
                          {
                          
                          ?>
                            
                            <div class="tab-pane active" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6><?=$adsoyad?></h6>
                                    <p><?=$icerik?></p>
                                    <p align="right"><?=$tarih?></p>
                                </div>
                            </div>
                            <hr>
                            <?php
                            }?>
                        </div>
                    </div>
                </div>
  <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Yorum Yap</h2>
                    </div>
                </div>
            </div>
            <form method="post" action="">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <input type="text" placeholder="Ad Soyad" name="adsoyad">
                    </div>
                    
                    <div class="col-lg-12 text-center">
                        <textarea placeholder="Mesajınız" name="icerik"></textarea>
                        <button type="submit" class="site-btn">Mesajı Gönder</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
	<?php
	if($_SERVER["REQUEST_METHOD"]==='POST')
	{
	    $adsoyad = $_POST["adsoyad"];
	    $icerik = $_POST["icerik"];
	    $tarih = date('d/m/Y H:i:s');
	    $onay = 0;
	    $urunid = $_GET["urun_id"];
	    $yorumekle = "insert into yorumlar(Yorum_AdSoyad,Yorum_icerik,Yorum_tarih,Yorum_Onay,UrunID) values('$adsoyad','$icerik','$tarih','$onay','$urunid')";
	    $stat = $baglan->prepare($yorumekle);
	    $stat->execute();
	}
	
	?>
	<?php
	include "footer.php";
	?>
	 
 <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>