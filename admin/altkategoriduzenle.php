<?php include "header.php"; ?>
<?php

if($_SERVER['REQUEST_METHOD'] === 'GET')
{
    $katid = $_GET["kat_id"] ?? NULL;
if(!$katid)
{
    header("Location:altkategoriler.php");
    exit();
}
$sorgu = "select * from altkategoriler where altKATID = '$katid'";
                    $stat = $baglan->prepare($sorgu);
                    $stat->bind_result($altkatid,$altkatadi,$kid);
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
            <h1>Alt Kategori Düzenle</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Alt Kategori Düzenle</li>
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
              <form method="post" action="altkategoriduzenle2.php?no=<?=$altkatid?>">
                  
                <div class="card-body">
              
                   
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alt Kategori ID</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="altkatid" value="<?=$altkatid?>" readonly>
                  </div>
                 
                  
                 
                   
                <div class="form-group">
                  <label for="exampleSelectBorder">Kategori Adı</label>
                  <select class="custom-select form-control-border" name="kat" id="kat">
                    <?php
                    $sql = "select k.katID,k.katAdi from kategoriler k INNER JOIN altkategoriler ak ON k.katID = ak.kat_id where ak.altKATID='$katid'";
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
                  <input type="text" class="form-control"  name="altkatadi" value="<?=$altkatadi?>">

                </div>
                
               
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
  
  