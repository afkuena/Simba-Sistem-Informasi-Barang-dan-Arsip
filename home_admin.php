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
                           



                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.php">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            
                
                        </div>
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Data Stock Barang</h3>
                        
                        <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" data-backdrop="static">
                                 Tambah Barang
                                </button>
                                <a href="export.php" class="btn btn-info">Cetak</a>
                                <a href="exportexcel.php" class="btn btn-info">Export Data Excel</a>
                                
                        </div>
                            
                            <div class="card-body">
                            <div class="table-responsive">
                            <table class="table-bordered" id="datatablesSimple" width= "75%" cellspacing= "0">
                                <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Supplier</th>
                                            <th>Kode Barang</th>
                                            <th>Kategori Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Spesifikasi</th>
                                            <th>Penerima</th>
                                            <th>Bahan/Rangka No.</th>
                                            <th>Sumber Dana</th>
                                            <th>Tahun</th>
                                            <th>Kondisi Barang</th>
                                            <th>Stock</th>
                                            <th>Harga satuan</th>
                                            <th>Harga Total</th>
                                            <th>Gambar</th>
                                            <th>keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                        <?php

                                                        $ambilsemuadatastock = mysqli_query($conn, "select * from stock");
                                                        $i= 1;
                                                        
                        
                                                        while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                                            $i= $i++;
                                                            $idb = $data['idbarang'];
                                                            $namacv = $data ['namacv'];
                                                            $ktgbarang = $data['ktgbarang'];
                                                            $namabarang = $data['namabarang'];
                                                            $kodebarang = $data['kodebarang'];
                                                            $spesifikasi = $data['spesifikasi'];
                                                            $hargasatuan = $data['hargasatuan'];
                                                            $penerima = $data['penerima'];
                                                            $bahanrangkabarang = $data['bahanrangkabarang'];
                                                            $sumberdana = $data['sumberdana'];
                                                            $tahun = $data['tahun'];
                                                            $kondisibarang = $data['kondisibarang'];
                                                            $stock = $data['stock'];
                                                            $hargatotal = $data['hargatotal'];
                                                            $gambarbarang = $data["gambar"];
                                                            if($gambarbarang==null){
                                                                $gambarbarang = 'No photo';   
                                                            } else {
                                                                $gambarbarang = '<img src= "image/'.$gambarbarang.'" width="100"  class = "zoomable">';
                                                            }
                                                            $keterangan = $data['keterangan'];

                                                        ?>
                                                        <tr>

                                                            <td><?=$i;$i++;?></td>
                                                            <td><?=$namacv?></td>
                                                            <td><?=$kodebarang?></td>
                                                            <td><?=$ktgbarang?></td>
                                                            <td><?=$namabarang?></td>
                                                            <td><?=$spesifikasi?></td>
                                                            <td><?=$penerima?></td>
                                                            <td><?=$bahanrangkabarang?></td>
                                                            <td><?=$sumberdana?></td>
                                                            <td><?=$tahun?></td>
                                                            <td><?=$kondisibarang?></td>
                                                            <td><?=$stock?></td>
                                                            <td><?=$hargasatuan?></td>
                                                            <td><?=$hargatotal?></td>
                                                            <td><?=$gambarbarang?></td>
                                                            <td><?=$keterangan?></td>
                                                            <td>
                                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idb;?>">
                                                        Edit
                                                        </button>
                                                        <input type ="hidden" name= "idbarangyangmaudihapus" value="<?=$idb;?>">
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idb;?>">
                                                        Delete
                                                        </button>
                                                        </td>
                                                        </tr>
                                                        
                                                        
                                                        
                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="edit<?=$idb;?>">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                        
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Menu Edit Spesifikasi</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    
                                    <!-- Modal body -->
                                    <form method ="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                    <input type="text" name="kodebarang" value="<?=$kodebarang;?>" class="form-control">
                                    <br>
                                    <input type="text" name="ktgbarang" value="<?=$ktgbarang;?>" class="form-control">
                                    <br>
                                    <input type="text" name="namabarang" value="<?=$namabarang;?>" class="form-control">
                                    <br>
                                    <input type="text" name="spesifikasi" value="<?=$spesifikasi;?>" class="form-control">
                                    <br>
                                    <input type="text" name="penerima" value="<?=$penerima;?>" class="form-control">
                                    <br>
                                    <input type="text" name="bahanrangkabarang" value="<?=$bahanrangkabarang;?>" class="form-control">
                                    <br>
                                    <input type="text" name="sumberdana" value="<?=$sumberdana?>" class="form-control">
                                    <br>
                                    <input type="number" name="tahun" value="<?=$tahun;?>" class="form-control">
                                    <br>
                                    <input type="text" name="kondisibarang" value="<?=$kondisibarang;?>" class="form-control">
                                    <br>
                                    <input type="number" name="stock" class="form-control" value="<?=$stock;?>">
                                    <br>
                                    <input type="number" name="hargasatuan" value="<?=$hargasatuan;?>" class="form-control">
                                    <br>
                                    <input type="number" name="hargatotal" value="<?=$hargatotal;?>" class="form-control">
                                    <br>
                                    <input type="text" name="keterangan" value="<?=$keterangan;?>" class="form-control">
                                    <br>
                                    <input type="file" name="file" class="form-control">
                                    <br>
                                    <input type="hidden" name="idbarang" value="<?=$idb;?>">
                                    <br>
                                    <button type="submit" class="btn btn-primary"name="updatebarang">Submit</button>
                                    
                            </div>
                    </form>

        </div>
    </div>
  </div>
                                    
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delete<?=$idb;?>">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                        
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Hapus Barang?</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    
                                    <!-- Modal body -->
                                    <form method ="post">
                                    <div class="modal-body">
                                    <b>Yakin Hapus data dari <?=$namabarang;?> nya?</b>
                                    <br>
                                    <input type="hidden" name="idbarang" value=<?=$idb;?>>
                                    <br>
                                    <button type="submit" class="btn btn-danger"name="hapusbarang">Hapus</button>
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
                                
                                <div>
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

