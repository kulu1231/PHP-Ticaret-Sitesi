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
<script src="https://code.jquery.com/jquery-1.12.4.min.js" crossorigin="anonymous"></script>
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
    <div class="contact-form spad">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Üye Ol</h2>
                    </div>
                </div>
            </div>
            <form>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Adı" name="adi" id="adi">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Soyadı" name="soyadi" id="soyadi">
                    </div>
				
					<div class="col-lg-6 col-md-6">
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
                    	<div class="col-lg-6 col-md-6">
                        <select name="ilce" id="ilce" class="ilce" style="width: 100%;height: 50px;font-size: 16px;color: #6f6f6f;padding-left: 20px;margin-bottom: 30px;border: 1px solid #ebebeb;border-radius: 4px;">
                          <option class="option">İlçe Seçiniz</option>
                         
                        </select>
                        
                        
                    </div>
                    	<div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="E-Mail" name="email" id="email">
                    </div>
                     <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Kullanıcı Adı" name="kuladi" id="kuladi">
                    </div>
                     <div class="col-lg-6 col-md-6">
                        <input type="password" placeholder="Şifre" name="sifre" id="sifre">
                    </div>
                     <div class="col-lg-6 col-md-6">
                        <input type="password" placeholder="Şifre Tekrar" name="sifretekrar" id="sifretekrar">
                    </div>
                    <div class="col-lg-12 text-center">
                        
                        <button type="button" id="submit" class="site-btn">Kayıt Ol</button>
                    </div>
                </div>
         </form>
        </div>
    </div>
    <script type="text/javascript">
$(document).ready(function(){   // Jquery sayfa yüklediğinde çalışmaya başlayacak kod yapısı
 
  
$("#submit").click(function(e) {  
    var adi = $("input[name=adi]").val();
  var soyadi = $("input[name=soyadi]").val();
  var email = $("input[name=email]").val();
  var kuladi = $("input[name=kuladi]").val();
  var sifre = $("input[name=sifre]").val();
  var il = $("select[name=il]").val();
  var ilce = $("select[name=ilce]").val();
 
    // Gönder butonuna tıklandığın da çalışacak event
  $.ajax({   
            url: "uyeolKontrol.php",
           type: "POST", 
           
           data: {
               'adi':adi,
               'soyadi':soyadi,
               'email':email,
               'kuladi':kuladi,
               'sifre':sifre,
               'il':il,
               'ilce':ilce
           }, //form bilgilerini veri parametrelerine dönüştürecek kod
           success: function(result)
           {
           $("input[name=adi]").val("");
           $("input[name=soyadi]").val("");
           $("input[name=email]").val("");
           $("input[name=kuladi]").val("");
           $("input[name=sifre]").val("");
           $("input[name=sifretekrar]").val("");
           
           
        
    }});
    
});
});

   
</script>
    <!-- Contact Form End -->

	
	<?php
	include "footer.php";
	?>
	 
 <!-- Js Plugins -->
    
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>