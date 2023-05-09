<?php
?>
<head>
    <title>Tutorial PHP Datatables Dengan PHP Dan MySQL</title>
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body>

<table id="tabel-data">
<thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Penerima</th>
                                            <th>Nama Barang</th>
                                            <th>Deskripsi</th>
                                            <th>Kode Barang</th>
                                            <th>Bahan/Rangka No.</th>
                                            <th>Sumber Dana</th>
                                            <th>Tahun</th>
                                            <th>Kondisi Barang</th>
                                            <th>Stock</th>
                                            <th>Harga satuan</th>
                                            <th>Harga Total</th>
                                            <th>Gambar</th>
                                            <th>keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
    <tbody>
    <?php
        include 'koneksi.php';
        $employee = mysqli_query($koneksi,"select * from stock");
        while($row = mysqli_fetch_array($employee))
        {
            echo "<tr>
            <td>".$row['penerima']."</td>
            <td>".$row['namabarang']."</td>
            <td>".$row['deskripsi']."</td>
            <td>".$row['kodebarang']."</td>
            <td>".$row['bahanrangkabarang']."</td>
            <td>".$row['sumberdana']."</td>
            <td>".$row['tahun']."</td>
            <td>".$row['kondisibarang']."</td>
            <td>".$row['stock']."</td>
            <td>".$row['hargasatuan']."</td>
            <td>".$row['hargatotal']."</td>
            <td>".$row['gambarbarang']."</td>
            <td>".$row['keterangan']."</td>

        </tr>";
        }
    ?>
    </tbody>

    <script>
    $(document).ready(function(){
        $('#datatablesSimple').DataTable({
            dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            }
        ]
        });
       
    });
</script>

</table>
</body>
