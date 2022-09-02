<?php
error_reporting(0);

?>
 <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="index.php"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
		<?php
							$sid = $_SESSION["id"];
							$sepetsay = "select count(uyeID) from sepet where uyeID='$sid'";
							$stat = $baglan->prepare($sepetsay);
							$stat->bind_result($adet);
							$stat->execute();
							while($stat->fetch())
							{
							
							
							
							?>
            <ul>
               
							<li><a href="sepetim.php"><i class="fa-solid fa-bag-shopping"></i> <span><?php echo $adet;}?></span></a></li>
            </ul>
            <?php
									$sepetid = $_SESSION["id"];
                                     $sepetgetir = "select u.UrunlerID,u.UrunlerAdi,u.UrunFiyat,s.Adet from urunler u INNER JOIN sepet s ON u.UrunlerID = s.UrunID where s.UyeID = '$sepetid'";
									$sepet = $baglan->prepare($sepetgetir);
									$sepet->bind_result($urunid,$urunad,$urunfiyat,$sepetadet);
									$sepet->execute();
									$toplam = 0;
									$sepettoplam = 0;
									while($sepet->fetch())
									{
										$toplam = $urunfiyat * $sepetadet;
										$sepettoplam+=$toplam;
										
									}
									echo '<div class="header__cart__price">Toplam: <span>'.number_format($sepettoplam,2,',','.').' &#8378;</span></div>';
									?>
        </div>
        <div class="humberger__menu__widget">
            
            <div class="header__top__right__auth">
			<?php
								$adsoyad="";
								$kid = $_SESSION["id"];
								$kullanici = "select no,ad,soyad from uyeler where no='$kid'";
								$kul = $baglan->prepare($kullanici);
								$kul->bind_result($no,$ad,$soyad);
								$kul->execute();
								while($kul->fetch())
								{
									$adsoyad=$ad." ".$soyad;
								}
								
								
								
								if(isset($_SESSION["oturum"]))
								{
								    echo '<a href="siparislerim.php"><i class="fas fa-shopping-cart"></i> Siparişlerim</a>';
									echo '<a href="hesabim.php?uye_id='.$no.'"><i class="fa-solid fa-id-badge"></i>'.$adsoyad.'</a>';
										echo '<a href="uyecikis.php"><i class="fa-solid fa-power-off"></i>Çıkış Yap</a>';
									
								}
									
								
								else
								{
									echo '<a href="uyegiris.php"><i class="fa-solid fa-right-to-bracket"></i> Giriş Yap</a>';
									echo '<a href="uyeol.php"><i class="fa-solid fa-user-plus"></i> Kayıt Ol</a>';
									
								}
									
								
								?>
                
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                            <?php
							$menu = "select MenuAd,MenuLink from menu";
							$menustat = $baglan->prepare($menu);
							$menustat->bind_result($menuad,$link);
							$menustat->execute();
							while($menustat->fetch())
							{
								echo '<li><a href="'.$link.'.php">'.$menuad.'</a></li>';
							}
							
							?>
                           
                        </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <?php
            if(isset($_SESSION["id"]))
            {
               
            }
            else
            {
                echo ' <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>';
            }
            
            ?>
           
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> kamil.kulu58@gmail.com</li>
                
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                <li><i class="fa fa-envelope"></i> kamil.kulu58@gmail.com</li>
                
            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <?php
            if(isset($_SESSION["id"]))
            {
                echo '<a href="siparislerim.php"><i class="fas fa-shopping-cart"></i> Siparişlerim</a>';
            }
            else
            {
                echo ' <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>';
            }
            
            ?>
                            </div>
                            
                            <div class="header__top__right__social">
                               <?php
								$adsoyad="";
								$kid = $_SESSION["id"];
								$kullanici = "select no,ad,soyad from uyeler where no='$kid'";
								$kul = $baglan->prepare($kullanici);
								$kul->bind_result($no,$ad,$soyad);
								$kul->execute();
								while($kul->fetch())
								{
									$adsoyad=$ad." ".$soyad;
								}
								
								
								
								if(!isset($_SESSION["oturum"]))
								{
									
									echo '<a href="uyegiris.php"><i class="fa-solid fa-right-to-bracket"></i>   Giriş Yap</a>';
								echo '<a href="uyeol.php"><i class="fa-solid fa-user-plus"></i> Kayıt Ol</a>';
									
								}
									
								
								else
								{
									
									echo '<a href="hesabim.php?uye_id='.$no.'"><i class="fa-solid fa-id-badge"></i> '.$adsoyad.'</a>';
								
									
								
								?>
								
                            </div>
							 <div class="header__top__right__auth">
							 <a href="uyecikis.php"><i class="fa-solid fa-power-off"></i>Çıkış Yap</a>
							 <?php
								
							 
								}
							 ?>
							 </div>
							
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <?php
							$menu = "select MenuAd,MenuLink from menu";
							$menustat = $baglan->prepare($menu);
							$menustat->bind_result($menuad,$link);
							$menustat->execute();
							while($menustat->fetch())
							{
								echo '<li><a href="'.$link.'.php">'.$menuad.'</a></li>';
							}
							
							?>
                           
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
					<?php
							$sid = $_SESSION["id"];
							$sepetsay = "select count(uyeID) from sepet where uyeID='$sid'";
							$stat = $baglan->prepare($sepetsay);
							$stat->bind_result($adet);
							$stat->execute();
							while($stat->fetch())
							{
							
							
							
							?>
                        <ul>
                           
                            <li><a href="sepetim.php"><i class="fa-solid fa-bag-shopping"></i> <span><?php echo  $adet; }?></span></a></li>
                        </ul>
					<?php
									$sepetid = $_SESSION["id"];
                                    $sepetgetir = "select u.UrunlerID,u.UrunlerAdi,u.UrunFiyat,s.Adet from urunler u INNER JOIN sepet s ON u.UrunlerID = s.UrunID where s.UyeID = '$sepetid'";
									$sepet = $baglan->prepare($sepetgetir);
									$sepet->bind_result($urunid,$urunad,$urunfiyat,$sepetadet);
									$sepet->execute();
									$toplam = 0;
									$sepettoplam = 0;
									while($sepet->fetch())
									{
										$toplam = $urunfiyat * $sepetadet;
										$sepettoplam+=$toplam;
										
									}
									echo '<div class="header__cart__price">Toplam: <span>'.number_format($sepettoplam,2,',','.').' &#8378;</span></div>';
									?>
                        
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->