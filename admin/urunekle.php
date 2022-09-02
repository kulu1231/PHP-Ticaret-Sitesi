<?php include "header.php"; ?>
   <div class="content-wrapper">
       <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-6">
            <h1>Ürün Ekle</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Ürün Ekle</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
   <!-- Main content -->
   	<script>
	   $(document).ready(function(){
	     
	      $('#kat').change(function(){
	          
	         var altkat = $(this).val();
	        
	         $.ajax({
	             type:"POST",
	             url:"altkategori.php",
	             data:{"altkat":altkat},
	             success:function(e)
	             {
	                 $("#altkat").html(e);
	             }
	        
	             
	             
	              });
	              
	               $.ajax({
	             type:"POST",
	             url:"markafiltrele.php",
	             data:{"katno":altkat},
	             success:function(e)
	             {
	                 $("#marka").html(e);
	             }
	        
	             
	             
	              });
	      });
	   });
	</script>
     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Kayıt Formu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ürün Adı</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="urunadi" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürün Fiyatı</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder=""  min="1" name="urunfiyat" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürün Açıklama</label>
                    <textarea id="summernote" name="urunaciklama" rows="10" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ürün Rengi</label>
                    <input type="color" class="form-control" id="exampleInputEmail1" placeholder="" name="urunrenk" required>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">İndirim</label>
                    <input type="number" class="form-control" id="indirim" placeholder=""  min="0" max="100" name="indirim" required>
                  </div>
                <div class="form-group">
                  <label for="exampleSelectBorder">Kategori Adı</label>
                  <select class="custom-select form-control-border" name="kat" id="kat">
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
                 <div class="form-group">
                  <label for="exampleSelectBorder">Alt Kategori Adı</label>
                  <select class="custom-select form-control-border" name="altkat" id="altkat">
                    <option></option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleSelectBorder">Marka</label>
                  <select class="custom-select form-control-border" name="marka" id="marka">
                   <option></option>
                  </select>
                </div>
                <!--
                  <div class="form-group">
                    <label for="exampleInputFile">Ürün Resim</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  -->
                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Ekle</button>
                </div>
                </div>
                <!-- /.card-body -->
              <?php
             
                
              if(isset($_POST))
              {
                $urunadi = $_POST["urunadi"];
              
                $urunfiyat = $_POST["urunfiyat"];
                $urunaciklama = $_POST["urunaciklama"];
                $urunrenk = $_POST["urunrenk"];
                $indirim = $_POST["indirim"];
                $kat = $_POST["kat"];
                $altkat = $_POST["altkat"];
                $marka = $_POST["marka"];
                
                $urunekle= "insert into urunler(UrunlerAdi, UrunFiyat, UrunAciklama, UrunRenk, indirim, kat_id, altkategoriID, MarkaID) values('$urunadi','$urunfiyat','$urunaciklama','$urunrenk','$indirim','$kat','$altkat','$marka')";
                $stat = $baglan->prepare($urunekle);
                $stat->execute();

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
