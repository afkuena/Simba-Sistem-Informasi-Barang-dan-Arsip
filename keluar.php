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
                        <h3 class="mt-4">Barang Keluar</h3>
                
                        <div class="card mb-4">
                        <div class="card-header bg-warning text-white">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                 Tambah Barang keluar
                                </button>
                                <a href="exportpdfk.php" class="btn btn-info">Cetak</a>
                                <a href="exportexcelk.php" class="btn btn-info">Export Data Excel</a>
                            </div>
                            <div class="card-body">
                            <?php
            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
            $ambilsemuadatarequest = mysqli_query($conn, "SELECT * from stock where stock < 1");
                while($fetch=mysqli_fetch_array($ambilsemuadatarequest)){
                    $namabarang = $fetch ['namabarang'];
                   
                
         ?>

     <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>MOHON MAAF!</strong> <?=$namabarang?> yang tersedia sudah habis !.
        </div>   

        <?php
      }
        ?>
                            <table class="table table-bordered" id="datatablesSimple" width= "100%" cellspacing= "0">
                            <thead>
                                        <tr>
                                            <th>Waktu</th>
                                            <th>Kode Barang</th>
                                            <th>Kategori Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Spesifikasi</th>
                                            <th>Penerima</th>
                                            <th>Bahan/Rangka No.</th>
                                            <th>Sumber Dana</th>
                                            <th>Tahun</th>
                                            <th>Kondisi Barang</th>
                                            <th>Quantity</th>
                                            <th>Harga satuan</th>
                                            <th>Harga Total</th>
                                            <th>Gambar</th>
                                            <th>keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                    <?php
                                    $ambilsemuadatakeluar = mysqli_query($conn, "select * from keluar k, stock s where s.idbarang = k.idbarang");
                                    $i= 0;
                                    while($data=mysqli_fetch_array($ambilsemuadatakeluar)){
                                        $i++;
                                        $idbarangnya = $data['idbarang'];
                                        $tglkeluar = $data['tanggalkeluar'];
                                        $ktgbarang = $data['ktgbarang'];
                                        $namabarang = $data['namabarang'];
                                        $spesifikasi = $data['spesifikasi'];
                                        $penerima = $data['penerimabk'];
                                        $kodebarang = $data['kodebarang'];
                                        $bahanrangkabarang = $data['bahanrangkabarangbk'];
                                        $sumberdana = $data['sumberdanabk'];
                                        $tahun = $data['tahunbk'];
                                        $kondisibarang = $data['kondisibarangbk'];
                                        $qty = $data['qty'];
                                        $hargasatuan = $data['hargasatuan'];
                                        $hargatotal = $data['hargatotalbk'];
                                        $keterangan = $data['keteranganbk'];
                                        $gambarbarang = $data['gambarbarangbk'];
                                        if($gambarbarang==null){
                                            $gambarbarang = 'No Photo';   
                                        } else {
                                            $gambarbarang = '<img src= "imagein/'.$gambarbarang.'" width="100"  class = "zoomable">';
                                        }
                                    
                                    
                                    ?>
                                    <tr>

                                        <td><?=$tglkeluar?></td>
                                        <td><?=$kodebarang?></td>
                                        <td><?=$ktgbarang?></td>
                                        <td><?=$namabarang?></td>
                                        <td><?=$spesifikasi?></td>
                                        <td><?=$penerima?></td>
                                        <td><?=$bahanrangkabarang?></td>
                                        <td><?=$sumberdana?></td>
                                        <td><?=$tahun?></td>
                                        <td><?=$kondisibarang?></td>
                                        <td><?=$qty?></td>
                                        <td><?=$hargasatuan?></td>
                                        <td><?=$hargatotal?></td>
                                        <td><?=$gambarbarang?></td>
                                        <td><?=$keterangan?></td>
                                        <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idb;?>">
                                 Edit
                                </button>
                                
                               
                                <input type ="hidden" name= "idbarangyangmaudihapus" value="<?=$idb;?>">
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
                                    <select name="barangnya" class="form-control">;
                                    <br>
                                        <?php
                                        $ambilsemuadatanya = mysqli_query($conn, "select * from stock");
                                        while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                                            $namabarangnya = $fetcharray['namabarang'];
                                            $idbarangnya = $fetcharray['idbarang'];
                                            ?>
                                            <option value="<?=$idbarangnya;?>"><?=$namabarangnya;?></option>
                                            <?php
                                        }
                                        ?>
                                        </select>
                                        <br>
                                    <b>Tanggal Keluar :</b>
                                    <br>
                                    <input type="date" name="tanggalkeluar" value="<?=$tglkeluar;?>" class="form-control">
                                    <br>   
                                    <input type="text" name="kodebarang" placeholder="kodebarang"value="<?=$kodebarang;?>" class="form-control">
                                    <br>
                                    <input type="text" name="ktgbarang" placeholder="kategori" value="<?=$ktgbarang;?>" class="form-control">
                                    <br>
                                    <input type="text" name="spesifikasi" placeholder="spesifikasi" value="<?=$spesifikasi;?>" class="form-control">
                                    <br>
                                    <input type="text" name="penerimabk" placeholder="penerima" value="<?=$penerima;?>" class="form-control">
                                    <br>
                                    <input type="text" name="bahanrangkabarangbk" placeholder="bahan rangka barang" value="<?=$bahanrangkabarang;?>" class="form-control">
                                    <br>
                                    <input type="text" name="sumberdanabk" placeholder="sumber dana" value="<?=$sumberdana?>" class="form-control">
                                    <br>
                                    <b>Tahun :</b>
                                    <br>
                                    <input type="number" name="tahunbk" value="<?=$tahun;?>" class="form-control">
                                    <br>
        <b>Kondisi Barang :</b>
        <br>
        <div class="form-label-group">
        <select class= "form-control" name="kondisibarangbk">
                      <option value="Baru">Baru</option>
                      <option value="Bekas">Bekas</option>
                      <option value="Rusak Berat">Rusak Berat</option>
                  </select>    
                  <br>
                  <input type="number" name="qty" class="form-control" placeholder="Quantity" value="<?=$qty;?>">
                                    <br>
                                    <input type="number" name="hargasatuan" placeholder="harga satuan" value="<?=$hargasatuan;?>" class="form-control">
                                    <br>
                                    <input type="number" name="hargatotalbk" placeholder="harga total" value="<?=$hargatotal;?>" class="form-control">
                                    <br>
                                    <input type="text" name="keteranganbk" placeholder="keterangan" value="<?=$keterangan;?>" class="form-control">
                                    <br>
                                    <input type="file" name="file"class="form-control">
                                    <br>
                                    <input type="hidden" name="idkeluar" value="<?=$i;?>">
                                    <br>
                                    <input type="hidden" name="idbarang" value="<?=$idb;?>">
                                    <br>
                                    <button type="submit" class="btn btn-primary" name="updatebarangkeluar">Submit</button>
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
                                    <b>Yakin Hapus data dari <?=$namabarangnya;?> nya?</b>
                                    <br>
                                    <input type="hidden" name="idbarang" value=<?=$idb;?>">
                                    <input type="hidden" name="qty" value=<?=$qty;?>">
                                    <br>
                                    <button type="submit" class="btn btn-danger"name="hapusbarangkeluar">Hapus</button>
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
</body>
 


