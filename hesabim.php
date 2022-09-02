<?php
session_start();
include "baglanti.php";

?>
<?php
$kid = $_SESSION["id"];
if($_SERVER["REQUEST_METHOD"]==='GET')
{
     $uyeno = $_GET["uye_id"] ?? NULL;
if(!$uyeno)
{
    header("Location:index.php");
    exit();
}
    
$uye = "select * from uyeler INNER JOIN iller on iller.sehirID = uyeler.sehirID INNER JOIN ilceler on ilceler.ilceID = uyeler.ilceID where no='$kid'";
$stat = $baglan->prepare($uye);
$stat->bind_result($no,$ad,$soyad,$kuladi,$sifre,$email,$ilceid,$sehirid,$tarih,$sehirid,$sehiradi,$ilceid,$ilceadi,$ilid);
$stat->execute();
while($stat->fetch())
{
    
}
}
else if($_SERVER["REQUEST_METHOD"]==='POST')
{
    $adi = $_POST["adi"];
    $soyadi = $_POST["soyadi"];
    $il = $_POST["il"];
    $ilce = $_POST["ilce"];
    $maill = $_POST["email"];
    $kulad = $_POST["kuladi"];
   
    $guncelle = "update uyeler set ad='$adi', soyad='$soyadi',kullaniciadi='$kulad', email='$maill', ilceID='$ilce', sehirID='$il' where no = '$kid' ";
    $statement = $baglan->prepare($guncelle);
    $statement->execute();
    
}

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
                        <h2>Profilim</h2>
                    </div>
                </div>
            </div>
            <form method="POST" action="">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Adı" name="adi" id="adi" value="<?=$ad?>">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Soyadı" name="soyadi" id="soyadi" value="<?=$soyad?>">
                    </div>
				
					<div class="col-lg-6 col-md-6">
                        <select name="il" id="il" style="width: 100%;height: 50px;font-size: 16px;color: #6f6f6f;padding-left: 20px;margin-bottom: 30px;border: 1px solid #ebebeb;border-radius: 4px;">
                            <option value="<?=$sehirid?>"><?=$sehiradi?></option>
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
                         <option value="<?=$ilceid?>"><?=$ilceadi?></option>
                          <option class="option">İlçe Seçiniz</option>
                         
                        </select>
                        
                        
                    </div>
                    	<div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="E-Mail" name="email" id="email" value="<?=$email?>">
                    </div>
                     <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Kullanıcı Adı" name="kuladi" id="kuladi" value="<?=$kuladi?>">
                    </div>
                     
                    <div class="col-lg-12 text-center">
                        
                        <button type="submit" id="submit" class="site-btn">Güncelle</button>
                    </div>
                </div>
         </form>
        </div>
    </div>
  
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