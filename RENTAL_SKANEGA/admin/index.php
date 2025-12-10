<?php
   include 'header.php';
   include '../koneksi.php';
?>

<head>
    <style type="text/css">
        .panel-blue {

        }
        .panel-blue > .panel-heading {
            background-color: #D46EA4;
            color: white;
            border-color: #D46EA4;
        }
        .panel-green {

        }
        .panel-green > .panel-heading {
            background-color: #F283D8;
            color: white;
            border-color: #F283D8;
        }
        .panel-red {

        }
        .panel-red > .panel-heading {
            background-color: #E83594;
            color: white;
            border-color: #E83594;
        }
        .panel-yellow {

        }
        .panel-yellow > .panel-heading {
            background-color: #F5B5CC;
            color: white;
            border-color: #F5B5CC;
        }
        .alert-pink {
        	background-color: pink !important;
            border-color: #ff8fc4 !important;
            color: #d6006e !important;
        }
    </style>
</head>

<div class="container">
    <div class="alert alert-pink text-center">
        <h4 style="margin-bottom: 0px;"><b>Selamat Datang!</b> di Sistem Informasi Rental Kendaraan RPL Skanega</h4>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <h4>Dashboard</h4>
        </div>
        <div class="panel-body">
            <div class="row">

                <!-- Jumlah User -->
                <div class="col-md-3">
                    <div class="panel panel-blue">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-user"></i>
                                <span class="pull-right">
                                    <?php
                                        $user = mysqli_query($koneksi,"SELECT * FROM user");
                                        echo mysqli_num_rows($user);
                                    ?>
                                </span>
                            </h1>
                            Jumlah User
                        </div>
                    </div>
                </div>

                <!-- Jumlah Kendaraan Ready -->
                <div class="col-md-3">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-ok"></i>
                                <span class="pull-right">
                                    <?php
                                        $ready = mysqli_query($koneksi,"SELECT * FROM kendaraan WHERE kendaraan_status='1'");
                                        echo mysqli_num_rows($ready);
                                    ?>
                                </span>
                            </h1>
                            Kendaraan Ready
                        </div>
                    </div>
                </div>

                <!-- Jumlah Kendaraan Dipinjam -->
                <div class="col-md-3">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-export"></i>
                                <span class="pull-right">
                                    <?php
                                        $dipinjam = mysqli_query($koneksi,"SELECT * FROM kendaraan WHERE kendaraan_status='2'");
                                        echo mysqli_num_rows($dipinjam);
                                    ?>
                                </span>
                            </h1>
                            Kendaraan Dipinjam
                        </div>
                    </div>
                </div>

                <!-- Jumlah Transaksi Peminjaman -->
                <div class="col-md-3">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-stats"></i>
                                <span class="pull-right">
                                    <?php
                                        $pinjam = mysqli_query($koneksi,"SELECT * FROM pinjam");
                                        echo mysqli_num_rows($pinjam);
                                    ?>
                                </span>
                            </h1>
                            Total Peminjaman
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- RIWAYAT PEMINJAMAN TERBARU -->
    <div class="panel">
        <div class="panel-heading">
            <h4>Riwayat Peminjaman Terbaru</h4>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">NO</th>
                    <th>Nama User</th>
                    <th>Alamat</th>
                    <th>Nama Kendaraan</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                </tr>

                <?php
                    $data = mysqli_query($koneksi, "SELECT * FROM pinjam JOIN kendaraan ON pinjam.kendaraan_nomor = kendaraan.kendaraan_nomor
                        JOIN user ON pinjam.user_id = user.user_id
                        ORDER BY pinjam.pinjam_id DESC LIMIT 10
                    ");

                    $no = 1;
                    while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['user_nama']; ?></td>
                    <td><?php echo $d['user_alamat']; ?></td>
                    <td><?php echo $d['kendaraan_nama']; ?></td>
                    <td><?php echo $d['tgl_pinjam']; ?></td>
                    <td><?php echo $d['tgl_kembali']; ?></td>                    
                    <td>
                        <?php
                        if ($d['pinjam_status']== "1"){
                            echo "<div class='label label-success'>READY</div>";
                        } elseif ($d['pinjam_status']== "2"){
                            echo "<div class='label label-danger'>DIPINJAM</div>";
                        }
                        ?>
                    </td>
                </tr>
                <?php } ?>

            </table>
        </div>
    </div>

</div>

<?php
    include 'footer.php';
?>