<div class="container">


     <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Barang Keluar</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method ="post" enctype="multipart/form-data">
        <div class="modal-body">
        <select name="barangnya" class="form-control">;
        <br>
            <?php
            $ambilsemuadatanya = mysqli_query($conn, "select * from stock");
            while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                $namabarangnya = $fetcharray['namabarang'];
                $idbarangnya = $fetcharray['idbarang'];
                ?>
                <option value="<?=$idbarangnya;?>"><?=$namabarangnya;?></option>
                <?php
            }
            ?>
            </select>
            <br>
            <b>Tanggal Keluar :</b>
            <br>
            <input type="date" name="tanggalkeluar" placeholder="Tanggal Keluar" class="form-control"required>
        <br>
            <input type="text" name="kodebarang" placeholder="Kode barang" class="form-control"required>
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
        <input type="text" name="penerimabk" placeholder="Penerima" class="form-control"required>
        <br>
        <input type="text" name="bahanrangkabarangbk" placeholder="Bahan / Rangka" class="form-control">
        <br>
        <input type="text" name="sumberdanabk" placeholder="Sumber Dana" class="form-control"required>
        <br>
        <b>Tahun :</b>
        <br>
        <div class="form-label-group">
        <select class= "form-control" name="tahunbk">
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
        <select class= "form-control" name="kondisibarangbk">
                      <option value="Baru">Baru</option>
                      <option value="Bekas">Bekas</option>
                      <option value="Rusak Berat">Rusak Berat</option>
                  </select>    
                  <br> 
                                    <div class="perhitungan">
        <b>Quantity :</b>          
        <br>
        <input type="text" name="qty"id="qty">
        <br>
        <br>
        <b>Harga Satuan :</b>
        <br>
        <input type="text" name="hargasatuan" id="hargasatuan" >
        <br>
        <br>
        <b>Harga Total :</b>
        <br>
        <input type="text" name="hargatotalbk" id= "hargatotalbk">
        <br>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script type="text/javascript">
            $(".perhitungan").keyup(function(){
                var qty = parseInt($("#qty").val())
                var hargasatuanbk = parseInt($("#hargasatuan").val())

                var hargatotalbk = qty * hargasatuanbk;
                $("#hargatotalbk").attr("value",hargatotalbk)
            });
            </script>
            <br>
        <input type="text" name="keteranganbk" placeholder="Keterangan" class="form-control">
        <br>
        <input type="file" name="file" class="form-control"required>
        <br>
        <input type="hidden" name="idkeluar" value="<?=$i++;?>">
        <br>
        <?php
            $ambilsemuadatanya = mysqli_query($conn, "select * from stock");
            while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                $idbarangnya = $fetcharray['idbarang'];
                
                ?>
                <input type="hidden" name="idbarang" value="<?=$idbarangnya;?>">
        <?php
            }
            ?>
             <?php
            $ambilsemuadatanya = mysqli_query($conn, "select * from stock");
            while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                $namabarangnya = $fetcharray['namabarang'];
                
                ?>
                <input type="hidden" name="namabarang" value="<?=$namabarangnya;?>">
        <?php
            }
            ?>
            <button type="submit" class="btn btn-primary"name="barangkeluar">Submit</button>
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