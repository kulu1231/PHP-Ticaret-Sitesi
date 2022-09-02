<?php include "header.php"; ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Yorumlar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Yorumlar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <?php
    $urun = "select * from yorumlar";
    $stat = $baglan->prepare($urun);
    $stat->bind_result($id,$adsoyad,$icerik,$tarih,$onay,$urunid);
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
                    <th>Ad Soyad</th>
                   
                   
                    <th>İçerik</th>
                     <th>Tarih</th>
                     <th>Ürün ID</th>
                     <th>Onay Durumu</th>
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
                    <td>'.$adsoyad.'
                    </td>
                    <td>'.$icerik.'</td>
                    <td>'.$tarih.'</td>
                     <td>'.$urunid.'</td>
                     
                      <td>';?>
                      
                      <?php
                      if($onay == 0)
                            echo "<font color=red><b>Onay Bekliyor</b></font>";
                        else if($onay==1)
                            echo "<font color=blue><b>Onaylandı</b></font>";
                      ?>
                      
                      <?php echo '</td>';
                      ?>
                      <?php
                      if($onay == 0)
                      echo '
                       <td width="50"><a class="btn btn-primary" href=yorumonayla.php?yorum_id='.$id.'>Onayla</a></td>
                      <td width="50"><a class="btn btn-danger" href=yorumsil.php?yorum_id='.$id.'>Sil</a></td>
                      ';
                      else if($onay==1)
                      echo '
                       <td width="50"><a class="btn btn-success" disabled>Onaylandı</a></td>
                      <td width="50"><a class="btn btn-danger" href=yorumsil.php?yorum_id='.$id.'>Sil</a></td>
                      ';
                      ?>
                      
                      <?php
                      echo '
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
  
 