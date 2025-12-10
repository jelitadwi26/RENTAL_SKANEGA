<?php
//PENTING: mulai session SEBELUM output apa pun 
session_start();

include '../koneksi.php';

// cek login
if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    header("location:../index.php?pesan=belum_login");
    exit;
}

include 'header.php';
?>

<div class="container" style="margin-top:20px;">
    <h3><i class="fa fa-file"></i> Laporan Peminjaman Kendaraan</h3>
    <hr>

    <!-- Form Filter Tanggal -->
    <div class="panel panel-default" style="padding:20px; border-radius:10px;">
        <form method="GET" action="">
            <div class="row">

                <div class="col-md-4">
                    <label>Dari Tanggal</label>
                    <input type="date" name="dari" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label>Sampai Tanggal</label>
                    <input type="date" name="sampai" class="form-control" required>
                </div>

                <div class="col-md-4">
                    <label style="color:transparent;">_</label><br>
                    <button type="submit" class="btn btn-success btn-block">
                        <i class="fa fa-search"></i> Tampilkan
                    </button>
                </div>

            </div>
        </form>
    </div>

    <hr>

    <?php if(isset($_GET['dari']) && isset($_GET['sampai'])) { ?>
        <h4>Periode:
            <b><?= htmlspecialchars($_GET['dari']); ?></b> sampai <b><?= htmlspecialchars($_GET['sampai']); ?></b>
        </h4>
        <br>
    <?php } ?>

    <table class="table table-bordered table-striped">
        <thead style="background:#29472B; color:white;">
            <tr>
                <th>No</th>
                <th>ID Peminjaman</th>
                <th>ID User</th>
                <th>ID Kendaraan</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
        <?php
        if(isset($_GET['dari']) && isset($_GET['sampai'])){
            $dari   = mysqli_real_escape_string($koneksi, $_GET['dari']);
            $sampai = mysqli_real_escape_string($koneksi, $_GET['sampai']);

            $no = 1;
            $query = "SELECT * FROM pinjam
                WHERE tgl_pinjam BETWEEN '$dari' AND '$sampai'
                ORDER BY pinjam_id DESC";
            $data = mysqli_query($koneksi, $query);

            while($row = mysqli_fetch_array($data)){
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['pinjam_id']); ?></td>
                <td><?= htmlspecialchars($row['kendaraan_nomor']); ?></td>
                <td><?= htmlspecialchars($row['user_id']); ?></td>
                <td><?= htmlspecialchars($row['tgl_pinjam']); ?></td>
                <td><?= htmlspecialchars($row['tgl_kembali']); ?></td>
                <td>
                <?php 
                    if ($row['pinjam_status'] == "1") {
                       echo "<span class='label label-success'>READY</span>";
                    }else if ($row['pinjam_status'] == "2") {
                       echo "<span class='label label-danger'>DIPINJAM</span>";
                    }
                ?>
                </td>
            </tr>
        <?php } } ?>
        </tbody>
    </table>

    <?php if(isset($_GET['dari'])){ ?>
        <a href="laporan_print.php?dari=<?= urlencode($_GET['dari']); ?>&sampai=<?= urlencode($_GET['sampai']); ?>"
           target="_blank" class="btn btn-primary">
            <i class="fa fa-print"></i> Cetak PDF
        </a>
    <?php } ?>

</div>

<?php include 'footer.php'; ?>