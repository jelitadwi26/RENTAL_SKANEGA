<?php
include '../koneksi.php';

$dari   = isset($_GET['dari']) ? $_GET['dari'] : '';
$sampai = isset($_GET['sampai']) ? $_GET['sampai'] : '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        h2, h4 {
            text-align: center;
        }
        .kop {
            text-align: center;
            border-bottom: 3px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        table {
            font-size: 14px;
        }
        @media print {
            .btn-print {
                display: none;
            }
        }
    </style>
</head>

<body>

<div class="kop">
    <h2>SISTEM INFORMASI RENTAL KENDARAAN</h2>
    <h4>RPL - SMK NEGERI 3 KENDAL</h4>
    <p><b>Laporan Peminjaman Kendaraan</b></p>
</div>

<h4>Periode: <?= $dari ?> sampai <?= $sampai ?></h4>
<br>

<table class="table table-bordered table-striped">
<thead style="background:#29472B; color:white;">
    <tr>
        <th>No</th>
        <th>ID Pinjam</th>
        <th>ID User</th>
        <th>ID Kendaraan</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Status</th>
    </tr>
</thead>

<tbody>
<?php
$no = 1;

$data = mysqli_query($koneksi,"
    SELECT * FROM pinjam
    WHERE tgl_pinjam BETWEEN '$dari' AND '$sampai'
    ORDER BY pinjam_id DESC
") or die(mysqli_error($koneksi)); 
?>

<tr>
    <td><?php echo $d['pinjam_id']; ?></td>
            <td><?php echo $d['kendaraan_nomor']; ?></td>
            <td><?php echo $d['user_id']; ?></td>
            <td><?php echo $d['tgl_pinjam']; ?></td>
            <td><?php echo $d['tgl_kembali']; ?></td>
            <td>
                <?php 
                    if($d['pinjam_status']=="1"){
                        echo "<div class='label label-success'>READY</div>";
                    }else if($d['pinjam_status']=="2"){
                        echo "<div class='label label-danger'>DIPINJAM</div>";
                    }
               ?>      
            </td>
</tr>
<?php  ?>
</tbody>
</table>

<br><br>

<button class="btn btn-primary btn-print" onclick="window.print()">
    Cetak
</button>

</body>
</html>