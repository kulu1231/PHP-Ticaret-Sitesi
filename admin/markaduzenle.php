<?php include "header.php"; ?>
<?php

if($_SERVER['REQUEST_METHOD'] === 'GET')
{
    $markano = $_GET["marka_id"] ?? NULL;
if(!$markano)
{
    header("Location:markalar.php");
    exit();
}
$sorgu = "select * from markalar where marka_id = '$markano'";
                    $stat = $baglan->prepare($sorgu);
                    $stat->bind_result($markaid,$markadi,$kid);
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
            <h1>Marka Düzenle</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Marka Düzenle</li>
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
              <form method="post" action="markaduzenle2.php?no=<?=$markaid?>">
                  
                <div class="card-body">
              
                   
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Marka ID</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="markaid" value="<?=$markaid?>" readonly>
                  </div>
                 
                  
                 
                   
                <div class="form-group">
                  <label for="exampleSelectBorder">Kategori Adı</label>
                  <select class="custom-select form-control-border" name="kat" id="kat">
                    <?php
                    $sql = "select k.katID,k.katAdi from kategoriler k INNER JOIN markalar m ON k.katID = m.kat_id where m.marka_id='$markano'";
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
                  <label for="exampleSelectBorder">Marka Adı</label>
                  <input type="text" class="form-control"  name="markadi" value="<?=$markadi?>">

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
  
  