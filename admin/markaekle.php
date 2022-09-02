<?php include "header.php"; ?>
   <div class="content-wrapper">
       <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-6">
            <h1>Marka Ekle</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Marka Ekle</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
   <!-- Main content -->
   
     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Marka Formu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Marka Adı</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="markad">
                  </div>
                   <div class="form-group">
                  <label for="exampleSelectBorder">Kategori Adı</label>
                  <select class="custom-select form-control-border" name="katid" id="kat">
                    <?php
                    $kategori = "select * from kategoriler";
                    $statement = $baglan->prepare($kategori);
                    $statement->bind_result($katid,$katadi);
                    $statement->execute();
                    
                    while($statement->fetch())
                    {
                        echo '<option value='.$katid.'>'.$katadi.'</option>';
                    }
                    
                    ?>
                  </select>
                </div>
                  
                
            
               
                  <div class="card-footer">
                  <input type="submit" class="btn btn-primary"  value="Ekle" />
                </div>
                </div>
                <!-- /.card-body -->
              <?php
             
                
              if($_SERVER['REQUEST_METHOD'] === 'POST')
              {
                $marka = $_POST["markad"];
              
                  $kat = $_POST["katid"];
                $katekle= "insert into markalar(marka_adi,kat_id) values('$marka','$kat')";
                $stat = $baglan->prepare($katekle);
                $stat->execute();
                header("Location:markalar.php");
              }
              
              ?>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "footer.php"; ?>
 