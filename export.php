<?php
require 'function.php';
require 'koneksi.php';
//import koneksi ke database
?>
<html>
<head>
<link rel="shortcut icon" href="iconsimba.ico">
  <title>
                 SIMBA | BPKAD
               DATA STOCK BARANG
    (PENGELOLAAN BARANG BPKAD KAB. KARAWANG)
</title>
  <br>

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
			<h2>DATA STOCK BARANG</h2>
			<h4>(INVENTORY BPKAD KAB. KARAWANG) </h4>
				<div class="data-tables datatable-dark">

					
					<!-- Masukkan table nya disini, dimulai dari tag TABLE -->
					<table class="table table-striped table-bordered" id="datatablesSimple" width= "100%" cellspacing= "0">
                   <script> $(document).ready(function() {
    $('#datatablesSimple').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            { 
                extend: 'pdfHtml5', 
                orientation: 'landscape',
                pageSize: 'LEGAL',
                download: 'open' 
            }
        ]
    } );
} );
</script>
<thead>
                                        <tr>
                                            <th>No</th>
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
                                            <th>keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                                        <?php
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
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>	
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>


</body>

</html>