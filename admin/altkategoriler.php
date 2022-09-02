<?php include "header.php"; ?>
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Alt Kategoriler</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Alt Kategoriler</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <form>
    <?php
   $urun = "select * from altkategoriler ak INNER JOIN kategoriler k ON k.katID = ak.kat_id";
    $stat = $baglan->prepare($urun);
    $stat->bind_result($altkatid,$altkatadi,$katid,$kid,$katadi);
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
                    <th>Alt Kategori Adı</th>
                   <th>Kategori Adı</th>
                  
                    <th></th>
                     <th></th>
                  </tr>
                  </thead>
                   <tbody>';
    while($stat->fetch())
    {
        echo ' 
                  <tr>
                    <td>'.$altkatid.'</td>
                    <td>'.$altkatadi.'
                    </td>
                   <td>'.$katadi.'</td>
                   
                       <td width="50"><a class="btn btn-primary" href=altkategoriduzenle.php?kat_id='.$altkatid.'>Düzenle</a></td>
                      <td width="50"><a class="btn btn-danger" href=altkategorisil.php?kat_id='.$altkatid.'>Sil</a></td>
                      
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
  
   </form>
  </div>
  <?php include "footer.php"; ?>
  