<div class="container">


     <!-- The Modal -->
     <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Barang</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method ="post" enctype="multipart/form-data">
        <div class="modal-body">
        <select name="namacv" class="form-control">;
                                    <br>
                                    <option value="Belum ada">Data awal</option>
                                        <?php
                                        $ambilsemuadatanya = mysqli_query($conn, "select * from datasupplier");
                                        while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                                            $namasuppliernya = $fetcharray['namasupplier'];
                                            $kodebarangnya = $fetcharray['kodebarangsup'];
                                            ?>
                                            <option value="<?=$namasuppliernya;?>"><?=$namasuppliernya;?></option>
                                            <?php
                                        }
                                        ?>
                                        </select>
                                        <br>
        <input type="text" name="namabarang" placeholder="Nama Barang" class="form-control"required> 
        <br>
        <input type="text" name="kodebarang" placeholder="kode barang"  class="form-control" required>
        <br>
        <b>Kategori Barang :</b>
        <br>
        <div class="form-label-group">
        <select class= "form-control" name="ktgbarang">;
                      <option value="Elektronik">Elektronik</option>
                      <option value="Automotif">Automotif</option>
                      <option value="Alat Tulis Kantor">Alat Tulis Kantor</option>
                      <option value="Mebeuler">Mebeuler</option>
                      <option value="Perlengkapan Rumah Tangga">Perlengkapan Rumah Tangga</option>
                      <option value="Peralatan Rumah Tangga">Peralatan Rumah Tangga</option>
                  </select>
            <br>
        <input type="text" name="spesifikasi" placeholder="Spesifikasi" class="form-control"required>
        <br>
        <input type="text" name="penerima" placeholder="Penerima" class="form-control"required>
        <br>
        <input type="text" name="bahanrangkabarang" placeholder="Bahan / Rangka" class="form-control">
        <br>
        <input type="text" name="sumberdana" placeholder="Sumber Dana" class="form-control"required>
        <br>
        <b>Tahun :</b>
        <br>
        <div class="form-label-group">
        <select class= "form-control" name="tahun">
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                      <option value="2022">2021</option>
                      <option value="2022">2022</option>
                      <option value="2023">2023</option>
                  </select>
        <br>
        <b>Kondisi Barang :</b>
        <br>
        <div class="form-label-group">
        <select class= "form-control" name="kondisibarang">
                      <option value="Baru">Baru</option>
                      <option value="Bekas">Bekas</option>
                      <option value="Rusak Berat">Rusak Berat</option>
                  </select>
                  <br>                           
        <div class="perhitungan">
        <b>Quantity :</b>          
        <br>
        <input type="number" name="stock"id="stock">
        <br>
        <br>
        <b>Harga Satuan :</b>
        <br>
        <input type="number" name="hargasatuan" id="hargasatuan" >
        <br>
        <br>
        <b>Harga Total :</b>
        <br>
        <input type="number" name="hargatotal" id= "hargatotal">
        <br>
        </div>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script type="text/javascript">
            $(".perhitungan").keyup(function(){
                var stock = parseInt($("#stock").val())
                var hargasatuan = parseInt($("#hargasatuan").val())

                var hargatotal = stock * hargasatuan;
                $("#hargatotal").attr("value",hargatotal)
            });
            </script>
            <br>
        <input type="text" name="keterangan" placeholder="Keterangan" class="form-control">
        <br>
        <input type="hidden" name="idbarang" value=<?=$i;$i++?>>
        <br>
        <input type="file" name="file" class="form-control"required>
        <br>
        <button type="submit" class="btn btn-primary"name="addnewbarang">Submit</button>
        </div>
        </form>  
        </div>
        </div>
    </div>
</div>

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
