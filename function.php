<?php
$conn = mysqli_connect("localhost","root","","simba");


if(isset($_POST ['addnewbarang'])){
    $i = $_POST['idbarang'];
    $nilaikontraknya = $_POST['nilaikontrak'];
    $namacv= $_POST['namacv'];
    $namabarang = $_POST['namabarang'];
    $ktgbarang = $_POST['ktgbarang'];
    $spesifikasi =$_POST['spesifikasi'];
    $stock = $_POST['stock'];
    $bahanrangkabarang = $_POST['bahanrangkabarang'];
    $sumberdana = $_POST['sumberdana'];
    $tahun = $_POST['tahun'];
    $kodebarang = $_POST['kodebarang'];
    $kondisibarang = $_POST['kondisibarang'];
    $hargasatuan = $_POST['hargasatuan'];
    $hargatotal = $_POST['hargatotal'];
    $keterangan = $_POST['keterangan'];
    $penerima = $_POST['penerima'];

    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $gambarbarang = $_POST["gambar"];
    $file_name = $_FILES["file"]["name"];
    $tmp_name = $_FILES["file"]["tmp_name"];
    move_uploaded_file($tmp_name, "image/".$file_name);

    $nilaikontrak = mysqli_query($conn, "SELECT * from datasupplier  where idsupplier= '$idsupplier' ");
    $ambildatanya = mysqli_fetch_array($nilaikontrak);

    $nilaikontrakskrg = $ambildatanya['nilaikontrak'];
    $kuranginilaikontrak = $nilaikontrakskrg-$hargatotal;

            $updatenilaikontrak = mysqli_query($conn,"UPDATE datasupplier set nilaikontrak = '$kuranginilaikontrak' where idsupplier= '$idsupplier' ");
            

    $addtotable = mysqli_query ($conn,"INSERT into stock (idbarang, namacv, kodebarang, ktgbarang, namabarang, spesifikasi, hargasatuan, stock, bahanrangkabarang, sumberdana, tahun, kondisibarang, hargatotal, penerima, gambar, keterangan) values ('$i','$namacv','$kodebarang','$ktgbarang','$namabarang','$spesifikasi','$hargasatuan','$stock','$bahanrangkabarang', '$sumberdana', '$tahun',  '$kondisibarang','$hargatotal','$penerima', '$file_name','$keterangan' )");
    if($addtotable){
        header('Location: home_admin.php');
    } else {
        echo 'Gagal';
        header('Location: home_admin.php');
    }
            
     
};

if(isset($_POST ['barangmasuk'])){

    $i= $_POST['idmasuk'];
    $idbarangnya= $_POST['idbarang'];
    $namabarangnya = $_POST['namabarang'];
    $tglmasuk = $_POST['tanggalmasuk'];
    $spesifikasi = $_POST['spesifikasi'];
    $ktgbarang = $_POST['ktgbarang'];
    $bahanrangkabarang = $_POST['bahanrangkabarangbm'];
    $sumberdana = $_POST['sumberdanabm'];
    $tahun = $_POST['tahunbm'];
    $kodebarang = $_POST['kodebarang'];
    $kondisibarang = $_POST['kondisibarangbm'];
    $hargasatuan = $_POST['hargasatuan'];
    $hargatotal = $_POST['hargatotalbm'];
    $keterangan = $_POST['keteranganbm'];
    $penerima = $_POST['penerimabm'];
    $qty = $_POST['qty'];

    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $gambarbarang = $_POST["gambarbarangbm"];
    $file_name = $_FILES["file"]["name"];
    $tmp_name = $_FILES["file"]["tmp_name"];
    move_uploaded_file($tmp_name, "imagein/".$file_name);

    $sql = "SELECT MAX(idmasuk) as nilai_terakhir FROM masuk";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    // mengambil nilai terakhir dari kolom primary key
    $nilai_terakhir = $row['nilai_terakhir'];
    
    // meng-generate nilai primary key yang baru
    $i = $nilai_terakhir + 1;




    $cekstocksekarang = mysqli_query($conn, "SELECT * from stock where idbarang= '$idbarangnya' ");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);
    $totalsekarang = mysqli_query($conn, "SELECT * from stock where idbarang= '$idbarangnya' ");
    $ambildatanya = mysqli_fetch_array($totalsekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahkanstocksekarangdenganquantity = $stocksekarang+$qty;
    $totalsekarang = $ambildatanya['hargatotal'];
    $tambahkantotalsekarangdenganhargatotal = $totalsekarang+$hargatotal;

    $addtomasuk = mysqli_query($conn, "INSERT into masuk ( idmasuk, idbarang, namabarang, kodebarang, ktgbarang, spesifikasi, hargasatuan, tanggalmasuk, penerimabm, qty, gambarbarangbm, bahanrangkabarangbm, sumberdanabm, tahunbm, kondisibarangbm, hargatotalbm, keteranganbm) values ('$i','$idbarangnya','$namabarangnya','$kodebarang','$ktgbarang','$spesifikasi','$hargasatuan','$tglmasuk','$penerima','$qty', '$file_name','$bahanrangkabarang', '$sumberdana', '$tahun', '$kondisibarang','$hargatotal','$keterangan')");
    $updatestockmasuk = mysqli_query($conn,"UPDATE stock set stock = '$tambahkanstocksekarangdenganquantity' where idbarang = '$idbarangnya' ");
    $updatestockmasuk = mysqli_query($conn,"UPDATE stock set hargatotal = '$tambahkantotalsekarangdenganhargatotal' where idbarang = '$idbarangnya' ");
    
};

