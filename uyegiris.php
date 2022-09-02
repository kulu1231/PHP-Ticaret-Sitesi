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
	
	<!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Giriş Yap</h2>
                    </div>
                </div>
            </div>
			
            <form method="post" action="uyegirisKontrol.php">
			
			
			 <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <div class="col-lg-12  text-center">
                        <input type="text" placeholder="Kullanıcı Adı" name="kuladi" required>
                    </div>
					
				
				
                    <div class="col-lg-12 text-center">
                        <input type="password" placeholder="Şifre" name="sifre" required>
                    </div>
					
					
					
                    <div class="col-lg-12 col-md-6">
                        <button type="submit" class="site-btn">Giriş Yap</button>
                    </div>
                    <br>
                     <div class="col-lg-12">
                        <a class="btn btn-primary" href="uyeol.php">Kayıt Ol</a>
                    </div>

<br>                    
			</div>
            <div class="col-lg-4"></div>
					
            </form>
			
        </div>
    </div>
    <!-- Contact Form End -->

	
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