<?php
  session_start();
  if (!isset($_SESSION['logged_in'])) {
    header("Location: index.php");
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
            <input type="button" class="btn btn-danger" value="<- Kembali" onclick="history.back(-1)" />
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
                        <a class="sb-sidenav-menu-heading"><h5>Sistem Informasi Barang dan Arsip</h5></a>
                            <div class="sb-sidenav-menu-heading"><h5>Menu</h5></div>
                
                            <a class="nav-link" href="requestview.php">
                                <div class="sb-nav-link-icon"><i class="glyphicon glyphicon-shopping-cart"></i></div>
                                 Data Request Pesanan
                            </a>


                    <div class="sb-sidenav-footer">
                </nav>
            </div>
            <div id="layoutSidenav_content">

            
<main>
<div class="container-fluid px-5">
                        <h3 class="mt-4">Data Request Barang</h3>
                        <div class="card mb-4">
                        
  <div class="card-header bg-success text-white">
    Detail Pesanan
    <a href="exportexcelreq.php" class="btn btn-info">Excel</a>
                                    <a href="exportprintreq.php" class="btn btn-info">Print</a>
  </div>
     <div class="card-body">
                                
                            <table class=" table-bordered" id="datatablesSimple" width= "100%" cellspacing= "0">
                                    <thead>
                                        <tr>
                                        
                                        <th>No</th>
                                            <th>Waktu</th>
                                            <th>Nama Pemesan</th>
                                            <th>Bidang</th>
                                            <th>kode barang</th>
                                            <th>Nama barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Jumlah Permintaan</th>
                                            <th>Satuan</th>
                                            <th>Aksi</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                    <?php
                                    $ambilsemuadatarequest = mysqli_query($conn, "select * from request where idreq");
                                    $idreq = 1;
                                    while($data=mysqli_fetch_array($ambilsemuadatarequest)){
                                    
                                        $idreq = $data ['idreq'];
                                        $waktu = $data['waktu'];
                                        $nama_pemesan = $data['nama_pemesan'];
                                        $bidang = $data['bidang'];
                                        $kode_barang = $data['kode_barang'];
                                        $nama_barang = $data['nama_barang'];
                                        $jenis_barang = $data['jenis_barang'];
                                        $jumlah_permintaan = $data['jumlah_permintaan'];
                                        $satuan = $data['satuan'];
                                        $validasi = $data['validasi'];
                                       
                                    ?>
                                    <tr>
                                
                                        <td><?=$idreq?></td>
                                        <td><?=$waktu?></td>
                                        <td><?=$nama_pemesan?></td>
                                        <td><?=$bidang?></td>
                                        <td><?=$kode_barang?></td>
                                        <td><?=$nama_barang?></td>
                                        <td><?=$jenis_barang?></td>
                                        <td><?=$jumlah_permintaan?></td>
                                        <td><?=$satuan?></td>
                                        <td>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#update<?=$idreq;?>">
                                 Validasi
                                </button>
                                
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#stock<?=$idreq;?>">
                                 Stock Kosong
                                </button>

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idreq;?>">
                                 Hapus
                                </button>
                                </td>
                                <td>
                                <?=$validasi;?>
                                </td>
                                
                                </tr>
                                       
                                                       
                                                         <!-- update Modal -->
                                    <div class="modal fade" id="update<?=$idreq;?>">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                        
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Validasi Request Barang?</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    
                                    <!-- Modal body -->
                                    <form method ="post">
                                    <div class="modal-body">
                                    <b>Yakin Validasi request <?=$nama_barang;?> nya?</b>
                                    <br>
                                    <input type="hidden" name="idreq" value="<?=$idreq;?>">
                                    <br>
                                    <input type="hidden" name="validasi" value="(Admin):Sudah Di Validasi">
                                    <br>
                                    <button type="submit" class="btn btn-success" name="Updatevalidasi">Validasi</button>
                            </div>
                    </form>
                    
             
      </div>
    </div>
  </div>
                                                      


                                    <!-- update Modal -->
                                    <div class="modal fade" id="stock<?=$idreq;?>">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                        
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title"> Stock Barang Kosong?</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    
                                    <!-- Modal body -->
                                    <form method ="post">
                                    <div class="modal-body">
                                    <b>Yakin <?=$nama_barang;?> nya Kosong ?</b>
                                    <br>
                                    <input type="hidden" name="idreq" value="<?=$idreq;?>">
                                    <br>
                                    <input type="hidden" name="validasi" value="(Admin):Stock kosong">
                                    <br>
                                    <button type="submit" class="btn btn-warning" name="stockkosong">konfirmasi</button>
                            </div>
                    </form>
                    </div>
    </div>
  </div>

                    <!-- Delete Modal -->
   <div class="modal fade" id="delete<?=$idreq;?>">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                        
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Hapus Request Barang?</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    
                                    <!-- Modal body -->
                                    <form method ="post">
                                    <div class="modal-body">
                                    <b>Yakin Hapus data request <?=$nama_barang;?> nya?</b>
                                    <br>
                                    <input type="hidden" name="idreq" value=<?=$idreq;?>">
                                    <br>
                                    <button type="submit" class="btn btn-danger"name="hapusrequest">Hapus</button>
                            </div>
                    </form>
                    
             
      </div>
    </div>
  </div>
                    
                                                        <?php

                                    };
                                    ?>

                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-2">
                        <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy;SIMBA | BPKAD 2023 | Ver.1.2</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
                
                 
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
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