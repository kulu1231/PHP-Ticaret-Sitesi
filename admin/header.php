<?php
session_start();
error_reporting(0);
include "../baglanti.php";
if(!isset($_SESSION["admin"]))
    header("Location:giris.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Yönetim Paneli</title>
    	<script src="https://kit.fontawesome.com/a09b300764.js" crossorigin="anonymous"></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="plugins/codemirror/codemirror.css">
  <link rel="stylesheet" href="plugins/codemirror/theme/monokai.css">
  <!-- SimpleMDE -->
  <link rel="stylesheet" href="plugins/simplemde/simplemde.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
 <li class="nav-item">
        <a class="nav-link" href="cikis.php">
          <i style="color:red;" class="fas fa-power-off"></i>
          
        </a>
       
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Yönetim Paneli</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Kamil Kulu</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Arama" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

     <!-- Sidebar Menu -->
  <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
       
         
        
      
         
          <li class="nav-header">İşlemler</li>
          
         
         
          <li class="nav-item">
            <a href="#" class="nav-link">
             <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Ürünler
                 <?php
    $urunler = "select count(*) from urunler";
    $stat = $baglan->prepare($urunler);
    $stat->bind_result($toplam);
    $stat->execute();
    $stat->fetch();
    $stat->close();
    ?>
                <i class="right fas fa-angle-left"></i>
                
                <span class="badge badge-danger right"><?=$toplam?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="urunekle.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ürün Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="urunlistele.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ürün Listele</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="resimekle.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Resim Ekle</p>
                </a>
				 </li>
            
             
            </ul>
          </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
             <i class="nav-icon fas fa-user"></i>
              <p>
                Üyeler
                 <?php
    $urunler = "select count(*) from uyeler";
    $stat = $baglan->prepare($urunler);
    $stat->bind_result($toplam);
    $stat->execute();
    $stat->fetch();
    $stat->close();
    ?>
                <i class="right fas fa-angle-left"></i>
                
                <span class="badge badge-danger right"><?=$toplam?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="uyelistele.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Üye Listele</p>
                </a>
              </li>
              
            
             
            </ul>
          </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
             <i class="nav-icon fas fa-list"></i>
              <p>
                Kategoriler
                 <?php
    $kategori = "select count(*) from kategoriler";
    $stat2 = $baglan->prepare($kategori);
    $stat2->bind_result($kattoplam);
    $stat2->execute();
    $stat2->fetch();
    $stat2->close();
    ?>
                <i class="right fas fa-angle-left"></i>
                 <span class="badge badge-danger right"><?=$kattoplam?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="kategoriekle.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kategori.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Listele</p>
                </a>
              </li>
            
            
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Alt Kategoriler
                 <?php
    $altkategori = "select count(*) from altkategoriler";
    $stat4 = $baglan->prepare($altkategori);
    $stat4->bind_result($altkattoplam);
    $stat4->execute();
    $stat4->fetch();
    $stat4->close();
    ?>
                <i class="right fas fa-angle-left"></i>
                 <span class="badge badge-danger right"><?=$altkattoplam?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="altkategoriekle.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alt Kategori Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="altkategoriler.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alt Kategori Listele</p>
                </a>
              </li>
            
            
            </ul>
          </li>
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Markalar
                 <?php
    $marka = "select count(*) from markalar";
    $stat3 = $baglan->prepare($marka);
    $stat3->bind_result($markatoplam);
    $stat3->execute();
    $stat3->fetch();
    $stat3->close();
    ?>
                <i class="right fas fa-angle-left"></i>
                 <span class="badge badge-danger right"><?=$markatoplam?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="markaekle.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Marka Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="markalar.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Marka Listele</p>
                </a>
              </li>
            
            
            </ul>
          </li>
		  <li class="nav-item">
            <a href="menuislemleri.php" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Menüler
                  <?php
    $marka = "select count(*) from menu";
    $stat3 = $baglan->prepare($marka);
    $stat3->bind_result($toplam);
    $stat3->execute();
    $stat3->fetch();
    $stat3->close();
    ?>
              </p>
               <span class="badge badge-danger right"><?=$toplam?></span>
            </a>
          </li>
           <li class="nav-item">
            <a href="yorumlar.php" class="nav-link">
              <i class="nav-icon fas fa-comment"></i>
              <p>
                Yorumlar
                  <?php
    $marka = "select count(*) from yorumlar";
    $stat3 = $baglan->prepare($marka);
    $stat3->bind_result($toplam);
    $stat3->execute();
    $stat3->fetch();
    $stat3->close();
    ?>
              </p>
               <span class="badge badge-danger right"><?=$toplam?></span>
            </a>
          </li>
		 
         
          
          <li class="nav-item">
            <a href="siparisler.php" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Siparişler
                  <?php
    $marka = "select count(*) from siparis";
    $stat3 = $baglan->prepare($marka);
    $stat3->bind_result($toplam);
    $stat3->execute();
    $stat3->fetch();
    $stat3->close();
    ?>
              </p>
               <span class="badge badge-danger right"><?=$toplam?></span>
            </a>
          </li>
         
        
         
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>