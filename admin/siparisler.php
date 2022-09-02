<?php include "header.php"; ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Siparişler</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Siparişler</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 
    
    <?php
	$siparis = "select s.Siparis_no,u.UrunlerID,u.UrunlerAdi,u.UrunFiyat,s.adet,r.resim,s.toplam,s.siparis_durum,uye.ad,uye.soyad from urunler u INNER JOIN siparis s ON u.UrunlerID = s.urun_id INNER JOIN resimler r ON r.urun_id = s.urun_id INNER JOIN uyeler uye ON s.uye_id = uye.no group by s.Siparis_no";
    $stat = $baglan->prepare($siparis);
   	$stat->bind_result($siparisno,$urunid,$urunad,$urunfiyat,$sepetadet,$resim,$toplam,$durum,$ad,$soyad);
    $stat->execute();
    ?>
   <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
             
            
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Ürün Resim</th>
                    <th>Ürün Adı</th>
                                    <th>Birim Fiyat</th>
                                    <th>Adet</th>
                                    <th>Toplam</th>
                                    <th>Ad Soyad</th>
                                    <th>Sipariş Durumu</th>
                   
                     
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                      while($stat->fetch())
                      {
                      ?>
                      <tr>
                          <td><img width="50" height="50" src="../img/product/<?=$resim?>" alt=""></td>
                          <td><?=$urunad?></td>
                          <td><?=$urunfiyat?></td>
                          <td><?=$sepetadet?></td>
                          <td><?=$toplam?></td>
                          <td><?php
                          echo $ad." ".$soyad;
                          ?></td>
                          <td>
                             <?php
                             if($durum == 0)
                                echo '<a class="btn btn-warning" href="siparisonay.php?siparis_id='.$siparisno.'">Onayla</a>';
                                if($durum == 1)
                                echo '<a class="btn btn-info" href="siparisonay.php?siparis_id='.$siparisno.'">Paketle</a>';
                                if($durum == 2)
                                echo '<a class="btn btn-danger" href="siparisonay.php?siparis_id='.$siparisno.'">Kargoya Ver</a>';
                                if($durum == 3)
                                echo '<a class="btn btn-secondary" href="siparisonay.php?siparis_id='.$siparisno.'">Teslim Et</a>';
                                if($durum == 4)
                                echo '<a class="btn btn-success">Teslim Edildi</a>';
                                
                             ?>
                              </td>
                      </tr>
                      <?php
                      }
                      ?>
   
     </tbody>
                  
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
  
   
  </div>
  <?php include "footer.php"; ?>
  
  