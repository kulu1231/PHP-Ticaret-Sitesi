<?php include "header.php"; ?>
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Menü Ekle / Sil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Menü İşlemleri</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

   <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Menü Düzenle</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <form method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Menü Adı</label>
                <input type="text" id="inputName" class="form-control" name="menuad">
              </div>
             
             
              <div class="form-group">
                <label for="inputClientCompany">Menü Link</label>
                <input type="text" id="inputClientCompany" class="form-control" name="menulink">
              </div>
              <div class="form-group">
               
                <input type="submit" id="inputClientCompany" class="btn btn-danger" value="Ekle">
              </div>
             
            </div>
            </form>
            <?php
            if($_SERVER["REQUEST_METHOD"]==='POST')
            {
                $menuad = $_POST["menuad"];
                $menulink = $_POST["menulink"];
                $ekle = "insert into menu(MenuAd,MenuLink) values('$menuad','$menulink')";
                $stat = $baglan->prepare($ekle);
                $stat->execute();
                
            }
            
            
            
            ?>
           
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
         
          <!-- /.card -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Menüler</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
                
              <table class="table">
                <thead>
                  <tr>
                    <th>Menü Adı</th>
                    <th>Menü Link</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
            <?php
                $menu = "select * from menu";
                $stat = $baglan->prepare($menu);
                $stat->bind_result($menuid,$menuad,$menulink);
                $stat->execute();
                while($stat->fetch())
                {
                    echo ' <tr>
                    <td>'.$menuad.'</td>
                    <td>'.$menulink.'</td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                       
                        <a href="menusil.php?menu_id='.$menuid.'" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
                 
                   </tr>';
                }
                ?>
                 

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include "footer.php"; ?>
  
  