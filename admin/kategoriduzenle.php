<?php include "header.php";include "../baglanti.php"; ?>
<?php

if($_SERVER['REQUEST_METHOD'] === 'GET')
{
    $katno = $_GET["kat_id"] ?? NULL;
if(!$katno)
{
    header("Location:kategori.php");
    exit();
}
$sorgu = "select * from kategoriler where katID = '$katno'";
                    $stat = $baglan->prepare($sorgu);
                    $stat->bind_result($katid,$katad);
                    $stat->execute();
                    while($urun=$stat->fetch())
                    {
                       
                    }
                  if(!$urun)
                  {
                      header("Location:kategori.php");
                  }
                
}

                    


?>
   <div class="content-wrapper">
       <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-6">
            <h1>Kategori Düzenle</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Kategori Düzenle</li>
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
                <h3 class="card-title">Düzenleme Formu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="kategoriguncelle.php?kat_id=<?=$katid?>">
                  
                <div class="card-body">
              
                   
                    
                 
                 
                    <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="" name="no" value="<?=$katid?>"/>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kategori ID</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder=""  name="qq" value="<?=$katid?>" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kategori Adı</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder=""  name="katad" value="<?=$katad?>">
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
  
 