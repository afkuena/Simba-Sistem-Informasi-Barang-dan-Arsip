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

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="css/fakeLoader.css">
        <style>
            .zoomable{
                width : 100px;
            }
            .zoomable:hover{
                transform: scale(2.5);
                transition: 0.5s ease;
            }
        </style>
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
                
                            <a class="nav-link" href="req_order_sup.php">
                                <div class="sb-nav-link-icon"><i class="glyphicon glyphicon-shopping-cart"></i></div>
                                 Info Request Pesanan Barang
                            </a>
                            <a class="nav-link" href="list_supplier.php">
                                <div class="sb-nav-link-icon"><i class="glyphicon glyphicon-shopping-cart"></i></div>
                                Data Supplier
                            </a>


                    <div class="sb-sidenav-footer">
                </nav>
            </div>
            <div id="layoutSidenav_content">
            <main>
<div class="container-fluid px-5">
                        <h3 class="mt-4">Info Data Supllier</h3>
                        <div class="card mb-4">
                        <div class="card text-center">
  <div class="card-header bg-success text-white">
    Informasi Data Supplier
  </div>
     <div class="card-body">
                                
     <table class="table table-striped" id="datatablesSimple" width= "100%" cellspacing= "0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Supplier</th>
                                            <th>Awal Kontrak</th>
                                            <th>Akhir Kontrak</th>
                                            <th>No. Kontrak</th>
                                            <th>Nilai Kontrak</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori Barang</th>
                                            <th>Harga Barang</th>
                                            <th>Jumlah Barang</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>

                                    <?php
                                    $ambilsemuadatasuplier = mysqli_query($conn, "select * from datasupplier");
                                    $i = 1;
                                    while($data=mysqli_fetch_array($ambilsemuadatasuplier)){
                                        $idsupplier = $data['idsupplier'];
                                        $namacv = $data['namasupplier'];
                                        $awalkontrak = $data['awalkontrak'];
                                        $akhirkontrak = $data['akhirkontrak'];
                                        $nokontrak = $data['nokontrak'];
                                        $nilaikontrak = $data['nilaikontrak'];
                                        $kodebarang = $data['kodebarangsup'];
                                        $namabarang = $data['namabarangsup'];
                                        $ktgbarang = $data['ktgbarang'];
                                        $hargabarang = $data['hargabarang'];
                                        $jmlbarang = $data['jumlahbarang'];
                                        $i++;
                                    
                                    
                                    ?>
                                    <tr>

                                        <td><?=$idsupplier;?></td>
                                        <td><?=$namacv?></td>
                                        <td><?=$awalkontrak?></td>
                                        <td><?=$akhirkontrak?></td>
                                        <td><?=$nokontrak?></td>
                                        <td><?=$nilaikontrak?></td>
                                        <td><?=$kodebarang?></td>
                                        <td><?=$namabarang?></td>
                                        <td><?=$ktgbarang?></td>
                                        <td><?=$hargabarang?></td>
                                        <td><?=$jmlbarang?></td>
                                        

                                    </tr>
                                    <!-- Edit Modal -->
                                <div class="modal fade" id="edit<?=$idsupplier;?>">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                        
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Menu Edit Spesifikasi</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    
                                    <!-- Modal body -->
                                    <form method ="post">
                                    <div class="modal-body">
                                    <br>
                                    <input type="date" name="awalkontrak" value="<?=$awalkontrak;?>" class="form-control">
                                    <br>
                                    <input type="date" name="akhirkontrak" value="<?=$akhirkontrak;?>" class="form-control">
                                    <br>
                                    <input type="text" name="nokontrak" value="<?=$nokontrak;?>" class="form-control">
                                    <br>
                                    <input type="text" name="kodebarang" value="<?=$kodebarang;?>" class="form-control">
                                    <br>
                                    <input type="text" name="namabarangsup" value="<?=$namabarang?>" class="form-control">
                                    <br>
                                    <input type="number" name="ktgbarang" value="<?=$ktgbarang;?>" class="form-control">
                                    <br>
                                    <input type="text" name="hargabarang" value="<?=$hargabarang;?>" class="form-control">
                                    <br>
                                    <input type="number" name="jmlbarang" class="form-control" value="<?=$jmlbarang;?>">
                                    <br>
                                    <input type="hidden" name="idsuplier" value="<?=$idsupplier;?>">
                                    <br>
                                    <button type="submit" class="btn btn-primary"name="tambahasuplier">Submit</button>
                            </div>
                    </form>
                    
             
      </div>
    </div>
  </div>
  
                                     <!-- Delete Modal -->
                                    <div class="modal fade" id="delete<?=$idsupplier;?>">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                        
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Hapus Suplier?</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    
                                    <!-- Modal body -->
                                    <form method ="post">
                                    <div class="modal-body">
                                    <b>Yakin Hapus data dari <?=$namacv;?> nya?</b>
                                    <br>
                                    <input type="hidden" name="idb" value=<?=$idsupplier;?>">
                                    <br>
                                    <button type="submit" class="btn btn-danger"name="">Hapus</button>
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
                    <div class="container-fluid px-4">
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
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/fakeLoader.js"></script>
        <script>
            $(document).ready(function(){
                $.fakeLoader({
                    timeToHide:1200,
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