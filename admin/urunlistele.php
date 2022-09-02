<?php include "header.php"; ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ürünler</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Ürünler</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 
    
    <?php
    $urun = "select * from urunler u INNER JOIN kategoriler k ON k.katID = u.kat_id INNER JOIN altkategoriler ak ON ak.altKATID = u.altkategoriID INNER JOIN markalar m ON m.marka_id = u.markaID";
    $stat = $baglan->prepare($urun);
    $stat->bind_result($id,$urunadi,$urunfiyat,$urunaciklama,$urunrenk,$indirim,$katid,$altid,$markaid,$katid2,$katadi,$altkatid,$altkatadi,$kid,$marid,$markadi,$kidd);
    $stat->execute();
    
    echo '<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
             
            
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Ürün Adı</th>
                   
                    <th>Fiyat</th>
                    <th>Açıklama</th>
                    <th>Renk</th>
                    <th>İndirim</th>
                    <th>Kategori</th>
                    <th>Alt Kategori</th>
                    <th>Marka</th>
                    <th></th>
                     <th></th>
                  </tr>
                  </thead>
                  <tbody>';
    while($stat->fetch())
    {
        echo ' 
                  <tr>
                    <td>'.$id.'</td>
                    <td>'.substr($urunadi,0,20).'...</td>
                    
                   
                    <td>'.$urunfiyat.'</td>
                    <td>'.substr($urunaciklama,0,20).'...</td>
                   
                    <td><center><i style="color:'.$urunrenk.'" class="fas fa-square fa-2x"></i></center></td>
                   <td>'.$indirim.'</td>
                     <td>'.$katadi.'</td>
                     <td>'.$altkatadi.'</td>
                      <td>'.$markadi.'</td>
                       <td><a class="btn btn-primary" href=urunduzenle.php?urun_id='.$id.'>Düzenle</a></td>
                      <td><a class="btn btn-danger" href=urunsil.php?urun_id='.$id.'>Sil</a></td>
                      
                  </tr>
                
                 ';
    }
    echo ' </tbody>
                  
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>';
    
    ?>
  
   
  </div>
  <?php include "footer.php"; ?>
  
