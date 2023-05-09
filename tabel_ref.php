<?php
  session_start();
  if (!isset($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit;
  }
require 'function.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SIMBA | BPKAD</title>

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/fakeLoader.css">

       <!-- DataTables--->
       <link rel="stylesheet" type="text/css" href="datatables/datatables.css">
       <script type="text/javascript" src="datatables/datatables.js"></script>

</head>



        <body class="sb-nav-fixed">
        <div class="fakeLoader"></div>
        <nav class="sb-topnav navbar navbar-expand navbar-black bg-dark">
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

                    <li><hr class="dropdown-divider" /></li>
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
                        <a class="sb-sidenav-menu-heading">Sistem Informasi Barang</a>
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="home_pegawai.php">
                                <div class="sb-nav-link-icon"><i class="glyphicon glyphicon-shopping-cart"></i></div>
                                 Data Request Pesanan
                            </a>
                            <a class="nav-link" href="home_supplier.php">
                                <div class="sb-nav-link-icon"><i class="glyphicon glyphicon-floppy-disk"></i></div>
                                Data Supplier
                            </a>
                            <a class="nav-link" href="tabel_ref.php">
                                <div class="sb-nav-link-icon"><i class="glyphicon glyphicon-shopping-cart"></i></div>
                                 Referensi SSH
                            </a>
                    <div class="sb-sidenav-footer">
                </nav>
            </div>

            <div id="layoutSidenav_content">       
<main>
<div class="container-fluid px-4">
                        <h3 class="mt-4">Data Referensi Satuan Standar Harga</h3>
                        <div class="card mb-4">
                        
  <div class="card-header bg-success text-white">
    Data Satuan Standar Harga
    <a href="..." class="btn btn-info">Excel</a>
  </div>
  
     <div class="card-body">
             <div class="table-responsive">   
                            <table class="table table-bordered" id="datatablesSimple" width= "75%" cellspacing= "0">
                                    <thead>
                                        <tr>
                                            <th>Kode Kelompok</th>
                                            <th>Uraian Kelompok Barang</th>
                                            <th>ID Standar Harga</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Spesifikasi</th>
                                            <th>Satuan</th>
                                            <th>Harga Satuan</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                    <?php
                                    $ambilsemuadatareferensi = mysqli_query($conn, "select * from data_ssh");

                                    while($data=mysqli_fetch_array($ambilsemuadatareferensi)){
                                        $kd_klmpk = $data ['KODE KELOMPOK BARANG'];
                                        $uraian_klmpk = $data['URAIAN KELOMPOK BARANG'];
                                        $id_SSH = $data['ID STANDAR HARGA'];
                                        $kd_barang = $data['KODE BARANG'];
                                        $nama_barang = $data['URAIAN BARANG'];
                                        $spesifikasi = $data['SPESIFIKASI'];
                                        $satuan = $data['SATUAN'];
                                        $hrg_satuan = $data['HARGA SATUAN'];
                                    ?>

                                    <tr>
                                        <td><?=$kd_klmpk?></td>
                                        <td><?=$uraian_klmpk?></td>
                                        <td><?=$id_SSH?></td>
                                        <td><?=$kd_barang?></td>
                                        <td><?=$nama_barang?></td>
                                        <td><?=$spesifikasi?></td>
                                        <td><?=$satuan?></td>
                                        <td><?=$hrg_satuan?></td>
                                </tr>
                                       
                                <?php
                                    };
                                    ?>

                                  </tbody>
                                </table>
                            </div>
                                </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-2">
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