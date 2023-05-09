<?php
session_start();
  if (!isset($_SESSION['logged_in'])) {
    header("Location: index.php");
    exit;
  }
  
require 'function.php';
//get data
//ambil data total stock

$get1 = mysqli_query($conn,"select * from stock");
$count1 = mysqli_num_rows($get1);

//ambil data totalbarang masuk

$get2 = mysqli_query($conn,"select * from masuk");
$count2 = mysqli_num_rows($get2);

//ambil data totalbarang keluar

$get3 = mysqli_query($conn,"select * from keluar");
$count3 = mysqli_num_rows($get3);

//ambil data total request pesanan
$get4 = mysqli_query($conn,"select * from request");
$count4 = mysqli_num_rows($get4);

//ambil data total supplier
$get5 = mysqli_query($conn,"select * from datasupplier");
$count5 = mysqli_num_rows($get5);



//e-arsip

//ambil data sekretariat

$getsekret = mysqli_query($conn,"select * from data_arsip where bidang='Sekretariat'");
$countsekret = mysqli_num_rows($getsekret);

//ambil data Anggaran

$getanggaran = mysqli_query($conn,"select * from data_arsip where bidang='Anggaran'");
$countanggaran = mysqli_num_rows($getanggaran);

//ambil data Perbendaharaan

$getperben = mysqli_query($conn,"select * from data_arsip where bidang='Perbendaharaan'");
$countperben = mysqli_num_rows($getperben);

//ambil data total request pesanan
$getaset = mysqli_query($conn,"select * from data_arsip where bidang='Aset'");
$countaset = mysqli_num_rows($getaset);

//ambil data total request pesanan
$getakun = mysqli_query($conn,"select * from data_arsip where bidang='Akuntansi'");
$countakun = mysqli_num_rows($getakun);


