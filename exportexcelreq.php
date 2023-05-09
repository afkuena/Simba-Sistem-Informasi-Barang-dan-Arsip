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
        <title>DATA REQUEST PESANAN</title>
        

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
			<h2>DATA REQUEST PESANAN</h2>
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
                                        
                                        <th>No</th>
                                            <th>Waktu</th>
                                            <th>Nama Pemesan</th>
                                            <th>Bidang</th>
                                            <th>kode barang</th>
                                            <th>Nama barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Jumlah Permintaan</th>
                                            <th>Satuan</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                    <?php
                                    $ambilsemuadatarequest = mysqli_query($conn, "select * from request where idreq");
                                    $idreq = 1;
                                    while($data=mysqli_fetch_array($ambilsemuadatarequest)){
                                    
                                        $idreq = $data ['idreq'];
                                        $waktu = $data['waktu'];
                                        $nama_pemesan = $data['nama_pemesan'];
                                        $bidang = $data['bidang'];
                                        $kode_barang = $data['kode_barang'];
                                        $nama_barang = $data['nama_barang'];
                                        $jenis_barang = $data['jenis_barang'];
                                        $jumlah_permintaan = $data['jumlah_permintaan'];
                                        $satuan = $data['satuan'];
                                        $validasi = $data['validasi'];
                                       
                                    ?>
                                    <tr>
                                        <td><?=$idreq?></td>
                                        <td><?=$waktu?></td>
                                        <td><?=$nama_pemesan?></td>
                                        <td><?=$bidang?></td>
                                        <td><?=$kode_barang?></td>
                                        <td><?=$nama_barang?></td>
                                        <td><?=$jenis_barang?></td>
                                        <td><?=$jumlah_permintaan?></td>
                                        <td><?=$satuan?></td>
                                        <td>
                                <?=$validasi;?>
                                </td>
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