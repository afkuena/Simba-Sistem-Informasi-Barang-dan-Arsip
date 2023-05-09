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

        <script>
            $( function() {
            $( "#date" ).datepicker();
  } );
  </script>
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
        <nav class="sb-topnav navbar navbar-expand navbar-black bg-black">
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
                        <a class="sb-sidenav-menu-heading"><h5>Sistem Informasi Barang dan Arsip</h5></a>
                            <div class="sb-sidenav-menu-heading"><h5>Menu</h5></div>
                           
                            <a class="nav-link" href="datasuplier.php">
                                <div class="sb-nav-link-icon"><i class="glyphicon glyphicon-floppy-disk"></i></div>
                                Data Supplier
                            </a>
                            
   
                    <div class="sb-sidenav-footer">
                </nav>
            </div>
            <div id="layoutSidenav_content">
            <main>
<div class="container-fluid px-5">
                        <h3 class="mt-4">Info Data Supplier</h3>
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
                                            <th>Aksi</th>

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
                                        <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idsupplier;?>">
                                 Edit</button>
                                
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idsupplier;?>">Hapus</button></td>
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
                                    <input type="text" name="namasupplier" value="<?=$namacv;?>" class="form-control">    
                                    <br>
                                    <input type="date" name="awalkontrak" value="<?=$awalkontrak;?>" class="form-control">
                                    <br>
                                    <input type="date" name="akhirkontrak" value="<?=$akhirkontrak;?>" class="form-control">
                                    <br>
                                    <input type="text" name="nokontrak" value="<?=$nokontrak;?>" class="form-control">
                                    <br>
                                    <input type="text" name="nilaikontrak" value="<?=$nilaikontrak;?>" class="form-control">
                                    <br>
                                    <input type="text" name="kodebarangsup" value="<?=$kodebarang;?>" class="form-control">
                                    <br>
                                    <input type="text" name="namabarangsup" value="<?=$namabarang?>" class="form-control">
                                    <br>
                                    <input type="text" name="ktgbarang" value="<?=$ktgbarang;?>" class="form-control">
                                    <br>
                                    <input type="text" name="hargabarang" value="<?=$hargabarang;?>" class="form-control">
                                    <br>
                                    <input type="number" name="jumlahbarang" class="form-control" value="<?=$jmlbarang;?>">
                                    <br>
                                    <input type="hidden" name="idsupplier" value="<?=$idsupplier;?>">
                                    <br>
                                    <button type="submit" class="btn btn-primary"name="updatesupplier">Submit</button>
                                    
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
                                    <input type="hidden" name="idsupplier" value=<?=$idsupplier;?>">
                                    <br>
                                    <button type="submit" class="btn btn-danger" name="hapussupplier">Hapus</button>
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


                <body>
                <main>
                    <div class="container-fluid px-5">
                        <h3 class="mt-4">Form Input Data Supplier</h3>
                        <div class="card mb-4">
                        <div class="card text-center">
  <div class="card-header bg-primary text-white">
    Input Data
  </div>
     <div class="card-body"> 
     

    <form method="post">
    <div class="col-md-6 mb-3">
      <label for="Inputnamacv">Nama Supplier :</label>
      <input type="text" name="namasupplier" class="form-control" id="Inputnamacv"  placeholder="Nama Supplier" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="InputAwalKontrak">Akhir Kontrak :</label>
      <input type="date" name="akhirkontrak" class="form-control" id="InputAkhirKontrak"  placeholder="Akhir Kontrak" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="InputAkhirKontrak">Awal Kontrak :</label>
      <input type="date" name="awalkontrak" class="form-control" id="InputAwalKontrak"  placeholder="AwalKontrak" required>
    </div>
  
    <div class="col-md-6 mb-3">
      <label for="InputNoKontrak">Nomor Kontrak :</label>
      <input type="text" name="nokontrak" class="form-control" id="InputNoKontrak" placeholder="Nomor Kontrak" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="InputNilaiKontrak">Nilai Kontrak :</label>
      <input type="text" name="nilaikontrak" class="form-control" id="InputNilaiKontrak"  placeholder="Nilai Kontrak" required>
    </div>

    <div class="col-md-6 mb-3">
      <label for="InputKodeBarang">Kode Barang :</label>
      <input type="text" name="kodebarangsup" class="form-control" id="InputKodeBarang" placeholder="Kode barang" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="InputNamaBarang">Nama Barang :</label>
      <input type="text" name="namabarangsup" class="form-control" id="InputNamaBarang"  placeholder="Nama Barang" required>
    </div>
  <div class="col-md-3 mb-3">
  <label for="InputKategoriBarang">Kategori Barang :</label>
      <input type="text" name="ktgbarang" class="form-control" id="InputKategoriBarang" placeholder="Kategori Barang" required>
    </div>
    <div class="col-md-3 mb-3">
  <label for="InputHargaBarang">Harga Barang :</label>
      <input type="number" name="hargabarang" class="form-control" id="InputHargaBarang" placeholder="Harga Barang" required>
    </div>
    <div class="col-md-3 mb-3">
  <label for="InputJumlahBarang">Jumlah Barang :</label>
      <input type="number" name="jumlahbarang" class="form-control" id="InputJumlahBarang" placeholder="Jumlah Barang" required>
    </div>
    <br>
  <input type="hidden" name="idsupplier" value="<?=$i;$i++;?>"required>
                                    <br>
  <button type="submit" class="btn btn-primary"name="addnewvendor">Submit Form</button>
        </div>

    
    </div>
    </div>                   
</form>
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