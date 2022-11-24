<?php
// mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
session_start();
include '../koneksi.php';
include "function.php";
if (!isset($_SESSION["username"])){
//   echo "<script> document.location.href='../index'; </script>";
    echo "<script> alert('anda tidak memiliki akses untuk halaman ini!, Silahkan Login terlebih dahulu');window.location= '../index';</script>";
}

$user = $_SESSION['username'];
$level = $_SESSION['level'];
$nama = $_SESSION['nama'];
$id_users = $_SESSION["id_user"];
$id_student = $_SESSION["student_id"];

$quer = $koneksi->query("SELECT * FROM tb_website");

// $query = $koneksi->query("SELECT * FROM tb_pengguna WHERE username = '$user'");
// $row = $query->fetch_array();
//jika akun berlevel peserta mengakses page admin
// if ($level === "Siswa"){
//   echo "<script> document.location.href='../user/index'; </script>";
//   // echo "<script> alert('anda tidak memiliki akses untuk halaman ini!');window.location= '../user/index';</script>";
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?php echo ucfirst($halaman); ?> | Sistem Informasi Monitoring Siswa</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <!-- <link rel="stylesheet" href="../assets/plugins/bs-stepper/css/bs-stepper.min.css"> -->
    <!-- dropzonejs -->
    <!-- <link rel="stylesheet" href="../assets/plugins/dropzone/min/dropzone.min.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <?php foreach ($quer as $data) : ?>
    <link rel="icon" href="../img/<?= $data['logo']?>" type="image/x-icon" />
    <?php endforeach; ?>
    <style>
        #loading {
            background: whitesmoke;
            position: absolute;
            top: 140px;
            left: 82px;
            padding: 5px 10px;
            border: 1px solid #ccc;
        }

        .sidebar-dark-lightblue .nav-sidebar>.nav-item>.nav-link.active,
        .sidebar-light-lightblue .nav-sidebar>.nav-item>.nav-link.active {
            background-color: #0078d4;
            color: #fff;
        }
    </style>
    <!-- <script>
		$(document).ready(function(){
			// Sembunyikan alert validasi kosong
			$("#kosong").hide();
		});
		</script> -->
</head>

<body class="sidebar-mini layout-fixed layout-navbar-fixed accent-danger">
    <div class="wrapper">

        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="https://adminlte.io/docs/3.1//assets/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark bg-danger" style='background-color: #0078d4;'>
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="index" class="nav-link">Home</a>
                </li> -->
            </ul>

            <!-- Right navbar links -->
            <!-- <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                       
                        <div class="dropdown-divider"></div>
                        <a href="../logout" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Sign Out
                        </a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>

            </ul> -->
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-danger">
            <!-- Brand Logo -->
            <!-- <a href="index" class="brand-link navbar-lightblue" style='background-color: #0078d4;'>
                <img src="../icon.png" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .8">
                <span class="brand-text font-weight-light" style="font-size: 15px;">SIMS</span>
            </a> -->

            <a href="<?php 
            if ($level=='Administrator'){ 
                echo 'index';
                }elseif($level == 'Orang Tua Wali'){
                    echo 'profile-siswa';
                }else{ echo 'index'; } ?>" class="brand-link">

                <?php foreach ($quer as $data) : ?>
                <img src="../img/<?= $data['logo']?>" alt="SIMS" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <?php endforeach; ?>
                <span class="brand-text font-weight-light" style="font-size: 20px;">SIMS</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <?php
          $foto = $_SESSION['foto'];
          if ($foto===''){?>
                        <img class="img-circle" src="../img/anonim.png">
                        <?php } else { ?>\
                        <img src="../img/user/<?= ucfirst($_SESSION['foto']); ?>" class="img-circle" alt="User Image">
                        <?php }?>

                    </div>
                    <div class="info">
                        <a href="profile" class="d-block"
                            style="font-size: large;"><?= ucfirst($_SESSION['full_name']); ?></a>
                        <a href="index" class="d-block"><?= ucfirst($_SESSION['level']); ?></a>
                    </div>
                </div>
                <?php include 'global_navigasi.php';?>