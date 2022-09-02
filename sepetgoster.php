<?php
	session_start();
	ob_start();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<?php

	error_reporting(0);
						include "baglanti.php";
						
					
							$uye = $_SESSION["id"];
									$sepetgetir = "select u.UrunlerID,u.UrunlerAdi,u.UrunFiyat,s.Adet,r.resim from urunler u INNER JOIN sepet s ON u.UrunlerID = s.UrunID INNER JOIN resimler r ON r.urun_id = s.urunID where s.UyeID = '$uye' group by r.urun_id";
									$sepet = $baglan->prepare($sepetgetir);
									$sepet->bind_result($urunid,$urunad,$urunfiyat,$sepetadet,$resim);
									$sepet->execute();
									$toplam = 0;
									$sepettoplam = 0;
									$sepet->store_result();
									
									if($sepet->num_rows() > 0)
									{
									echo '
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Ürün</th>
                                 
                                    <th>Birim Fiyat</th>
                                    <th>Adet</th>
                                    <th>Toplam</th>
                                </tr>
                            </thead>
                            <tbody>';
									while($sepet->fetch())
									{
										$toplam = $urunfiyat * $sepetadet;
										$sepettoplam += $toplam;
										echo '<tr>
                                    <td class="shoping__cart__item">
                                        <img  width="50" height="50" src="img/product/'.$resim.'" alt="">
                                        <h5>'.$urunad.'</h5>
                                    </td>
                                   
                                    <td class="shoping__cart__price">
                                        '.number_format($urunfiyat,2,',','.').' &#8378;
                                    </td>
                                    <td class="shoping__cart__quantity">
                                  
                                       
                                           
                                              <input type="hidden" class="urunid" id="urunid" name="urunid" value="'.$urunid.'" />
                                            <input type="hidden" class="sepetid" id="sepetid" name="sepetid" value="'.$uye.'" />
                                      
                                  
                                     <table>
                                     <tr>
                                     <td><button class="btn btn-light" onclick="islem2('.$urunid.','.$uye.','.$sepetadet.')">-</button></td>
                                     <td><input class="btn btn-light" id="sepetadet" name="adet" type="button" value="'.$sepetadet.'"></td>
                                     <td><button class="btn btn-light" onclick="islem('.$urunid.','.$uye.','.$sepetadet.')">+</button></td>
                                     </tr>
                                     </table>
                                    
                                         
                                   
                                              
                                            
                                       
                                    </td>
                                    <td class="shoping__cart__total">
                                        '.number_format($toplam,2,',','.').' &#8378;
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href=sepetsil.php?urun_id='.$urunid.'><span class="icon_close"></span></a>
                                    </td>
                                </tr> ';
									}
									echo '</tbody>
                        </table>';
									
									
							echo "</div>
                </div>
            </div>
            <div class='row'>
                
                
                <div class='col-lg-6'>
                    <div class='shoping__checkout'>
                        <h5>Sepet Toplam</h5>
                        <ul>
                            <li>Ara Toplam <span>".number_format($sepettoplam,2,',','.')." &#8378;</span></li>
                            <li>Toplam <span>".number_format($sepettoplam,2,',','.')." &#8378;</span></li>
                        </ul>
                        <a href='sepetionayla.php' class='primary-btn'>Sepeti Onayla</a>
                    </div>
                </div>
									</div>";}
									else 
									{
										
									
									
							?>
                                <table>
								<tr>
								<td><i class="fa-solid fa-cart-shopping fa-10x"></i></td>
								</tr>
                                <td><b>Sepete Henüz Ürün Eklemediniz.</b></td>
                               </table>
									<?php  } ?>
								<script>
function islem(a,b,c) {
     $.ajax({   
            url: "sepetduzenle.php",
            type: "POST",
            data:{
              "urunid":a,
              "sepetid":b,
              "adet":c
            },
           
            //form bilgilerini veri parametrelerine dönüştürecek kod
           success: function(e)
           {
           
        
    }});
    
}
function islem2(a,b,c) {
     $.ajax({   
            url: "sepetduzenle2.php",
            type: "POST",
            data:{
              "urunid":a,
              "sepetid":b,
              "adet":c
            },
           
            //form bilgilerini veri parametrelerine dönüştürecek kod
           success: function(e)
           {
           
               
    }});
    
}
</script>
									  <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
  