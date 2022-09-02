<?php include "header.php"; ?>
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Anasayfa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Anasayfa</a></li>
              <li class="breadcrumb-item active">Anasayfa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php
    $urunler = "select count(*) from urunler";
    $stat = $baglan->prepare($urunler);
    $stat->bind_result($toplam);
    $stat->execute();
    $stat->fetch();
    $stat->close();
    ?>
    <?php
    $kategori = "select count(*) from kategoriler";
    $stat2 = $baglan->prepare($kategori);
    $stat2->bind_result($kattoplam);
    $stat2->execute();
    $stat2->fetch();
    $stat2->close();
    ?>
    <?php
    $marka = "select count(*) from markalar";
    $stat3 = $baglan->prepare($marka);
    $stat3->bind_result($markatoplam);
    $stat3->execute();
    $stat3->fetch();
    $stat3->close();
    ?>
    <?php
    $altkategori = "select count(*) from altkategoriler";
    $stat4 = $baglan->prepare($altkategori);
    $stat4->bind_result($altkattoplam);
    $stat4->execute();
    $stat4->fetch();
    $stat4->close();
    ?>
    <?php
    $altkategori = "select count(*) from menu";
    $stat4 = $baglan->prepare($altkategori);
    $stat4->bind_result($menutoplam);
    $stat4->execute();
    $stat4->fetch();
    $stat4->close();
    ?>
     <?php
    $altkategori = "select count(*) from yorumlar";
    $stat4 = $baglan->prepare($altkategori);
    $stat4->bind_result($yorum);
    $stat4->execute();
    $stat4->fetch();
    $stat4->close();
    ?>
    <?php
    $altkategori = "select count(*) from siparis";
    $stat4 = $baglan->prepare($altkategori);
    $stat4->bind_result($siparis);
    $stat4->execute();
    $stat4->fetch();
    $stat4->close();
    ?>
    <?php
    $altkategori = "select count(*) from uyeler";
    $stat4 = $baglan->prepare($altkategori);
    $stat4->bind_result($uye);
    $stat4->execute();
    $stat4->fetch();
    $stat4->close();
    ?>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$toplam?></h3>

                <p>Toplam Ürün</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-bag"></i>
              </div>
              
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?=$kattoplam?></h3>

                <p>Kategori</p>
              </div>
              <div class="icon">
                <i class="fas fa-list"></i>
              </div>
              
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?=$altkattoplam?></h3>

                <p>Alt Kategori</p>
              </div>
              <div class="icon">
                <i class="fas fa-list"></i>
              </div>
              
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$markatoplam?></h3>

                <p>Marka</p>
              </div>
              <div class="icon">
                <i class="fas fa-list"></i>
              </div>
              
            </div>
          </div>
          </div>
          
          
          
               <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$menutoplam?></h3>

                <p>Toplam Menü</p>
              </div>
              <div class="icon">
                <i class="fas fa-list"></i>
              </div>
              
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?=$yorum?></h3>

                <p>Yorumlar</p>
              </div>
              <div class="icon">
                <i class="fas fa-comment"></i>
              </div>
              
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?=$siparis?></h3>

                <p>Siparişler</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$uye?></h3>

                <p>Üyeler</p>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
              
            </div>
          </div>
          </div>
          </div>
          </div>
  <?php include "footer.php"; ?>
  
 