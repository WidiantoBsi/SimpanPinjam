<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>WD Simpan Pinjam</title>
    <!-- Bootsrap SweetArt -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/sweetalert/sweetalert.css">
    <link href="<?php echo base_url()?>assets/css/styles.css" rel="stylesheet" />
    <!-- Bootsrap File Upload -->
    <link href="<?php echo base_url()?>assets/css/bootstrap-fileupload.min.css" rel="stylesheet" />
    <!-- End File Upload -->
    <link href="<?php echo base_url()?>assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/animate.min.css" rel="stylesheet" type="text/css">
    
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php echo base_url('Welcome')?>">WD Simpan Pinjam</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i> User Anggota</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?php echo base_url('Logout')?>">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Main Navigation</div>
                            <a class="nav-link" href="<?php echo base_url('Dashboard')?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>Dashboard</a>
                                <a class="nav-link" href="<?php echo base_url('DataSimpanan/');?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>Simpanan</a>
                                    <a class="nav-link" href="<?php echo base_url('DataPinjaman/');?>">
                                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>Pinjaman</a>
                                    </div>
                                </div>
                                <div class="sb-sidenav-footer">
                                    <div class="small">User Nama :</div>
                                    <?php echo $this->session->userdata('username'); ?>
                                </div>
                            </nav>
                        </div>                        