if(isset($_POST ['barangkeluar'])){

    $i = $_POST['idkeluar'];
    $idbarangnya= $_POST['idbarang'];
    $barangnya = $_POST['barangnya'];
    $namabarang = $_POST['namabarang'];
    $tglkeluar = $_POST['tanggalkeluar'];
    $spesifikasi = $_POST['spesifikasi'];
    $ktgbarang = $_POST['ktgbarang'];
    $bahanrangkabarang = $_POST['bahanrangkabarangbk'];
    $sumberdana = $_POST['sumberdanabk'];
    $tahun = $_POST['tahunbk'];
    $kodebarang = $_POST['kodebarang'];
    $kondisibarang = $_POST['kondisibarangbk'];
    $hargasatuan = $_POST['hargasatuan'];
    $hargatotal = $_POST['hargatotalbk'];
    $keterangan = $_POST['keteranganbk'];
    $penerima = $_POST['penerimabk'];
    $qty = $_POST['qty'];

    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $gambarbarang = $_POST["gambarbarangbk"];
    $file_name = $_FILES["file"]["name"];
    $tmp_name = $_FILES["file"]["tmp_name"];
    move_uploaded_file($tmp_name, "imageout/".$file_name);

    $sql = "SELECT MAX(idkeluar) as nilai_terakhir FROM keluar";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    // mengambil nilai terakhir dari kolom primary key
    $nilai_terakhir = $row['nilai_terakhir'];
    
    // meng-generate nilai primary key yang baru
    $i = $nilai_terakhir + 1;

    $cekstocksekarang = mysqli_query($conn, "SELECT * from stock where idbarang= '$idbarangnya' ");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);
    $totalsekarang = mysqli_query($conn, "SELECT * from stock where idbarang= '$idbarangnya' ");
    $ambildatanya = mysqli_fetch_array($totalsekarang);

    $stocksekarang = $ambildatanya['stock'];
    if($stocksekarang >= $qty){
    $kurangistocksekarangdenganquantity = $stocksekarang-$qty;
    $totalsekarang = $ambildatanya['hargatotal'];
    $kurangitotalsekarangdenganhargatotal = $totalsekarang-$hargatotal;

    $addtokeluar = mysqli_query($conn, "INSERT into keluar (idkeluar, idbarang, namabarang, kodebarang, ktgbarang, spesifikasi, hargasatuan, tanggalkeluar, penerimabk, qty, gambarbarangbk, bahanrangkabarangbk, sumberdanabk, tahunbk, kondisibarangbk, hargatotalbk, keteranganbk) values ('$i','$idbarangnya','$namabarang','$kodebarang','$ktgbarang','$spesifikasi','$hargasatuan','$tglkeluar','$penerima','$qty', '$file_name','$bahanrangkabarang', '$sumberdana', '$tahun', '$kondisibarang','$hargatotal','$keterangan')");
    $updatestockkeluar = mysqli_query($conn,"UPDATE stock set stock = '$kurangistocksekarangdenganquantity' where idbarang = '$idbarangnya' ");
    $updatestockeluar = mysqli_query($conn,"UPDATE stock set hargatotal = '$kurangitotalsekarangdenganhargatotal' where idbarang = '$idbarangnya' ");

} 

};

//update barang

