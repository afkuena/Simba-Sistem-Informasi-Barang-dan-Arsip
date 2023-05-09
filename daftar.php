<?php
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
        <title>Daftar User</title>
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
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-black">
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
                
                            <a class="nav-link" href="daftar.php">
                                <div class="sb-nav-link-icon"><i class="glyphicon glyphicon-shopping-cart"></i></div>
                                Form Daftar
                            </a>
                            
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
            <div class="sb-sidenav-footer">
                </nav>
            </div>
            <div id="layoutSidenav_content">
            <body>
                <main>
                    <div class="container-fluid px-5">
                        <h3 class="mt-4">Form Input Data User</h3>
                        <div class="card mb-4">
                        <div class="card text-center">
  <div class="card-header bg-primary text-white">
    Input Data
  </div>
     <div class="card-body"> 
    <form method="post">
    <div class="col-md-6 mb-3">
      <label for="Inputusername">Username :</label>
      <input type="text" name="username" class="form-control" id="Inputusername"  placeholder="Username">
    </div>
    <div class="col-md-6 mb-3">
      <label for="Inputnama">Nama Lengkap :</label>
      <input type="text" name="nama_lengkap" class="form-control" id="Inputnama"  placeholder="Nama Lengkap">
    </div>
    <div class="col-md-6 mb-3">
      <label for="Inputpassword">Password yang akan dibuat :</label>
      <input type="text" name="password" class="form-control" id="Inputpassword"  placeholder="Password">
    </div>
  
    <div class="col-md-6 mb-3">
      <label for="level">Pilih Level Akses User :</label>
      <select class= "form-control" name="level">
	  <option value="">---</option>
                      <option value="Admin">Admin</option>
					  <option value="Pegawai">Pegawai</option>
					  <option value="Supplier">Supplier</option>
                      <option value="Arsip Sekretariat">Arsip Sekretariat</option>
                      <option value="Arsip Anggaran">Arsip Anggaran</option>
                      <option value="Arsip Perbendaharaan">Arsip Perbendaharaan</option>
                      <option value="Arsip Aset">Arsip Aset</option>
                      <option value="Arsip Akuntansi">Arsip Akuntansi</option>
                  </select>
    </div>
    <br>
    <?php
                                        $ambilsemuadatanya = mysqli_query($conn, "SELECT * FROM daftaruser");
                                        $i= 1;
                                        while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                                            $id = $fetcharray['no_urut'];
                                            ?>
										<input type="hidden" name="no_urut" value="<?=$i;$i++;?>">
										<?php
                                        }
                                        ?>
    <br>
  <button type="submit" class="btn btn-primary"name="daftaruser">Ajukan User</button>
  <button type="button" class="btn btn-warning"><a href="index.php">Keluar</a></button>
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
                <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
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
    </body>
</html>
