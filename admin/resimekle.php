<?php include "header.php"; ?>
   <div class="content-wrapper">
       <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-6">
            <h1>Resim Ekle</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Resim Ekle</li>
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
                <h3 class="card-title">Ürüne resim ekle</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                    
                  <div class="form-group">
                  <label for="exampleSelectBorder">Ürün Adı</label>
                  <select class="custom-select form-control-border" name="urunadi" id="urun">
                    <?php
                    $urun = "select UrunlerID,UrunlerAdi from urunler";
                    $statement = $baglan->prepare($urun);
                    $statement->bind_result($urunid,$urunadi);
                    $statement->execute();
                    
                    while($statement->fetch())
                    {
                        echo '<option value='.$urunid.'>'.$urunadi.'</option>';
                    }
                    
                    ?>
                  </select>
                </div>
              
                <div class="form-group">
                 
                    <input type="hidden" name="urunid" class="form-control" value="<?=$urunid?>"/>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Resim Yolu</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="resim" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Resim Seç</label>
                      </div>
                    
                    </div>
                  </div>
                  
                
            
               
                  <div class="card-footer">
                  <input type="submit" class="btn btn-primary"  value="Ekle" />
                </div>
                </div>
                <!-- /.card-body -->
              <?php
             
                
              if($_SERVER['REQUEST_METHOD'] === 'POST')
              {
                $urunid = $_POST["urunid"];
                $hedef_dizin = "../img/product/";
                $hedef_dosya = $hedef_dizin . basename($_FILES["resim"]["name"]);
                $resim = basename($_FILES['resim']["name"]);
                move_uploaded_file($_FILES["resim"]["tmp_name"], $hedef_dosya);
                $katekle= "insert into resimler(urun_id,resim) values('$urunid','$resim')";
                $stat = $baglan->prepare($katekle);
                $stat->execute();
                header("Location:urunlistele.php");
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
  
