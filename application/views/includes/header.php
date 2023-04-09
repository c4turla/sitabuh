<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $pageTitle; ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/tambat/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/tambat/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/tambat/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">


  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/tambat/modules/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/tambat/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/tambat/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">


  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/tambat/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/tambat/css/components.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <a href="index.html" class="navbar-brand sidebar-gone-hide">SiTabuh</a>
        <div class="navbar-nav">
          <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        </div>
        <div class="nav-collapse">
          <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
          </a>
          <ul class="navbar-nav">
            <li class="nav-item active"></li>
            <li class="nav-item"><a href="#" class="nav-link" navbar-brand><b>Sistem Informasi Tambat Labuh PPS Kendari</b></a></li>
          </ul>
        </div>
        <form class="form-inline ml-auto">
          <ul class="navbar-nav">
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          
        </form>
        <ul class="navbar-nav navbar-right">
 
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                  <?= empty($last_login) ? "First Time Login" : $last_login; ?>
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">17 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?php echo base_url(); ?>assets/tambat/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $name; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="<?php echo base_url(); ?>profile" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="#" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="<?php echo base_url(); ?>userListing" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url(); ?>logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>

      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item <?php if($this->uri->segment(1)=="dashboard"){echo "active";}?>">
              <a href="<?php echo base_url(); ?>dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1)=="data-kapal"){echo "active";}?>">
              <a href="<?php echo base_url(); ?>data-kapal" class="nav-link"><i class="far fa-heart"></i><span>Data Kapal</span></a>
            </li>
            <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-newspaper"></i><span>Tambat Labuh</span></a>
              <ul class="dropdown-menu">
                <li class="nav-item <?php if($this->uri->segment(1)=="gtkurang"){echo "active";}?>"><a href="<?php echo base_url(); ?>gtkurang" class="nav-link">Tambat Labuh GT < 30 </a></li>
                <li class="nav-item <?php if($this->uri->segment(1)=="gtlebih"){echo "active";}?>"><a href="<?php echo base_url(); ?>gtlebih" class="nav-link">Tambat Labuh GT > 30 </a></li>
                <li class="nav-item <?php if($this->uri->segment(1)=="kapal_rusak"){echo "active";}?>"><a href="<?php echo base_url(); ?>kapal_rusak" class="nav-link">Kapal Rusak (Floating Repair)/Menunggu Musim/Menunggu Giliran Perbaikan/Dock</a></li>
                <li class="nav-item <?php if($this->uri->segment(1)=="etmal"){echo "active";}?>"><a href="<?php echo base_url(); ?>etmal" class="nav-link">Tambat Labuh > 30 ETMAL </a></li>   
                <li class="nav-item <?php if($this->uri->segment(1)=="non_perikanan"){echo "active";}?>"><a href="<?php echo base_url(); ?>non_perikanan" class="nav-link">Kapal Non Perikanan </a></li>                
              </ul>
            </li>
            <li class="nav-item <?php if($this->uri->segment(1)=="air"){echo "active";}?>">
              <a href="<?php echo base_url(); ?>air" class="nav-link"><i class="far fa-clone"></i><span>Pelayanan Air</span></a>
            </li>
           
<!--             <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-file-pdf"></i><span>Laporan</span></a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="" class="nav-link">Data Kapal </a></li>
                <li class="nav-item"><a href="" class="nav-link">Tambat Labuh </a></li>
                <li class="nav-item"><a href="" class="nav-link">Pelayanan Air</a></li>
                <li class="nav-item"><a href="" class="nav-link">Penggunaan Listrik</a></li>
                <li class="nav-item"><a href="" class="nav-link">Kebersihan Kolam Pelabuhan </a></li>
              </ul>
            </li> -->
          </ul>
        </div>
      </nav>


 




