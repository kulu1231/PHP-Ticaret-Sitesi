<?php include "header.php"; ?>
<?php

if($_SERVER['REQUEST_METHOD'] === 'GET')
{
    $urunNo = $_GET["urun_id"] ?? NULL;
if(!$urunNo)
{
    header("Location:urunlistele.php");
    exit();
}
$sorgu = "select UrunlerID,UrunlerAdi,UrunFiyat,UrunAciklama,UrunRenk,indirim,kat_id from urunler where UrunlerID = '$urunNo'";
                    $stat = $baglan->prepare($sorgu);
                    $stat->bind_result($urunid,$urunadi,$fiyat,$aciklama,$urunrenk,$indirim,$katidd);
                    $stat->execute();
                    $stat->fetch();
                    $stat->close();
                 
                    
                  
                
}
?>
   <div class="content-wrapper">
       <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-6">
            <h1>Ürün Düzenle</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Ürün Düzenle</li>
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
                <h3 class="card-title">Düzenleme Formu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="urunduzenle2.php?no=<?=$urunid?>">
                  
                <div class="card-body">
              
                   
                    <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="" name="no" value="<?=$urunid?>">
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ürün Adı</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="urunadi" value="<?=$urunadi?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürün Fiyatı</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" placeholder=""  min="1" name="urunfiyat" value="<?=$fiyat?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürün Açıklama</label>
                    <textarea id="summernote" name="urunaciklama"><?=$aciklama?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ürün Rengi</label>
                    <input type="color" class="form-control" id="exampleInputEmail1" placeholder="" name="urunrenk" value="<?=$urunrenk?>">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">İndirim (0 veya 1)</label>
                    <input type="number" class="form-control" id="indirim" placeholder=""  min="0" max="100" name="indirim" value="<?=$indirim?>">
                  </div>
                <div class="form-group">
                  <label for="exampleSelectBorder">Kategori Adı</label>
                  <select class="custom-select form-control-border" name="kat" id="kat">
                    <?php
                    $sql = "select k.katID,k.katAdi from kategoriler k INNER JOIN urunler u ON k.katID = u.kat_id where u.UrunlerID='$urunNo'";
                    $sorgu = $baglan->prepare($sql);
                    $sorgu->bind_result($katid,$katadi);
                    $sorgu->execute();
                    $sorgu->fetch();
                    echo '<option value='.$katid.'>'.$katadi.'</option>';
                    $sorgu->close();
                    ?>
                 
                 
                 
                 <?php
                    $sql = "select * from kategoriler";
                    $sorgu = $baglan->prepare($sql);
                    $sorgu->bind_result($katid,$katadi);
                    $sorgu->execute();
                    while($sorgu->fetch())
                    {
                    echo '<option value='.$katid.'>'.$katadi.'</option>';
                    }
                    $sorgu->close();
                    ?>
                  </select>
                </div>
                 <div class="form-group">
                  <label for="exampleSelectBorder">Alt Kategori Adı</label>
                  <select class="custom-select form-control-border" name="altkat" id="altkat">
                     
                     <?php
                    $sql = "select altk.altKATID,altk.altKatAdi from altkategoriler altk INNER JOIN urunler u ON altk.altKATID = u.altkategoriID where u.UrunlerID='$urunNo'";
                    $sorgu = $baglan->prepare($sql);
                    $sorgu->bind_result($katid,$katadi);
                    $sorgu->execute();
                    $sorgu->fetch();
                    echo '<option value='.$katid.'>'.$katadi.'</option>';
                    $sorgu->close();
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleSelectBorder">Marka</label>
                  <select class="custom-select form-control-border" name="marka" id="marka">
                    <?php
                    $sql = "select m.marka_id,m.marka_adi from markalar m INNER JOIN urunler u ON m.marka_id = u.MarkaID where u.UrunlerID='$urunNo'";
                    $sorgu = $baglan->prepare($sql);
                    $sorgu->bind_result($katid,$katadi);
                    $sorgu->execute();
                    $sorgu->fetch();
                    echo '<option value='.$katid.'>'.$katadi.'</option>';
                    $sorgu->close();
                    ?>
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
                  <button type="submit" class="btn btn-primary">Güncelle</button>
                </div>
                </div>
                <!-- /.card-body -->
          
             
                
            
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
  
  