if(isset($_POST ['updatebarang'])){
    $idb = $_POST['idbarang'];
    $namabarang = $_POST['namabarang'];
    $ktgbarang = $_POST['ktgbarang'];
    $spesifikasi =$_POST['spesifikasi'];
    $stock = $_POST['stock'];
    $bahanrangkabarang = $_POST['bahanrangkabarang'];
    $sumberdana = $_POST['sumberdana'];
    $tahun = $_POST['tahun'];
    $kodebarang = $_POST['kodebarang'];
    $kondisibarang = $_POST['kondisibarang'];
    $hargasatuan = $_POST['hargasatuan'];
    $hargatotal = $_POST['hargatotal'];
    $keterangan = $_POST['keterangan'];
    $penerima = $_POST['penerima'];

    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $gambarbarang = $_POST["gambar"];
    $file_name = $_FILES["file"]["name"];
    $tmp_name = $_FILES["file"]["tmp_name"];
    move_uploaded_file($tmp_name, "image/".$file_name);

    $update = mysqli_query($conn,"UPDATE stock set idbarang = '$idb',kodebarang ='$kodebarang', ktgbarang='$ktgbarang', spesifikasi = '$spesifikasi', hargasatuan = '$hargasatuan', stock = '$stock', gambar = '$file_name', bahanrangkabarang = '$bahanrangkabarang', sumberdana ='$sumberdana', tahun ='$tahun', kondisibarang = '$kondisibarang', hargatotal = '$hargatotal', keterangan='$keterangan', penerima = '$penerima' where idbarang = '$idb'");
    
};

if(isset($_POST ['hapusbarang'])){
    $idb = $_POST['idbarang'];

    $update = mysqli_query($conn,"DELETE from stock where idbarang = '$idb'");
    $update = mysqli_query($conn,"DELETE from masuk where idbarang = '$idb'");
    $update = mysqli_query($conn,"DELETE from keluar where idbarang = '$idb'");


   

};

