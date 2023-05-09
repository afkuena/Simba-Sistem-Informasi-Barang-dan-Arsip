<?php
require 'function.php';
require 'koneksi.php';
//import koneksi ke database
?>
<html>
<head>
<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
		<link rel="shortcut icon" href="iconsimba.ico">
        <title>DATA PENYEDIAAN BARANG</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
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

<body>
<div class="container">
			<h2>DATA BARANG KELUAR</h2>
			<h4>(INVENTORY BPKAD KAB. KARAWANG)</h4>
				<div class="data-tables datatable-dark">

					
					<!-- Masukkan table nya disini, dimulai dari tag TABLE -->
					<table class="table table-bordered" id="datatablesSimple" width= "50%" cellspacing= "0">
                   <script> $(document).ready(function() {
    $('#datatablesSimple').DataTable( {
   
        dom: 'Bfrtip',
        buttons: [
            'excel'
        ]
    } );
} );
</script>
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
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                    
                                    <?php
                                    $ambilsemuadatamasuk = mysqli_query($conn, "select * from masuk m, stock s where s.idbarang = m.idbarang");
                                  
                                    while($data=mysqli_fetch_array($ambilsemuadatamasuk)){
                                       
                                        $idb = $data['idbarang'];
                                        $tglmasuk = $data['tanggalmasuk'];
                                        $ktgbarang = $data['ktgbarang'];
                                        $namabarang = $data['namabarang'];
                                        $spesifikasi = $data['spesifikasi'];
                                        $penerima = $data['penerimabm'];
                                        $kodebarang = $data['kodebarang'];
                                        $bahanrangkabarang = $data['bahanrangkabarangbm'];
                                        $sumberdana = $data['sumberdanabm'];
                                        $tahun = $data['tahunbm'];
                                        $kondisibarang = $data['kondisibarangbm'];
                                        $qty = $data['qty'];
                                        $hargasatuan = $data['hargasatuan'];
                                        $hargatotal = $data['hargatotalbm'];
                                        $keterangan = $data['keteranganbm'];
                                        $gambarbarang = $data['gambarbarangbm'];
                                        if($gambarbarang==null){
                                            $gambarbarang = 'No Photo';   
                                        } else {
                                            $gambarbarang = '<img src= "imagein/'.$gambarbarang.'" width="100"  class = "zoomable">';
                                        }
                                        
                                    
                                    ?>
                                    <tr>

                                        <td><?=$tglmasuk?></td>
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
	

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>