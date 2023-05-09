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
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href ="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
                        <a class="sb-sidenav-menu-heading"><h5>Sistem Informasi Barang dan Arsip</h5></a>
                            <div class="sb-sidenav-menu-heading"><h5>Menu</h5></div>
                
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
                        <h3 class="mt-4">Info Data Request Barang</h3>
                        <div class="card mb-4">
                        
  <div class="card-header bg-success text-white">
    Detail Pesanan
    <a href="exportexcelreq.php" class="btn btn-info">Excel</a>
                                    <a href="exportprintreq.php" class="btn btn-info">Print</a>
  </div>
                            <div class="card-body">
                            <div class="table-responsive">   
                            <table class="table table-bordered" id="datatablesSimple" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        
                                        <th>No</th>
                                            <th>Waktu</th>
                                            <th>Nama Pemesan</th>
                                            <th>Bidang</th>
                                            <th>kode barang</th>
                                            <th>Nama barang</th>
                                            <th>Kategori Barang</th>
                                            <th>Jumlah Permintaan</th>
                                            <th>Satuan</th>
                                            <th>Aksi</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                    <?php
                                    
                                    $ambilsemuadatarequest = mysqli_query($conn, "select * from request");
                                    $i = 1;
                                    
                                    while($data=mysqli_fetch_array($ambilsemuadatarequest)){
                                        
                                        $idreq =   $data ['idreq'];
                                        $waktu = $data['waktu'];
                                        $nama_pemesan = $data['nama_pemesan'];
                                        $bidang = $data['bidang'];
                                        $kode_barang = $data['kode_barang'];
                                        $nama_barang = $data['nama_barang'];
                                        $jenis_barang = $data['jenis_barang'];
                                        $jumlah_permintaan = $data['jumlah_permintaan'];
                                        $satuan = $data['satuan'];
                                        $validasi = $data['validasi']; 
                                        $i= $i++;
                                    ?>
                                    <tr>
                                   
                                        <td><?=$i;$i++;?></td>
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
                                 Konfirmasi
                                </button>
                                
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#stock<?=$idreq;?>">
                                 Stock Kosong
                                </button>
                                </td>
                                <td><?=$validasi?></td>
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
                                    <b>Yakin Stock <?=$nama_barang;?> Masih ada?</b>
                                    <br>
                                    <input type="hidden" name="idreq" value="<?=$idreq;?>">
                                    <br>
                                    <input type="hidden" name="validasi" value="(Supplier): Stock Ada">
                                    <br>
                                    <button type="submit" class="btn btn-success" name="Updatevalidasi">konfirmasi</button>
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
                                    <input type="hidden" name="validasi" value="(Supplier): Stock Kosong">
                                    <br>
                                    <button type="submit" class="btn btn-warning" name="stockkosong">konfirmasi</button>
                            </div>
                                                       
      
                                    
                                   <!-- Modal body -->
                                    <div class="modal fade" id="edit<?=$idreq;?>">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                        
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Menu Edit Spesifikasi</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    
                                    <!-- Modal body -->
                                    <form method ="post" enctype="multipart/form-data" >
                                    <div class="modal-body">
                                    <p>Kode Barang</p>
                                    <input type="text" name="kode_barang" value="<?=$kode_barang;?>" class="form-control">
                                    <br>
                                    <p>Nama Barang</p>
                                    <input type="text" name="nama_barang" value="<?=$nama_barang;?>" class="form-control">
                                    <br>
                                    <p>Jenis Barang</p>
                                    <input type="text" name="jenis_barang" value="<?=$jenis_barang;?>" class="form-control">
                                    <br>
                                    <p>Jumlah permintaan</p>
                                    <input type="text" name="jumlah_permintaan" value="<?=$jumlah_permintaan;?>" class="form-control">
                                    <br>
                                    <p>Satuan</p>
                                    <input type="text" name="satuan" value="<?=$satuan;?>" class="form-control">
                                    <br>
                                    <input type="hidden" name="idreq" value=<?=$idreq;?>>
                                    <br>
                                    <button type="submit" class="btn btn-primary"name="updaterequest">Submit</button>
                                    </div>
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
                                <script>
                                    $(document).ready(function () {
    $('#datatablesSimple').DataTable();
});
                                </script>

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
            
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
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