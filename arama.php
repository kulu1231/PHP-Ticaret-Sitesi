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
	<script src="https://kit.fontawesome.com/a09b300764.js" crossorigin="anonymous"></script>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
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
						$tur = "select * from altkategoriler";
						$turstat = $baglan->prepare($tur);
						$turstat->bind_result($altkatid,$altkatadi,$fk_katid);
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
	<!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Arama Sonucu</h2>
                    </div>
                    
                </div>
            </div>
            <div class="row featured__filter">
			
											<?php
											$gelen = $_POST["search"];
											$urunler = "select * from urunler u INNER JOIN resimler r ON r.urun_id = u.UrunlerID where u.UrunlerAdi LIKE '%$gelen%' group by r.urun_id";
											$stat=$baglan->prepare($urunler);
											$stat->bind_result($id,$ad,$fiyat,$aciklama,$renk,$indirim,$katid,$altid,$markaid,$resimid,$urunid,$resim);
											$stat->execute();
											while($stat->fetch())
											{
																				echo '<!-- Card-->
																				 <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                                              <div class="card shadow-sm border-0 rounded">
                                                <div class="card-body p-0"><a href="urundetay.php?urun_id='.$id.'"><img src="img/product/'.$resim.'"  alt="" class="w-100 card-img-top" height="270" /></a>
                                                  <div class="p-4">
                                                    <h5 class="mb-0">'.substr($ad,0,20).'...</h5>
                                                    <p class="small text-muted">'.number_format($fiyat,2,',','.').' &#8378;</p>
                                                    <ul class="social mb-0 list-inline mt-3">
                                                      <li class="list-inline-item m-0"><a href="sepetekle.php?urun_id='.$id.'" class="social-link"><i class="fa-solid fa-cart-shopping"></i></a></li>
                                                      <li class="list-inline-item m-0"><a href="urundetay.php?urun_id='.$id.'" class="social-link"><i class="fa-solid fa-info"></i></a></li>
                                                      
                                                    </ul>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>';
											}
											
											
											?>
                
								
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

	
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