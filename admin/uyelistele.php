<?php include "header.php"; ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Üyeler</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Üyeler</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <?php
    $uye = "select * from uyeler u INNER JOIN iller i ON u.sehirID = i.sehirID INNER JOIN ilceler ilce ON u.ilceID = ilce.ilceID";
    $stat = $baglan->prepare($uye);
    $stat->bind_result($id,$adi,$soyadi,$kuladi,$sifre,$mail,$ilceID,$sehirID,$tarih,$sid,$sehiradi,$ilcid,$ilceadi,$seid);
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
                    <th>Adı</th>
                    <th>Soyadı</th>
                    <th>Kullanıcı Adı</th>
                    <th>Şifre</th>
                    <th>E-posta</th>
                    <th>İlçe</th>
                    <th>İl</th>
                    <th>Kayıt Tarihi</th>
                    <th>Sil</th>
                  </tr>
                  </thead>
                  <tbody>';
    while($stat->fetch())
    {
        echo ' 
                  <tr>
                    <td>'.$id.'</td>
                    <td>'.$adi.'
                    </td>
                    <td>'.$soyadi.'</td>
                    <td>'.$kuladi.'</td>
                    <td>'.$sifre.'</td>
                   
                    <td>'.$mail.'</td>
                   <td>'.$ilceadi.'</td>
                     <td>'.$sehiradi.'</td>
                      <td>'.$tarih.'</td>
                      
                      <td><a class="btn btn-danger" href=uyesil.php?uyeid='.$id.'>Sil</a></td>
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
  
