<?php include "header.php"; ?>
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Markalar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Markalar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <form>
    <?php
   $urun = "select * from markalar m INNER JOIN kategoriler k ON k.katID = m.kat_id ORDER BY k.katAdi ASC";
    $stat = $baglan->prepare($urun);
    $stat->bind_result($markaid,$markadi,$katid,$kid,$katadi);
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
                    <th>#</th>
                    <th>Marka Adı</th>
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
                    <td>'.$markaid.'</td>
                    <td>'.$markadi.'
                    </td>
                   <td>'.$katadi.'</td>
                   
                       <td width="50"><a class="btn btn-primary" href=markaduzenle.php?marka_id='.$markaid.'>Düzenle</a></td>
                      <td width="50"><a class="btn btn-danger" href=markasil.php?marka_id='.$markaid.'>Sil</a></td>
                      
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
  
 