?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" 
        <meta name="author" content="" />
		<link rel="shortcut icon" href="iconsimba.ico">
        <title>SIMBA | BPKAD</title>

        <script type="text/javascript" src="assets/DataTables/media/js/jquery.js"></script>
        <script type="text/javascript" src="assets/DataTables/media/js/jquery.dataTables.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="assets/DataTables/media/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="assets/DataTables/media/css/dataTables.bootstrap.css">


        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/fakeLoader.css">
        
        <style>
            .zoomable{
                width : 70px;
            }
            .zoomable:hover{
                transform: scale(2.5);
                transition: 0.5s ease;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <div class="fakeLoader"></div>
        <nav class="sb-topnav navbar navbar-expand navbar-black bg-black ">
            <!-- Navbar Brand-->
            <img src="assets/img/logosimba.png" class="img-rounded" alt="Logo Bpkad" width="50" height="50">
            <br>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="viewdaftaruser.php">Pengajuan User</a></li>
                        <li><a class="dropdown-item" href="admin.php">Kelola User</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="dashboard_admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Sistem Informasi Barang dan Arsip</div>
                            <a class="nav-link collapsed"  data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Pengelolaan Barang
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="glyphicon glyphicon-shopping-cart"></i></div>
                                Penyediaan Barang
                            </a>
                            <a class="nav-link" href="datasuplier.php">
                                <div class="sb-nav-link-icon"><i class="glyphicon glyphicon-floppy-disk"></i></div>
                                Data Suplier
                            </a>
                            <a class="nav-link" href="keluar.php">
                                <div class="sb-nav-link-icon"><i class="glyphicon glyphicon-export"></i></div>
                                Barang Keluar
                            </a>
                            <a class="nav-link" href="home_admin.php">
                                <div class="sb-nav-link-icon"><i class="glyphicon glyphicon-inbox"></i></div>
                                Stock Barang
                            </a>
                            <a class="nav-link" href="requestview.php">
                                <div class="sb-nav-link-icon"><i class="glyphicon glyphicon-inbox"></i></div>
                                Data Request Pesanan
                            </a>
                            </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                E-Arsip
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link" href="Arsip.php">
                                <div class="sb-nav-link-icon"><i class="glyphicon glyphicon-save"></i></div>
                                Sekretariat
                            </a>
                            <a class="nav-link" href="bid_Anggaran.php">
                                <div class="sb-nav-link-icon"><i class="glyphicon glyphicon-save"></i></div>
                                Bidang Anggaran
                            </a>
                            <a class="nav-link" href="bid_Perbendaharaan.php">
                                <div class="sb-nav-link-icon"><i class="glyphicon glyphicon-save"></i></div>
                                Bidang Perbendaharaan
                            </a>
                            <a class="nav-link" href="bid_Aset.php">
                                <div class="sb-nav-link-icon"><i class="glyphicon glyphicon-save"></i></div>
                                Bidang Aset
                            </a>
                            <a class="nav-link" href="bid_Akuntansi.php">
                                <div class="sb-nav-link-icon"><i class="glyphicon glyphicon-save"></i></div>
                                Bidang Akuntansi
                            </a>
                            </nav>
                            </div>
                            
                
                        </div>
                    </div>
                    
                </nav>
            </div>
                <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-5">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-5">
                            <li class="breadcrumb-item active">Pengeloalaan Barang</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary shadow h-200 py-2 text-white mb-5">
                                    <div class="card-body shadow h-200 py-2">Total Data Stock Barang</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="home_admin.php"><?=$count1;?> Barang</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning shadow h-200 py-2 text-white mb-5">
                                    <div class="card-body shadow h-200 py-2">Total Data Barang Keluar</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="keluar.php"><?=$count3;?> Barang</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success shadow h-200 py-2 text-white mb-5">
                                    <div class="card-body shadow h-200 py-2">Total Data Barang Masuk</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="masuk.php"><?=$count3;?> Barang</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger  shadow h-200 py-2 text-white mb-5">
                                    <div class="card-body shadow h-200 py-2">Data Request</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="requestview.php"><?=$count4;?> Pesanan</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info  shadow h-200 py-2 text-white mb-5">
                                    <div class="card-body shadow h-200 py-2">Data Supplier</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="home_supplier.php"><?=$count5;?> Supplier</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                                    </div>

                        <ol class="breadcrumb mb-5">
                            <li class="breadcrumb-item active">E-Arsip</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary shadow h-200 py-2 text-white mb-5">
                                    <div class="card-body shadow h-200 py-2">Sekretariat</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dashboard_sekret.php"><?=$countsekret;?> file</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary shadow h-200 py-2 text-white mb-5">
                                    <div class="card-body shadow h-200 py-2">Bidang Anggaran</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dashboard_anggaran.php"><?=$countanggaran;?> file</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary shadow h-200 py-2 text-white mb-5">
                                    <div class="card-body shadow h-200 py-2">Bidang Perbendaharaan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dashboard_perbendaharaan.php"><?=$countperben;?> file</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary  shadow h-200 py-2 text-white mb-5">
                                    <div class="card-body shadow h-200 py-2">Bidang Aset</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dashboard_aset.php"><?=$countaset;?> file</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-primary  shadow h-200 py-2 text-white mb-5">
                                    <div class="card-body shadow h-200 py-2">Bidang Akuntansi</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dashboard_akuntansi.php"><?=$countakun;?> file</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        
                                    
                 
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; SIMBA | BPKAD 2023 | Ver.1.2</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

                 
                                </body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/fakeLoader.js"></script>
        <script>
            $(document).ready(function(){
                $.fakeLoader({
                    timeToHide:500,
                    bgColor:"#ecf0f1",
                    spinner:"spinner3"
                });
            });
        </script>

<script> // Menentukan jangka waktu sesi dalam menit, dalam contoh ini adalah 30 menit
var sessionTimeout = 30;

// Menentukan waktu login
var loginTime = new Date().getTime();

// Fungsi untuk memeriksa waktu sesi setiap detik
var checkSession = setInterval(function() {
  // Menentukan waktu saat ini
  var currentTime = new Date().getTime();
  
  // Menghitung selisih waktu antara login dan waktu saat ini dalam menit
  var timeDiff = (currentTime - loginTime) / (1000 * 60);
  
  // Mengecek apakah selisih waktu sudah mencapai jangka waktu sesi
  if (timeDiff >= sessionTimeout) {
    // Jika selisih waktu sudah mencapai jangka waktu sesi, hentikan interval checkSession
    clearInterval(checkSession);
    
    // Lakukan log out otomatis atau tampilkan pesan log out, contoh redirect ke halaman login
    alert('Waktu sesi Anda telah habis. Anda akan diarahkan ke halaman login.');
    window.location.href = 'http://localhost/stockbarang/login.php';
  }
}, 1000); // Interval checkSession diatur setiap 1 detik

</script>
</body>
</html>
