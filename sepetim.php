<?php
session_start();
ob_start();
include "baglanti.php";
error_reporting(0);
$eklenme = $_GET["added"];
$guncellenme = $_GET["updated"];


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
    <link rel="stylesheet" href="css/bootstrap.min.css?v=1" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css?v=1" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css?v=1" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css?v=1" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css?v=1" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css?v=1" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css?v=1" type="text/css">
    <link rel="stylesheet" href="css/style.css?v=1" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                            <span>Tüm Kategoriler </span>
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
                        <h2>Sepet</h2>
                        <div class="breadcrumb__option">
                            <a href="index.php">Anasayfa </a>
                            <span>Sepet</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12">
                    <?php
                
                	if($eklenme == 1)
                                include "alert.php";
                            else if($guncellenme == 1)
                                include "alert.php";
                ?>
                    <div id="demo" class="shoping__cart__table">
					
						
                    
        </div>
        

    </section>
    <!-- Shoping Cart Section End -->
    
<script>
       
$(document).ready(function(){  
    
  
    // Jquery sayfa yüklediğinde çalışmaya başlayacak kod yapısı
    function veriCek()
    {
  $.ajax({   
            url: "sepetgoster.php",
            type: "POST",
           
            //form bilgilerini veri parametrelerine dönüştürecek kod
           success: function(e)
           {
           $('.shoping__cart__table').html(e);
        
    }});
    
    }
    setInterval(veriCek,1000);

});

   
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