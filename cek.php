<?php
// panggil koneksi data base //
include "koneksi.php";


$conn = mysqli_connect("localhost","root","","simba");
$pass = $_POST['password'];
$user = mysqli_escape_string($conn, $_POST['user']);
$password = mysqli_escape_string($conn, $pass);
$level = mysqli_escape_string($conn, $_POST['level']);

// cek username, terdaftar atau tidak
$cek_user = mysqli_query($conn, "SELECT * from admin where user = '$user' and level='$level'");
$user_valid = mysqli_fetch_array($cek_user);
//uji jika username terdaftar
if($user_valid){
    //jika username terdaftar
    //cek password sesuai atau tidak
    if($password == $user_valid['password']){
        //jika password sesuai
        //buat session
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['user'] = $user_valid['user'];
        $_SESSION['nama_lengkap'] = $user_valid['nama_lengkap'];
        $_SESSION['level'] = $user_valid['level'];
       

        //uji level

        if($level == "Pegawai"){
            header ('location:home_pegawai.php');
        } elseif ($level == "Admin"){
            header('location:dashboard_admin.php');
        }elseif ($level == "Supplier"){
            header ('location:list_supplier.php');
        }elseif ($level == "Arsip Sekretariat"){
            header ('location:dashboard_sekret.php');
        }elseif ($level == "Arsip Anggaran"){
            header ('location:dashboard_anggaran.php');
        }elseif ($level == "Arsip Perbendaharaan"){
            header ('location:dashboard_perbendaharaan.php');
        }elseif ($level == "Arsip Aset"){
            header ('location:dashboard_aset.php');
        }elseif ($level == "Arsip Akuntansi"){
            header ('location:dashboard_akuntansi.php');
        }
    }else{
        echo"<script>alert('Maaf, Login Gagal, Password anda tidak sesuai!');document.location='index.php'</script>";
    }
}else{
    echo"<script>alert('Maaf, Login Gagal, Username anda tidak terdaftar!');document.location='index.php'</script>";
}

?>