if(isset($_POST ['updatebarangmasuk'])){
 
    $idbarangnya = $_POST['idbarang'];
    $barangnya = $_POST['barangnya'];
    $tglmasuk = $_POST['tanggalmasuk'];
    $spesifikasi = $_POST['spesifikasi'];
    $ktgbarang = $_POST['ktgbarang'];
    $bahanrangkabarang = $_POST['bahanrangkabarangbm'];
    $sumberdana = $_POST['sumberdanabm'];
    $tahun = $_POST['tahunbm'];
    $kodebarang = $_POST['kodebarang'];
    $kondisibarang = $_POST['kondisibarangbm'];
    $hargasatuan = $_POST['hargasatuan'];
    $hargatotal = $_POST['hargatotalbm'];
    $keterangan = $_POST['keteranganbm'];
    $penerima = $_POST['penerimabm'];
    $qty = $_POST['qty'];

    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $gambarbarang = $_POST["gambarbarangbm"];
    $file_name = $_FILES["file"]["name"];
    $tmp_name = $_FILES["file"]["tmp_name"];
    move_uploaded_file($tmp_name, "imagein/".$file_name);


    $lihatstock = mysqli_query($conn, "SELECT * from stock where idbarang = '$idbarangnya'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrg = $stocknya['stock'];

    $qtyskrg = mysqli_query($conn, "SELECT * from masuk where idbarang = '$idbarangnya'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['qty'];

    $totalsekarang = mysqli_query($conn, "SELECT * from stock where idbarang= '$idbarangnya' ");
    $ambildatanya = mysqli_fetch_array($totalsekarang);
    $totalsekarang = $ambildatanya['hargatotal'];

    $totalsekarangbm = mysqli_query($conn, "SELECT * from masuk where idbarang= '$idbarangnya' ");
    $ambildatanya = mysqli_fetch_array($totalsekarangbm);
    $totalsekarangbm = $ambildatanya['hargatotalbm'];

    if($qty>$qtyskrg){
        $selisih = $qty-$qtyskrg;
        $kurangin = $stockskrg+$selisih;
        $kuranginstocknya = mysqli_query($conn, "UPDATE stock set stock = '$kurangin' where idbarang ='$idbarangnya'");

        $selisihbm = $hargatotal-$totalsekarangbm;
        $kurangitotalsekarangdenganhargatotal = $totalsekarang+$selisihbm;
        $update = mysqli_query($conn,"UPDATE stock set hargatotal ='$kurangitotalsekarangdenganhargatotal' where idbarang = '$idbarangnya'");
        $updatenya = mysqli_query($conn, "UPDATE masuk set tanggalmasuk = '$tglmasuk',spesifikasi = '$spesifikasi', gambarbarangbm= '$file_name', kodebarang= '$kodebarang', hargasatuan= '$hargasatuan', hargatotalbm= '$hargatotal', bahanrangkabarangbm= '$bahanrangkabarang', sumberdanabm='$sumberdana', tahunbm='$tahun',kondisibarangbm= '$kondisibarang', qty= '$qty', keteranganbm='$keterangan', penerimabm= '$penerima' where idbarang = '$idbarangnya'");

    } else {
        $selisih = $qtyskrg-$qty;
        $kurangin = $stockskrg-$selisih;
        $kuranginstocknya = mysqli_query($conn, "UPDATE stock set stock = '$kurangin' where idbarang ='$idbarangnya'");

        $selisihbm = $totalsekarangbm-$hargatotal;
        $kurangitotalsekarangdenganhargatotal = $totalsekarang-$selisihbm;
        $update = mysqli_query($conn,"UPDATE stock set hargatotal ='$kurangitotalsekarangdenganhargatotal' where idbarang = '$idbarangnya'");
        $updatenya = mysqli_query($conn, "UPDATE masuk set tanggalmasuk = '$tglmasuk',spesifikasi = '$spesifikasi', gambarbarangbm= '$file_name', kodebarang= '$kodebarang', hargasatuan= '$hargasatuan', hargatotalbm= '$hargatotal', bahanrangkabarangbm= '$bahanrangkabarang', sumberdanabm='$sumberdana', tahunbm='$tahun',kondisibarangbm= '$kondisibarang', qty= '$qty', keteranganbm='$keterangan', penerimabm= '$penerima' where idbarang = '$idbaranganya'");
       
    }

};
if(isset($_POST ['hapusbarangmasuk'])){
    $idbarangnya = $_POST['idbarang'];
    $barangnya = $_POST['idbarang'];
    $qty = $_POST['qty'];


    $getdatastock = mysqli_query($conn, "SELECT * from stock where idbarang= '$idbarangnya'");
    $data = mysqli_fetch_array($getdatastock);
    $stock = $data['stock'];
    $totalsekarang = mysqli_query($conn, "SELECT * from stock where idbarang= '$idbarangnya' ");
    $ambildatanya = mysqli_fetch_array($totalsekarang);
    $totalsekarang = $ambildatanya['hargatotal'];
    $totalsekarangbm = mysqli_query($conn, "SELECT * from masuk where idbarang= '$idbarangnya' ");
    $ambildatanya = mysqli_fetch_array($totalsekarangbm);
    $totalsekarangbm = $ambildatanya['hargatotalbm'];

    $selisih = $stock-$qty;
    $kurangitotalsekarangdenganhargatotal = $totalsekarang-$totalsekarangbm;

    $update = mysqli_query($conn,"UPDATE stock set stock ='$selisih' where idbarang = '$idb'");
    $update = mysqli_query($conn,"UPDATE stock set hargatotal ='$kurangitotalsekarangdenganhargatotal' where idbarang = '$idb'");
    $hapusdata = mysqli_query($conn, "DELETE from masuk where idbarang= '$idb'");

}

if(isset($_POST ['updatebarangkeluar'])){

    $idb = $_POST['idbarang'];
    $barangnya = $_POST['barangnya'];
    $tglkeluar = $_POST['tanggalkeluar'];
    $spesifikasi = $_POST['spesifikasi'];
    $ktgbarang = $_POST['ktgbarang'];
    $bahanrangkabarang = $_POST['bahanrangkabarangbk'];
    $sumberdana = $_POST['sumberdanabk'];
    $tahun = $_POST['tahunbk'];
    $kodebarang = $_POST['kodebarang'];
    $kondisibarang = $_POST['kondisibarangbk'];
    $hargasatuan = $_POST['hargasatuan'];
    $hargatotal = $_POST['hargatotalbk'];
    $keterangan = $_POST['keteranganbk'];
    $penerima = $_POST['penerimabk'];
    $qty = $_POST['qty'];

    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $gambarbarang = $_POST["gambarbarangbk"];
    $file_name = $_FILES["file"]["name"];
    $tmp_name = $_FILES["file"]["tmp_name"];
    move_uploaded_file($tmp_name, "imageout/".$file_name);

    $lihatstock = mysqli_query($conn, "SELECT * from stock where idbarang = '$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrg = $stocknya['stock'];

    $qtyskrg = mysqli_query($conn, "SELECT * from keluar where idbarang = '$idb'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['qty'];

    $totalsekarang = mysqli_query($conn, "SELECT * from stock where idbarang= '$idb' ");
    $ambildatanya = mysqli_fetch_array($totalsekarang);
    $totalsekarang = $ambildatanya['hargatotal'];

    $totalsekarangbk = mysqli_query($conn, "SELECT * from keluar where idbarang= '$idb' ");
    $ambildatanya = mysqli_fetch_array($totalsekarangbk);
    $totalsekarangbk = $ambildatanya['hargatotalbk'];

    if($qty>$qtyskrg){
        $selisih = $qty-$qtyskrg;
        $kurangin = $stockskrg-$selisih;
        $kuranginstocknya = mysqli_query($conn, "UPDATE stock set stock = '$kurangin' where idbarang ='$idb'");

        $selisihbk = $hargatotal-$totalsekarangbk;
        $updatehargatotal = $totalsekarang-$selisihbk;
        $update = mysqli_query($conn,"UPDATE stock set hargatotal ='$updatehargatotal' where idbarang = '$idb'");
        $updatenya = mysqli_query($conn, "UPDATE keluar set tanggalkeluar = '$tglkeluar',spesifikasi = '$spesifikasi', gambarbarangbk= '$file_name', kodebarang= '$kodebarang', hargasatuan= '$hargasatuan', hargatotalbk= '$hargatotal', bahanrangkabarangbk= '$bahanrangkabarang', sumberdanabk='$sumberdana', tahunbk='$tahun',kondisibarangbk= '$kondisibarang', qty= '$qty', keteranganbk='$keterangan', penerimabk= '$penerima' where idbarang = '$idb'");

    } else {
        $selisih = $qtyskrg-$qty;
        $tambahin = $stockskrg+$selisih;
        $tambahinstocknya = mysqli_query($conn, "UPDATE stock set stock = '$tambahin' where idbarang ='$idb'");

        $selisihbk = $totalsekarangbk-$hargatotal;
        $updatehargatotal = $totalsekarang+$selisihbk;
        $update = mysqli_query($conn,"UPDATE stock set hargatotal ='$updatehargatotal' where idbarang = '$idb'");
        $updatenya = mysqli_query($conn, "UPDATE keluar set tanggalkeluar = '$tglkeluar',spesifikasi = '$spesifikasi', gambarbarangbk= '$file_name', kodebarang= '$kodebarang', hargasatuan= '$hargasatuan', hargatotalbk= '$hargatotal', bahanrangkabarangbk= '$bahanrangkabarang', sumberdanabk='$sumberdana', tahunbk='$tahun',kondisibarangbk= '$kondisibarang', qty= '$qty', keteranganbk='$keterangan', penerimabk= '$penerima' where idbarang = '$idb'");

    }
    
};
if(isset($_POST ['hapusbarangkeluar'])){
    $idb = $_POST['idbarang'];
    $barangnya = $_POST['idbarang'];
    $qty = $_POST['qty'];


    $getdatastock = mysqli_query($conn, "SELECT * from stock where idbarang= '$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stock = $data['stock'];
    $totalsekarang = mysqli_query($conn, "SELECT * from stock where idbarang= '$idb' ");
    $ambildatanya = mysqli_fetch_array($totalsekarang);
    $totalsekarang = $ambildatanya['hargatotal'];
    $totalsekarangbk = mysqli_query($conn, "SELECT * from keluar where idbarang= '$idb' ");
    $ambildatanya = mysqli_fetch_array($totalsekarangbk);
    $totalsekarangbk = $ambildatanya['hargatotalbk'];

    $selisih = $stock+$qty;
    $kurangitotalsekarangdenganhargatotal = $totalsekarang+$totalsekarangbk;

    $update = mysqli_query($conn,"UPDATE stock set stock ='$selisih' where idbarang = '$idb'");
    $update = mysqli_query($conn,"UPDATE stock set hargatotal ='$kurangitotalsekarangdenganhargatotal' where idbarang = '$idb'");
    $hapusdata = mysqli_query($conn, "DELETE from keluar where idbarang= '$idb'");

}
if(isset($_POST ['tambahadmin'])){
    $i = $_POST['iduser'];
    $user = $_POST['user'];
    $namalengkap = $_POST['nama_lengkap'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $tambahadmin = mysqli_query($conn,"INSERT into admin ( iduser, user, nama_lengkap, password, level ) values ('$i','$user', '$namalengkap', '$password','$level')");
};

if(isset($_POST ['updateadmin'])){
    $iduser = $_POST['iduser'];
    $user = $_POST['user'];
    $namalengkap = $_POST['nama_lengkap'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $updatedata = mysqli_query($conn,"UPDATE admin set user = '$user', nama_lengkap ='$namalengkap', password ='$password', level = '$level' where iduser ='$iduser'");
};

if(isset($_POST ['hapusadmin'])){
    $iduser = $_POST['iduser'];


    $hapusdata = mysqli_query($conn, "DELETE from admin where iduser= '$iduser'");
};

if(isset($_POST ['addnewvendor'])){

    $i = $_POST['idsupplier'];
    $namacv = $_POST['namasupplier'];
    $awalkontrak = $_POST['awalkontrak'];
    $akhirkontrak = $_POST['akhirkontrak'];
    $nokontrak = $_POST['nokontrak'];
    $nilaikontrak = $_POST['nilaikontrak'];
    $kodebarang = $_POST['kodebarangsup'];
    $namabarang = $_POST['namabarangsup'];
    $ktgbarang = $_POST['ktgbarang'];
    $hargabarang = $_POST['hargabarang'];
    $jmlbarang = $_POST['jumlahbarang'];

    $tambahvendor = mysqli_query($conn,"INSERT into datasupplier (idsupplier, namasupplier, awalkontrak, akhirkontrak, nokontrak, nilaikontrak, kodebarangsup, namabarangsup, ktgbarang, hargabarang, jumlahbarang ) values ('$i','$namacv','$awalkontrak','$akhirkontrak', '$nokontrak', '$nilaikontrak', '$kodebarang','$namabarang', '$ktgbarang', '$hargabarang', '$jmlbarang')");
};


if(isset($_POST ['updatesupplier'])){

    $idsupplier = $_POST['idsupplier'];
    $namacv = $_POST['namasupplier'];
    $awalkontrak = $_POST['awalkontrak'];
    $akhirkontrak = $_POST['akhirkontrak'];
    $nokontrak = $_POST['nokontrak'];
    $nilaikontrak = $_POST['nilaikontrak'];
    $kodebarang = $_POST['kodebarangsup'];
    $namabarang = $_POST['namabarangsup'];
    $ktgbarang = $_POST['ktgbarang'];
    $hargabarang = $_POST['hargabarang'];
    $jmlbarang = $_POST['jumlahbarang'];

    $updatesupplier = mysqli_query($conn,"UPDATE datasupplier set idsupplier='$idsupplier', namasupplier= '$namacv', awalkontrak= '$awalkontrak', akhirkontrak= '$akhirkontrak', nokontrak= '$nokontrak', nilaikontrak= '$nilaikontrak', kodebarangsup= '$kodebarang', namabarangsup= '$namabarang', ktgbarang= '$ktgbarang', hargabarang= '$hargabarang', jumlahbarang= '$jmlbarang' where idsupplier= '$idsupplier'");
};

// Hapus Supplier//----

if(isset($_POST ['hapussupplier'])){
    $idsupplier = $_POST['idsupplier'];

    $update = mysqli_query($conn,"DELETE from datasupplier where idsupplier = '$idsupplier'");
};

if(isset($_POST ['tambahrequest'])){
    
    $i = $_POST['idreq'];
    $waktu = $_POST['waktu'];
    $nama_pemesan = $_POST['nama_pemesan'];
    $bidang = $_POST['bidang'];
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $jumlah_permintaan = $_POST['jumlah_permintaan'];
    $satuan = $_POST['satuan'];
    $validasi = $_POST['validasi'];


            $addtotable = mysqli_query ($conn,"INSERT into request ( idreq, waktu, nama_pemesan, bidang, kode_barang, nama_barang, jenis_barang, jumlah_permintaan, satuan, validasi) values ( '$i','$waktu','$nama_pemesan','$bidang','$kode_barang','$nama_barang','$jenis_barang','$jumlah_permintaan', '$satuan','$validasi')");

            if($addtotable){
                header("Location: home_pegawai.php");
            } else {
                echo 'Gagal';
                header("location: home_pegawai.php");
            }


        
};

//---Update Request---//
if(isset($_POST ['updaterequest'])){
    $idreq = $_POST['idreq'];
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $jumlah_permintaan = $_POST['jumlah_permintaan'];
    $satuan = $_POST['satuan'];

    $update = mysqli_query($conn,"UPDATE request set idreq= '$idreq', kode_barang = '$kode_barang', nama_barang= '$nama_barang', jenis_barang = '$jenis_barang', jumlah_permintaan = '$jumlah_permintaan', satuan ='$satuan' where idreq = '$idreq'");

};

//----hapus request----//
if(isset($_POST ['hapusrequest'])){
    $idreq = $_POST['idreq'];


    $update = mysqli_query($conn,"DELETE from request where idreq = '$idreq'");
    
};

//-----update Validasi-----//
if(isset($_POST ['Updatevalidasi'])){
    $idreq = $_POST['idreq'];
    $validasi = $_POST['validasi'];

    $update = mysqli_query($conn,"UPDATE request set idreq = '$idreq', validasi = '$validasi' where idreq ='$idreq'");
};

if(isset($_POST ['stockkosong'])){
    $idreq = $_POST['idreq'];
    $validasi = $_POST['validasi'];

    $update = mysqli_query($conn,"UPDATE request set idreq = '$idreq', validasi = '$validasi' where idreq ='$idreq'");
};

//---- fungsi Uplod data berkas (Sekretariat) ------//

if(isset($_POST ['Unggah'])){
    $idfile = $_POST['idberkas'];
    $namafile = $_POST['namaberkas'];
    $nm_pengunggah = $_POST['nm_pengunggah'];
    $waktu =$_POST['wkt_unggah'];
    $keteranganfile = $_POST['keterangan_berkas'];
    $bidang =$_POST['bidang'];

    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $berkas = $_POST["berkas"];
    $file_name = $_FILES["file"]["name"];
    $extension = pathinfo($file_name,PATHINFO_EXTENSION);
    $tmp_name = $_FILES["file"]["tmp_name"];
    $size = $_FILES["file"]["size"];
    if (!in_array($extension,['xlsx','pdf','zip','docx']))
    {
	echo "File yang Kamu Upload harus .xlsx, .pdf, .zip, .docx";
    }
    elseif($_FILES["file"]["size"] > 1000000000000)
    {
	echo "file terlalu besar!";
    }
    move_uploaded_file($tmp_name, "berkas/".$file_name);

$sql = "SELECT MAX(idberkas) as nilai_terakhir FROM data_arsip";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    // mengambil nilai terakhir dari kolom primary key
    $nilai_terakhir = $row['nilai_terakhir'];
    
    // meng-generate nilai primary key yang baru
    $idfile = $nilai_terakhir + 1;
   


    $addtotable = mysqli_query ($conn,"INSERT into data_arsip (idberkas, namaberkas, nm_pengunggah, wkt_unggah, berkas, keterangan_berkas, bidang) values ('$idfile','$namafile','$nm_pengunggah','$waktu','$file_name','$keteranganfile','$bidang')");
   
            
     
};

//----fungsi edit Arsip----//

if(isset($_POST ['updateberkas'])){
    $idfile = $_POST['idberkas'];
    $namafile = $_POST['namaberkas'];
    $nm_pengunggah = $_POST['nm_pengunggah'];
    $waktu = $_POST['wkt_unggah'];

    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $berkas = $_POST["berkas"];
    $file_name = $_FILES["file"]["name"];
    $tmp_name = $_FILES["file"]["tmp_name"];
    move_uploaded_file($tmp_name, "berkas/".$file_name);
      
       

    $update = mysqli_query($conn,"UPDATE data_arsip set idberkas = '$idfile', namaberkas = '$namafile', nm_pengunggah = '$nm_pengunggah', wkt_unggah = '$waktu', berkas = '$berkas' where idberkas ='$idfile'");
};

//----fungsi Delete Berkas----//

if(isset($_POST ['hapusberkas'])){
    $idfile = $_POST['idberkas'];

    $delete = mysqli_query($conn,"DELETE from data_arsip where idberkas = '$idfile'");


   

};

//---- fungsi Uplod data berkas (Anggaran) ------//

if(isset($_POST ['Unggahanggaran'])){
    $idfile = $_POST['idberkas'];
    $namafile = $_POST['namaberkas'];
    $nm_pengunggah = $_POST['nm_pengunggah'];
    $waktu =$_POST['wkt_unggah'];
    $keteranganfile = $_POST['keterangan_berkas'];
    $bidang =$_POST['bidang'];

    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $berkas = $_POST["berkas"];
    $file_name = $_FILES["file"]["name"];
    $extension = pathinfo($file_name,PATHINFO_EXTENSION);
    $tmp_name = $_FILES["file"]["tmp_name"];
    $size = $_FILES["file"]["size"];
    if (!in_array($extension,['xlsx','pdf','zip','docx']))
    {
	echo "File yang Kamu Upload harus .xlsx, .pdf, .zip, .docx";
    }
    elseif($_FILES["file"]["size"] > 1000000)
    {
	echo "file terlalu besar!";
    }
    move_uploaded_file($tmp_name, "berkas_anggaran/".$file_name);
	
	$sql = "SELECT MAX(idberkas) as nilai_terakhir FROM data_arsip";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    // mengambil nilai terakhir dari kolom primary key
    $nilai_terakhir = $row['nilai_terakhir'];
    
    // meng-generate nilai primary key yang baru
    $idfile = $nilai_terakhir + 1;
      

    $addtotable = mysqli_query ($conn,"INSERT into data_arsip (idberkas, namaberkas, nm_pengunggah, wkt_unggah, berkas, keterangan_berkas, bidang) values ('$idfile','$namafile','$nm_pengunggah','$waktu','$file_name','$keteranganfile','$bidang')");
    
            
     
};

//---- fungsi Uplod data berkas (Perbendaharaan) ------//

if(isset($_POST ['Unggahperbendaharaan'])){
    $idfile = $_POST['idberkas'];
    $namafile = $_POST['namaberkas'];
    $nm_pengunggah = $_POST['nm_pengunggah'];
    $waktu =$_POST['wkt_unggah'];
    $keteranganfile = $_POST['keterangan_berkas'];
    $bidang =$_POST['bidang'];

    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $berkas = $_POST["berkas"];
    $file_name = $_FILES["file"]["name"];
    $extension = pathinfo($file_name,PATHINFO_EXTENSION);
    $tmp_name = $_FILES["file"]["tmp_name"];
    $size = $_FILES["file"]["size"];
    if (!in_array($extension,['xlsx','pdf','zip','docx']))
    {
	echo "File yang Kamu Upload harus .xlsx, .pdf, .zip, .docx";
    }
    elseif($_FILES["file"]["size"] > 1000000)
    {
	echo "file terlalu besar!";
    }
    move_uploaded_file($tmp_name, "berkas_perbendaharaan/".$file_name);
	
	
      $sql = "SELECT MAX(idberkas) as nilai_terakhir FROM data_arsip";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    // mengambil nilai terakhir dari kolom primary key
    $nilai_terakhir = $row['nilai_terakhir'];
    
    // meng-generate nilai primary key yang baru
    $idfile = $nilai_terakhir + 1;

    $addtotable = mysqli_query ($conn,"INSERT into data_arsip (idberkas, namaberkas, nm_pengunggah, wkt_unggah, berkas, keterangan_berkas, bidang) values ('$idfile','$namafile','$nm_pengunggah','$waktu','$file_name','$keteranganfile','$bidang')");
    
            
     
};

//---- fungsi Uplod data berkas (Aset) ------//

if(isset($_POST ['Unggahaset'])){
    $idfile = $_POST['idberkas'];
    $namafile = $_POST['namaberkas'];
    $nm_pengunggah = $_POST['nm_pengunggah'];
    $waktu =$_POST['wkt_unggah'];
    $keteranganfile = $_POST['keterangan_berkas'];
    $bidang =$_POST['bidang'];

    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $berkas = $_POST["berkas"];
    $file_name = $_FILES["file"]["name"];
    $extension = pathinfo($file_name,PATHINFO_EXTENSION);
    $tmp_name = $_FILES["file"]["tmp_name"];
    $size = $_FILES["file"]["size"];
    if (!in_array($extension,['xlsx','pdf','zip','docx']))
    {
	echo "File yang Kamu Upload harus .xlsx, .pdf, .zip, .docx";
    }
    elseif($_FILES["file"]["size"] > 1000000)
    {
	echo "file terlalu besar!";
    }
    move_uploaded_file($tmp_name, "berkas_aset/".$file_name);
	
	$sql = "SELECT MAX(idberkas) as nilai_terakhir FROM data_arsip";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    // mengambil nilai terakhir dari kolom primary key
    $nilai_terakhir = $row['nilai_terakhir'];
    
    // meng-generate nilai primary key yang baru
    $idfile = $nilai_terakhir + 1;
      

    $addtotable = mysqli_query ($conn,"INSERT into data_arsip (idberkas, namaberkas, nm_pengunggah, wkt_unggah, berkas, keterangan_berkas, bidang) values ('$idfile','$namafile','$nm_pengunggah','$waktu','$file_name','$keteranganfile','$bidang')");
    
            
     
};

//---- fungsi Uplod data berkas (Akuntansi) ------//

if(isset($_POST ['Unggahakuntansi'])){
    $idfile = $_POST['idberkas'];
    $namafile = $_POST['namaberkas'];
    $nm_pengunggah = $_POST['nm_pengunggah'];
    $waktu =$_POST['wkt_unggah'];
    $keteranganfile = $_POST['keterangan_berkas'];
    $bidang =$_POST['bidang'];

    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $berkas = $_POST["berkas"];
    $file_name = $_FILES["file"]["name"];
    $extension = pathinfo($file_name,PATHINFO_EXTENSION);
    $tmp_name = $_FILES["file"]["tmp_name"];
    $size = $_FILES["file"]["size"];
    if (!in_array($extension,['xlsx','pdf','zip','docx']))
    {
	echo "File yang Kamu Upload harus .xlsx, .pdf, .zip, .docx";
    }
    elseif($_FILES["file"]["size"] > 1000000)
    {
	echo "file terlalu besar!";
    }
    move_uploaded_file($tmp_name, "berkas_akuntansi/".$file_name);
	
	$sql = "SELECT MAX(idberkas) as nilai_terakhir FROM data_arsip";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    // mengambil nilai terakhir dari kolom primary key
    $nilai_terakhir = $row['nilai_terakhir'];
    
    // meng-generate nilai primary key yang baru
    $idfile = $nilai_terakhir + 1;
      

    $addtotable = mysqli_query ($conn,"INSERT into data_arsip (idberkas, namaberkas, nm_pengunggah, wkt_unggah, berkas, keterangan_berkas, bidang) values ('$idfile','$namafile','$nm_pengunggah','$waktu','$file_name','$keteranganfile','$bidang')");
          
     
};

//-----Fungsi daftar user------//


if(isset($_POST ['daftaruser'])){
    $i = $_POST['no_urut'];
    $user = $_POST['username'];
    $namalengkap = $_POST['nama_lengkap'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $tambahadmin = mysqli_query($conn,"INSERT into daftaruser ( no_urut, username, nama_lengkap, password, level ) values ('$i','$user', '$namalengkap', '$password','$level')");
};


if(isset($_POST ['hapususer'])){
    $iduser = $_POST['no_urut'];


    $hapusdata = mysqli_query($conn, "DELETE from daftaruser where no_urut= '$iduser'");
};

?> 