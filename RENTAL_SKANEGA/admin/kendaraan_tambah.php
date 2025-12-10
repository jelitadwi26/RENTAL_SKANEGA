<?php
session_start();
include '../koneksi.php';

if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    header("Location: ../index.php?pesan=belum_login");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['simpan'])) {
    $kendaraan_nama = mysqli_real_escape_string($koneksi, trim($_POST['kendaraan_nama'] ?? ''));
    $kendaraan_tipe     = mysqli_real_escape_string($koneksi, trim($_POST['kendaraan_tipe'] ?? ''));
    $kendaraan_harga_per_hari   = mysqli_real_escape_string($koneksi, trim($_POST['kendaraan_harga_per_hari'] ?? ''));
    $kendaraan_status  = mysqli_real_escape_string($koneksi, trim($_POST['kendaraan_status'] ?? '1'));

    $errors = [];
    $kendaraan_nomor = mysqli_real_escape_string($koneksi, trim($_POST['kendaraan_nomor'] ?? ''));
    if ($kendaraan_nama === '') $errors[] = 'Nama Kendaraan kosong.';
    if ($kendaraan_tipe === '') $errors[] = 'Jenis Kendaraan kosong.';
    if ($kendaraan_harga_per_hari === '') $errors[] = 'Harga Per Hari kosong.';
    if ($kendaraan_status === '') $errors[] = 'Status Kendaraan kosong.';

    if (empty($errors)) {
        $sql = "INSERT INTO kendaraan (kendaraan_nomor, kendaraan_nama, kendaraan_tipe, kendaraan_harga_per_hari, kendaraan_status)
                VALUES ('$kendaraan_nomor', '$kendaraan_nama', '$kendaraan_tipe', '$kendaraan_harga_per_hari', '$kendaraan_status')";

            $exec = mysqli_query($koneksi, $sql);

            if (!$exec) {
                die("ERROR MYSQL: " . mysqli_error($koneksi));
            }


        if ($exec) {
            // sukses -> redirect ke daftar
            header("location: kendaraan.php");
            exit;
        } else {
            // tampilkan error DB agar gampang debugging (non-aktifkan di production)
            $db_error = mysqli_error($koneksi);
            $errors[] = "Gagal menyimpan data: $db_error";
            // tidak redirect, nanti form akan muncul lagi dengan pesan error
        }
    }
}

include 'header.php';
?>

<div class="container">
    <h3><i class="glyphicon glyphicon-plus"></i> Tambah Kendaraan</h3>
    <a href="kendaraan.php" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
    <br><br>

    <?php if (!empty($errors)) { ?>
        <div class="alert alert-danger">
            <ul style="margin:0; padding-left:18px;">
            <?php foreach($errors as $e) { echo "<li>".htmlspecialchars($e)."</li>"; } ?>
            </ul>
        </div>
    <?php } ?>

    <form method="post" action="">
        <div class="form-group">
            <label>Nomor Kendaraan</label>
            <input type="text" name="kendaraan_nomor" class="form-control" required value="<?= isset($kendaraan_nomor) ? htmlspecialchars($kendaraan_nomor) : '' ?>">

        <div class="form-group">
            <label>Nama Kendaraan</label>
            <input type="text" name="kendaraan_nama" class="form-control" required value="<?= isset($kendaraan_nama) ? htmlspecialchars($kendaraan_nama) : '' ?>">
        </div>

        <div class="form-group">
            <label>Jenis Kendaraan</label>
            <input type="text" name="kendaraan_tipe" class="form-control" required value="<?= isset($kendaraan_tipe) ? htmlspecialchars($kendaraan_tipe) : '' ?>">
        </div>
        <div class="form-group">
            <label>Harga Per Hari</label>
            <input type="number" name="kendaraan_harga_per_hari" class="form-control" required value="<?= isset($kendaraan_harga_per_hari) ? htmlspecialchars($kendaraan_harga_per_hari) : '' ?>">
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="pinjam_status" class="form-control" required>
            <option value="1">READY</option>
            <option value="2">DIPINJAM</option>
            </select>
        </div>

        <input type="submit" name="simpan" value="Simpan" class="btn btn-success btn-sm">
    </form>
</div>

<?php include 'footer.php'; ?>