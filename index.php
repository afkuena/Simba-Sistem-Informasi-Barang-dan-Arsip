
<?php
require 'function.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
	<link rel="shortcut icon" href="iconsimba.ico">
    <title>SIMBA | BPKAD</title>
    <link rel="stylesheet" href="css/fakeLoader.css">

    

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="assets/dist/css/floating-labels.css" rel="stylesheet">
  </head>
  <body>
  <div class="fakeLoader"></div>
<form class="form-signin" method= "post" action= "cek.php">
  <div class="text-center mb-4">
    <img class="mb-4" src="assets/img/logosimba.png" alt="" width="72" height="72">
    <h1 class="h3 mb-4 font-weight-normal"><strong>SISTEM INFORMASI BARANG DAN ARSIP</strong></h1>
    <p><a>Masukan Username dan Password Anda!</a></p>
  </div>

  <div class="form-label-group">
  <input class="form-control" name="user" id="inputuser" type="user" placeholder="name" />
     <label for="inputuser">Username</label>
  </div>

  <div class="form-label-group">
  <input class="form-control" name="password" id="inputPassword" type="password" placeholder="password" />
      <label for="inputPassword">Password</label>
  </div>

  <!-- level User ---->
  <div class="form-label-group">
                  <select class= "form-control" name="level">
                      <option value="Pegawai">Pegawai</option>
                      <option value="Admin">Admin</option>
                      <option value="Supplier">Supplier</option>
                      <option value="Arsip Sekretariat">Arsip Sekretariat</option>
                      <option value="Arsip Anggaran">Arsip Anggaran</option>
                      <option value="Arsip Perbendaharaan">Arsip Perbendaharaan</option>
                      <option value="Arsip Aset">Arsip Aset</option>
                      <option value="Arsip Akuntansi">Arsip Akuntansi</option>
                  </select>
</div>
<div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Ingat Saya
    </label>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
  <button type="button" class="btn btn-lg btn-warning btn-block"><a href="daftar.php">Daftar</a></button>
  <p class="mt-5 mb-3 text-muted text-center">Version.1.2</p>
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2023</p>
</form>


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
    
  </body>
</html>
