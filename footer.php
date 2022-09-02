    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Adres: Antakya / Hatay</li>
                            <li>Telefon: +90 555 000 2778</li>
                            <li>Email: kamil.kulu58@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Kullanışlı Linkler</h6>
                        <ul>
                            <li><a href="#">Hakkımızda</a></li>
                            <li><a href="#">İletişim</a></li>
                        </ul>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Bize Ulaş</h6>
                        <p>Emailini Bize Gönder</p>
                        <form action="#">
                            <input type="text" placeholder="Email postanı gir">
                            <button type="submit" class="site-btn">Gönder</button>
                        </form>
                        <div class="footer__widget__social">
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
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy; <script>document.write(new Date().getFullYear());</script> Bütün Hakları Saklıdır.
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->