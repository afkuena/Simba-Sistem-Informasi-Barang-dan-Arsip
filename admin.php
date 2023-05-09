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
        <title>Kelola Admin</title>
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

                        <li><hr class="dropdown-divider" /></li>
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
                       <a class="sb-sidenav-menu-heading"><h5>Sistem Informasi Barang dan Arsip</h5></a>
                            <div class="sb-sidenav-menu-heading"><h5>Menu</h5></div>
                 
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
                        <h1 class="mt-4">Data User</h1>
                
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                 Tambah User
                                </button>
                                <i class="fas fa-table me-1"></i>
                                Data User
                            </div>
                            <div class="card-body">
                                <table class="table table-condensed" id="datatablesSimple" width= "75%" cellspacing= "0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Nama Lengkap</th>
                                            <th>Password</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>

                                    <?php
                                    $ambilsemuadataadmin = mysqli_query($conn, "select * from admin");
                                    $i = 1;
                                    while($data=mysqli_fetch_array($ambilsemuadataadmin)){
                                        $i= $i++;
                                        $iduser = $data['iduser'];
                                        $user = $data['user'];
                                        $namalengkap = $data['nama_lengkap'];
                                        $password = $data['password'];
                                        $level = $data['level'];
                                    
                                    
                                    ?>
                                    <tr>

                                        <td><?=$iduser;?></td>
                                        <td><?=$user?></td>
                                        <td><?=$namalengkap?></td>
                                        <td><?=$password?></td>
                                        <td><?=$level?></td>
                                        <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$iduser;?>">
                                 Edit
                                </button>
                                <input type ="hidden" name= "iduseryangmaudihapus" value="<?=$iduser;?>">
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$iduser;?>">
                                 Delete
                                </button>
                                    </td>

                                    </tr>
                                    <!-- Edit Modal -->
                                <div class="modal fade" id="edit<?=$iduser;?>">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                        
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Menu Edit User</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    
                                    <!-- Modal body -->
                                    <form method ="post">
                                    <div class="modal-body">
                                    <input type="text" name="user" value="<?=$user;?>" class="form-control">
                                    <br>
                                    <input type="text" name="nama_lengkap" value="<?=$namalengkap;?>" class="form-control">
                                    <br>
                                    <input type="text" name="password" value="<?=$password;?>" class="form-control">
                                    <br>
                                    <input type="text" name="level" value="<?=$level;?>" class="form-control">
                                    <br>
                                    <input type="hidden" name="iduser" value=<?=$iduser;?>">
                                    <br>
                                    <button type="submit" class="btn btn-primary"name="updateadmin">Submit</button>
                                    </div>
                            </div>
                    </form>
                    
             
      </div>
    </div>
  </div>
  
                                     <!-- Delete Modal -->
                                    <div class="modal fade" id="delete<?=$iduser;?>">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                        
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Hapus User?</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    
                                    <!-- Modal body -->
                                    <form method ="post">
                                    <div class="modal-body">
                                    <b>Yakin Om Mau di Hapus User <?=$user;?> nya?</b>
                                    <br>
                                    <input type="hidden" name="iduser" value=<?=$iduser;?>">
                                    <br>
                                    <button type="submit" class="btn btn-danger"name="hapusadmin">Yakin Hapus</button>
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

<div class="container">


     <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method ="post" enctype="multipart/form-data">
        <div class="modal-body">
        <input type="text" name="user" placeholder="Admin User" class="form-control"required>
        <br>
        <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="form-control"required>
        <br>
        <input type="password" name="password" placeholder="Password" class="form-control"required>
        <br>
        <div class="form-label-group">
        <select class= "form-control" name="level">
                      <option value="Admin">Admin</option>
                      <option value="Pegawai">Pegawai</option>
                      <option value="Supplier">Supplier</option>
                      <option value="Arsip">Arsip</option>
                  </select>
        
        <br>
        <input type="submit" class="btn btn-primary"name="tambahadmin"></button>
        <br>
        <input type="hidden" name="iduser" value=<?=$i;$i++?>>
        <br>
        </div>
        </form>
        
        
        </div>
        </div>
    </div>

</div>

            </div>
        </div>
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
