<?php
session_start();
  if (!isset($_SESSION['logged_in'])) {
    header("Location: index.php");
    exit;
  }
  
require 'function.php';

//e-arsip

//ambil data sekban

$getsekban = mysqli_query($conn,"select * from data_arsip where nm_pengunggah='Sekretaris Badan'");
$countsekban = mysqli_num_rows($getsekban);

//ambil data Umpeg

$getumpeg = mysqli_query($conn,"select * from data_arsip where nm_pengunggah='Kepala Sub Bagian Umum dan Kepegawaian'");
$countumpeg = mysqli_num_rows($getumpeg);

//ambil data Proglap

$getproglap = mysqli_query($conn,"select * from data_arsip where nm_pengunggah='Sub Koordinator Kelompok Sub Substansi Program dan Pelaporan'");
$countproglap = mysqli_num_rows($getproglap);

//ambil data Kasubagkeu
$getkeuangan = mysqli_query($conn,"select * from data_arsip where nm_pengunggah='Sub Koordinator Kelompok Sub Substansi Keuangan'");
$countkeuangan = mysqli_num_rows($getkeuangan);

//ambil data opr
$getoperator = mysqli_query($conn,"select * from data_arsip where nm_pengunggah='Pengelola Data Sekretariat'");
$countoperator = mysqli_num_rows($getoperator);

//ambil data BP

$getbp = mysqli_query($conn,"select * from data_arsip where nm_pengunggah='Bendahara Pengeluaran'");
$countbp = mysqli_num_rows($getbp);


?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
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
            <input type="button" class="btn btn-danger" value="<- Kembali" onclick="history.back(-1)" />
            </form>
            <!-- Navbar-->
            
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                            <a class="nav-link" href="dashboard_sekret.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
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
                            </nav>
                            </div>
                            
                
                        </div>
                    </div>
                    
                </nav>
            </div>
                <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-5">
                        <h1 class="mt-4">Dashboard Sekretariat</h1>
                        

                        <ol class="breadcrumb mb-5">
                            <li class="breadcrumb-item active">E-Arsip</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary shadow h-200 py-2 text-white mb-5">
                                    <div class="card-body shadow h-200 py-2">Sekretaris Badan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dashboard_sekban.php"><?=$countsekban;?> file</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary shadow h-200 py-2 text-white mb-5">
                                    <div class="card-body shadow h-200 py-2">Kepala Sub Bagian Umum dan Kepegawaian</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dashboard_umpeg.php"><?=$countumpeg;?> file</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary shadow h-200 py-2 text-white mb-5">
                                    <div class="card-body shadow h-200 py-2">Sub Koordinator Kelompok Sub Substansi Program dan Pelaporan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dashboard_proglap.php"><?=$countproglap;?> file</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary  shadow h-200 py-2 text-white mb-5">
                                    <div class="card-body shadow h-200 py-2">Sub Koordinator Kelompok Sub Substansi Keuangan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dashboard_keuangan.php"><?=$countkeuangan;?> file</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary  shadow h-200 py-2 text-white mb-5">
                                    <div class="card-body shadow h-200 py-2">Bendahara Pengeluaran</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dashboard_bp.php"><?=$countbp;?> file</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary  shadow h-200 py-2 text-white mb-5">
                                    <div class="card-body shadow h-200 py-2">Pengelola Data Sekretariat</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="dashboard_operator1.php"><?=$countoperator;?> file</a>
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
