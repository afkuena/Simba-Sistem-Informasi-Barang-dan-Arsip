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

       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
                            <div class="sb-sidenav-menu-heading"><h6>E-Arsip</h6></div>
                            <div class="sb-sidenav-menu-heading"><h6>Penyimpanan Arsip File</h6></div>
                
                            <a class="nav-link" href="bid_Akuntansi.php">
                                <div class="sb-nav-link-icon"><i class="glyphicon glyphicon-save"></i></div>
                                Bidang Akuntansi
                            </a>
                        </div>
                    </div>
                    
                </nav>
            </div>>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Data Arsip Bidang Akuntansi</h3>
                        <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" data-backdrop="static" >
                                 Unggah file
                                </button>
                                
                        </div>
                            
                            <div class="card-body">
                            <div class="table-responsive">
                            <table class="table-bordered" id="datatablesSimple" width= "75%" cellspacing= "0">
                                <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama File</th>
                                            <th>Di Unggah Oleh</th>
                                            <th>Waktu</th>
                                            <th>Berkas</yh>
                                            <th>keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                        <?php
                                                        
                                                        $ambilsemuadataarsip = mysqli_query($conn, "SELECT * FROM data_arsip WHERE bidang='Akuntansi'");
                                                        $i= 1;
                                                        
                                                        while($data=mysqli_fetch_array($ambilsemuadataarsip)){
                                                            $i= $i++;
                                                            $idfile = $data['idberkas'];
                                                            $namafile = $data ['namaberkas'];
                                                            $nm_pengunggah = $data['nm_pengunggah'];
                                                            $waktu = $data['wkt_unggah'];
                                                            $berkas = $data["berkas"];
                                                            if($berkas==null){
                                                                $berkas = 'Kosong';   
                                                            } else {
                                                                $berkas = "$berkas";
                                                            }
                                                            $keteranganfile = $data['keterangan_berkas'];

                                                        ?>

                                                        <tr>

                                                            <td><?=$i;$i++;?></td>
                                                            <td><?=$namafile?></td>
                                                            <td><?=$nm_pengunggah?></td>
                                                            <td><?=$waktu?></td>
                                                            <td><?=$berkas?></td>
                                                            <td><?=$keteranganfile?></td>
                                                            <td>
                                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idfile;?>">
                                                        Hapus
                                                        </button>
                                                        <button type="button" class="btn btn-warning"><a href="downloadfile.php?fileakun=<?=$data['berkas'];?>">Unduh</a></button>
                                                        </div>
                                                         </td>
                                                        </tr>    
                                                        
                                                        
                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="edit<?=$idfile;?>">
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
                                    <input type="text" name="namaberkas" value="<?=$namafile;?>" placeholder="Nama Berkas" class="form-control">
                                    <br>
                                    <input type="text" name="nm_pengunggah" value="<?=$nm_pengunggah;?>" placeholder="Nama Pengunggah" class="form-control">
                                    <br>
                                    <input type="date" name="wkt_unggah" value="<?=$waktu;?>" placeholder="Waktu" class="form-control">
                                    <br>
                                    <input type="text" name="keterangan_berkas" value="<?=$keteranganfile;?>" placeholder="Keterangan Berkas" class="form-control">
                                    <br>
                                    <input type="hidden" name="idberkas" value="<?=$idfile;?>">
                                    <br>
                                    <input type="file" name="file" class="form-control">
                                    <br>
                                    <button type="submit" class="btn btn-primary" name="updateberkas">Ubah</button>
                                    
                            </div>
                    </form>

        </div>
    </div>
  </div>
                                    
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delete<?=$idfile;?>">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                        
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Hapus berkas</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    
                                    <!-- Modal body -->
                                    <form method ="POST">
                                    <div class="modal-body">
                                    <b>Hapus Berkas <?=$namafile;?> nya?</b>
                                    <br>
                                    <input type="hidden" name="idberkas" value=<?=$idfile;?>>
                                    <br>
                                    <button type="Submit" class="btn btn-danger" name="hapusberkas">Hapus</button>
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
                                <?php
            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
            $ambilsemuadatafile = mysqli_query($conn, "SELECT idberkas from data_arsip where idberkas = '$idfile' ");
                while($fetch=mysqli_fetch_array($ambilsemuadatafile)){
                   
                
         ?>

     <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>SUKSES !</strong> Perintah yang kamu inginkan sudah terlaksana, Terimakasih telah menggunakan Aplikasi SIMBA.
        </div>   
        <script src="js/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 4000);
    });    
</script>
        <?php
      }
        ?>
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

<!-- Form Input------->
     <!-- The Modal -->
     <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Unggah Berkas Bidang Akuntansi</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method ="post" enctype="multipart/form-data">
        <div class="modal-body">
        <input type="text" name="namaberkas" placeholder="Nama Berkas" class="form-control"required> 
        <br>
        <b>Diunggah oleh :</b>
        <br>
        <div class="form-label-group">
        <select class= "form-control" name="nm_pengunggah">;
                      <option value="Kepala Bidang Akuntasi">Kepala Bidang Akuntasi</option>
                      <option value="Kepala Sub Bidang Pelaporan Keuangan Daerah">Kepala Sub Bidang Pelaporan Keuangan Daerah</option>
                      <option value="Penata Laporan Keuangan">Penata Laporan Keuangan</option>
                      <option value="Analis Keuangan">Analis Keuangan</option>
                      <option value="Sub Koordinator Kelompok Sub Substansi Pembukuan dan Pelaporan">Sub Koordinator Kelompok Sub Substansi Pembukuan dan Pelaporan</option>
                      <option value="Kepala Sub Bidang Pembinaan Akuntansi Perangkat Daerah">Kepala Sub Bidang Pembinaan Akuntansi Perangkat Daerah</option>
                      <option value="Pengelola Data">Analis Keuangan</option>
                  </select>
            <br>
        <input type="date" name="wkt_unggah" placeholder="Waktu Unggah" class="form-control"required>
        <br>         
        <input type="text" name="keterangan_berkas" placeholder="Keterangan" class="form-control">
        <br>
        <input type="hidden" name="idberkas" value=<?=$i;$i++?>>
        <br>
        <input type="hidden" name="bidang" value="Akuntansi">
        <br>
        <input type="file" id="file" name="file"  class="form-control"required>
        <br>
        <button type="submit"  id="uploadBtn" class="btn btn-primary" name="Unggahakuntansi"><U>Unggah</U></button>
        </div>
        <br>
        <div class="progress">
            <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
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

        <script>

  $(function() {
    $('#uploadBtn').click(function() {
      var fileData = $('#file').prop('files')[0];
      var formData = new FormData();
      formData.append('file', fileData);
      $.ajax({
        url: '/berkas_akuntansi',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        xhr: function() {
          var xhr = new window.XMLHttpRequest();
          xhr.upload.addEventListener('progress', function(evt) {
            if (evt.lengthComputable) {
              var percentComplete = evt.loaded / evt.total;
              percentComplete = parseInt(percentComplete * 100);
              $('#progressBar').width(percentComplete + '%');
              $('#progressBar').attr('aria-valuenow', percentComplete);
              $('#progressBar').text(percentComplete + '%');
            }
          }, false);
          return xhr;
        },
        success: function(res) {
          console.log(res);
        },
        error: function(err) {
          console.error(err);
        }
      });
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