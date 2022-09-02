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
	<script src="https://code.jquery.com/jquery-1.12.4.min.js" crossorigin="anonymous"></script>
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
    <style>
        .slidecontainer {
  width: 100%;
}
.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 25px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  background: #04AA6D;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #04AA6D;
  cursor: pointer;
}
    </style>
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

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Ürünler</h2>
                        <div class="breadcrumb__option">
                            <a href="index.php">Anasayfa </a>
                            <span> Ürünler</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Kategoriler</h4>
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
                        <div class="sidebar__item">
                            <h4>Fiyat</h4>
                            
                                
                               
                                  
                                        <div class="slidecontainer">
                                            <table>
                                                <tr>
                                                    <td class="min">0</td>
                                                    <td> <input type="range" id="amount" min="1" max="1000" value="0" name="fiyat" onchange="fiyat(this.value)" class="slider"></td>
                                                    <td id="max"></td>
                                                </tr>
                                            </table>
                                    
                                       </div>
                                   
                              
                            
                        </div>
                   
                      
                     
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>İndirimdekiler</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                
												<?php
											$urunler = "select * from urunler u INNER JOIN resimler r ON r.urun_id = u.UrunlerID group by r.urun_id";
											$stat=$baglan->prepare($urunler);
											$stat->bind_result($id,$ad,$fiyat,$aciklama,$renk,$indirim,$katid,$altid,$markaid,$resimid,$urunid,$resim);
											$stat->execute();
											$yenifiyat = 0;
											while($stat->fetch())
											{
											    if($indirim>0)
											    {
											    ?>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="img/product/<?=$resim?>">
                                            <div class="product__discount__percent">-<?=$indirim?>%</div>
                                            <ul class="product__item__pic__hover">
                                               
                                                <li><a href="#"><i class="fa fa-search"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                           
                                            <h5><a href="#"><?=$ad?></a></h5>
                                            <div class="product__item__price"><?=number_format($yenifiyat=$fiyat * $indirim / 100,2,',','.')?><span><?=number_format($fiyat,2,',','.')?></span></div>
                                        </div>
                                    </div>
                                </div>
                           
                                <?php }}?>
                             
                               
                              
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sıralama</span>
                                    <select name="sirala" id="sirala">
                                        <option value="desc">Azalan</option>
                                        <option value="asc">Artan</option>
                                    </select>
                                    <script>
       
                                $(document).ready(function(){  
                                    
                                    $('#sirala').change(function(){
                                    // Jquery sayfa yüklediğinde çalışmaya başlayacak kod yapısı
                                     var sira = $(this).val();
                                    
                                  $.ajax({   
                                            url: "sepetsirala.php",
                                            type: "POST",
                                            data:{"sirala":sira},
                                           success: function(e)
                                           {
                                               $('#urunler').empty();
                                           $('#urunler').html(e);
                                        
                                    }});
                                    
                                   
                                    });
                                    
                                    
                                
                                });
                                
                                   function fiyat(deger)
                                    {
                                        document.getElementById("max").innerHTML=deger;
                                         $.ajax({   
                                            url: "sepetfiyat.php",
                                            type: "POST",
                                            data:{"fiyat":deger},
                                           success: function(e)
                                           {
                                               $('#urunler').empty();
                                           $('#urunler').html(e);
                                        
                                    }});
                                    }
                                </script>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-7">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="urunler">
                                            <?php
											$urunler = "select * from urunler u INNER JOIN resimler r ON r.urun_id = u.UrunlerID group by r.urun_id";
											$stat=$baglan->prepare($urunler);
											$stat->bind_result($id,$ad,$fiyat,$aciklama,$renk,$indirim,$katid,$altid,$markaid,$resimid,$urunid,$resim);
											$stat->execute();
											$yenifiyat = 0;
											while($stat->fetch())
											{
											    ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/<?=$resim?>" >
                                    <ul class="product__item__pic__hover">
                                        
                                        <li><a href="#"><i class="fa fa-search"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#"><?=$ad?></a></h6>
                                    <h5><?=number_format($fiyat,2,',','.')?></h5>
                                </div>
                            </div>
                        </div>
                       <?php } ?>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
   
  
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