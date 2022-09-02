<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<?php include "baglanti.php"; 

?>
 <?php
                                            $fiyat = $_POST["fiyat"];
                                            
                                           
											$urunler = "select * from urunler u INNER JOIN resimler r ON r.urun_id = u.UrunlerID where u.UrunFiyat BETWEEN 0 and '$fiyat' group by r.urun_id" ;
										
											$stat=$baglan->prepare($urunler);
											$stat->bind_result($id,$ad,$fiyat,$aciklama,$renk,$indirim,$katid,$altid,$markaid,$resimid,$urunid,$resim);
											$stat->execute();
											$yenifiyat = 0;
											while($stat->fetch())
											{
											    ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/<?=$resim?>" style="background-image: url('img/product/<?=$resim?>');">
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