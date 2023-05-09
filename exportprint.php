<?php
require 'function.php';
require 'koneksi.php'
//import koneksi ke database
?>
<html>
<head>
<link rel="shortcut icon" href="iconsimba.ico">
<title >
    SIMBA | BPKAD
</title>
<br>


  

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
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
            <h2>DATA STOCK BARANG</h2>
			<h4>(INVENTORY BPKAD KAB. KARAWANG) </h4>
				<div class="data-tables datatable-dark">

					
					<!-- Masukkan table nya disini, dimulai dari tag TABLE -->
					<table class="table table-bordered" id="datatablesSimple" width= "50%" cellspacing= "0">
                    <script>
$(document).ready(function() {
    $('#datatablesSimple').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print'
            }
        ]
    } );
} );
</script>


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
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                                        $conn  = mysqli_connect("localhost", "root", "", "stockbarang");
                                                        $ambilsemuadatastock = mysqli_query($conn, "select * from datasupplier");
                                                        while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                                            $namasuppliernya = $data['namacv'];
                                                        }
                                                        ?>
                                                        <?php
                                                        $conn  = mysqli_connect("localhost", "root", "", "stockbarang");
                                                        $ambilsemuadatastock = mysqli_query($conn, "select * from stock");
                                                        $i = 1;
                                                        while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                                            $i= $i++;
                                                            $idb = $data['idbarang'];
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
                                                            <td><?=$namasuppliernya?></td>
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
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>


	

</body>

</html>