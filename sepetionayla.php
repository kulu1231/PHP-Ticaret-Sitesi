<?php
session_start();
ob_start();
include "baglanti.php";
error_reporting(0);



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
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" crossorigin="anonymous"></script>
    
</head>
	<script>
	   $(document).ready(function(){
	     $('select').niceSelect('destroy');
	      $('#il').change(function(){
	          
	         var il = $(this).val();
	         $.ajax({
	             type:"POST",
	             url:"ilcefiltrele.php",
	             data:{"il":il},
	             success:function(e)
	             {
	                 $(".ilce").html(e);
	                
	             }
	        
	             
	             
	              });
	      });
	   });
	</script>
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
    <!-- Hero Section End -->

   <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Sipariş</h2>
                        <div class="breadcrumb__option">
                            <a href="index.php">Anasayfa </a>
                            <span>Sipariş</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
               
            </div>
            <div class="checkout__form">
                <h4>Sipariş Detayları</h4>
                <form id="form1" action="siparis.php" method="post">
                    <div class="row">
                         <div class="col-lg-8 col-md-6">
                        <?php
                        $sepetid = $_SESSION["id"];
                        $adresgetir = "select * from adres where uye_id='$sepetid'";
                        $stat=$baglan->prepare($adresgetir);
                        $stat->bind_result($adresid,$baslik,$cadde,$sokak,$mahalle,$binano,$kat,$ilce,$il,$postakodu,$uyeid);
                        $stat->execute();
                        $stat->store_result();
                        	if($stat->num_rows() > 0)
									{
                        echo '<div class="checkout__input">';
                        echo ' <p>Adresler</p>';
                        echo '<select name="adres" style="width: 100%;height: 50px;font-size: 16px;color: #6f6f6f;padding-left: 20px;margin-bottom: 30px;border: 1px solid #ebebeb;border-radius: 4px;">';
                        
                        while($stat->fetch())
                        {
                           
                          echo '<option class="option" value="'.$adresid.'">'.$baslik.'</option>';
                       
                        }
									
                       echo ' </select>';
                        echo '</div>';
									}
                        ?>
                       
                             <div class="checkout__input">
                                <p>Adres Başlığı<span>*</span></p>
                                <input type="text" name="baslik">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Adı<span>*</span></p>
                                        <input style="font-weight:bold" type="text" name="ad" value="<?=$_SESSION["ad"]?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Soyadı<span>*</span></p>
                                        <input  style="font-weight:bold" type="text" name="soyad" value="<?=$_SESSION["soyad"]?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Cadde<span>*</span></p>
                                <input type="text" name="cadde">
                            </div>
                            <div class="checkout__input">
                                <p>Sokak<span>*</span></p>
                                <input type="text" name="sokak">
                               
                            </div>
                            <div class="checkout__input">
                                <p>Mahalle<span>*</span></p>
                                <input type="text" name="mahalle">
                            </div>
                            <div class="checkout__input">
                                <p>Bina No<span>*</span></p>
                                <input type="text" name="binano">
                            </div>
                            <div class="checkout__input">
                                <p>Kat<span>*</span></p>
                                <input type="text" name="kat">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                     <select name="il" id="il" style="width: 100%;height: 50px;font-size: 16px;color: #6f6f6f;padding-left: 20px;margin-bottom: 30px;border: 1px solid #ebebeb;border-radius: 4px;">
                            <?php
                            $sehirler = "select * from iller";
                            $stat=$baglan->prepare($sehirler);
                            $stat->bind_result($sehirid,$sehiradi);
                            $stat->execute();
                            
                            while($stat->fetch())
                            {
                                echo '<option value='.$sehirid.'>'.$sehiradi.'</option>';
                            }
                            
                            
                            
                            ?>
                        </select>
                                </div>
                                <div class="col-lg-6">
                                     <select name="ilce" id="ilce" class="ilce" style="width: 100%;height: 50px;font-size: 16px;color: #6f6f6f;padding-left: 20px;margin-bottom: 30px;border: 1px solid #ebebeb;border-radius: 4px;">
                          <option class="option">İlçe Seçiniz</option>
                         
                        </select>
                                </div>
                            </div>
                            
                            <div class="checkout__input">
                                <p>Posta Kodu<span>*</span></p>
                                <input type="text" name="postakodu">
                            </div>
                            <div class="checkout__input">
                               
                                <input type="button" class="btn btn-primary" onclick="adresaa()"  value="Adres Ekle">
                            </div>
                           
                            
                           
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Sepetin</h4>
                                <div class="checkout__order__products">Ürünler <span>Toplam</span></div>
                                <ul>
                                    <?php
                                    include "baglanti.php";
                                    $sepetid = $_SESSION["id"];
                                    $sepetgetir = "select u.UrunlerID,u.UrunlerAdi,u.UrunFiyat,s.Adet from urunler u INNER JOIN sepet s ON u.UrunlerID = s.UrunID INNER JOIN resimler r ON r.urun_id = s.urunID where s.UyeID = '$sepetid' group by r.urun_id";
									$sepet = $baglan->prepare($sepetgetir);
									$sepet->bind_result($urunid,$urunad,$urunfiyat,$sepetadet);
									$sepet->execute();
									$toplam = 0;
									$sepettoplam = 0;
									$sepet->store_result();
								    
									if($sepet->num_rows() > 0)
									{
									    	while($sepet->fetch())
									{
									    $toplam = $urunfiyat * $sepetadet;
										$sepettoplam += $toplam;
									    echo ' <li>'.substr($urunad,0,25).'...<span>'.number_format($toplam,2,',','.').' &#8378;</span></li>';
									   
									   $sql = "INSERT INTO siparis (uye_id,urun_id, adet,toplam) VALUES ('$sepetid','$urunid','$sepetadet','$toplam');";
									   $ekle = $baglan->prepare($sql);
									   $ekle->execute();
									   
									    
                                        
									}
									}
                                    ?>
                                   
                                  
                                </ul>
                                <div class="checkout__order__subtotal">AraToplam <span><?=number_format($sepettoplam,2,',','.')?> &#8378;</span></div>
                                <div class="checkout__order__total">Toplam <span><?=number_format($sepettoplam,2,',','.')?> &#8378;</span></div>
                                
                                
                             

                               
                                <button type="submit" class="site-btn">Siparişi Bitir</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

<script>
    function adresaa()
    {
         $.ajax({
	             type:"POST",
	             url:"adresekle.php",
	             data:$('#form1').serialize(),
	             success:function(e)
	             {
	                
	                
	             }
	        
	             
	             
	              });
    }
</script>




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