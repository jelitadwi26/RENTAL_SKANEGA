<?php
session_start();
include '../koneksi.php';

if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    header("Location: ../index.php?pesan=belum_login");
    exit;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['simpan'])) {

    // Ambil input dari form
    $kendaraan_nomor = mysqli_real_escape_string($koneksi, trim($_POST['kendaraan_nomor'] ?? ''));
    $user_id         = mysqli_real_escape_string($koneksi, trim($_POST['user_id'] ?? ''));
    $tgl_pinjam      = mysqli_real_escape_string($koneksi, trim($_POST['tgl_pinjam'] ?? ''));
    $tgl_kembali     = mysqli_real_escape_string($koneksi, trim($_POST['tgl_kembali'] ?? ''));
    $pinjam_status   = mysqli_real_escape_string($koneksi, trim($_POST['pinjam_status'] ?? ''));

    // Validasi
    if ($kendaraan_nomor === '') $errors[] = "Kendaraan belum dipilih.";
    if ($user_id === '') $errors[] = "User belum dipilih.";
    if ($tgl_pinjam === '') $errors[] = "Tanggal pinjam kosong.";
    if ($tgl_kembali === '') $errors[] = "Tanggal kembali kosong.";
    if ($pinjam_status === '') $errors[] = "Status pinjam kosong.";

    // Jika tidak ada error → insert
    if (empty($errors)) {
        $sql = "INSERT INTO pinjam 
                (kendaraan_nomor, user_id, tgl_pinjam, tgl_kembali, pinjam_status)
                VALUES 
                ('$kendaraan_nomor', '$user_id', '$tgl_pinjam', '$tgl_kembali', '$pinjam_status')";

        $exec = mysqli_query($koneksi, $sql);

        if ($exec) {
            header("Location: pinjam.php?pesan=sukses");
            exit;
        } else {
            $errors[] = "Gagal menyimpan data: " . mysqli_error($koneksi);
        }
    }
}

include 'header.php';

// Ambil list kendaraan
$qKendaraan = mysqli_query($koneksi, "SELECT * FROM kendaraan ORDER BY kendaraan_nomor");
// Ambil list user
$qUser = mysqli_query($koneksi, "SELECT * FROM user ORDER BY username");

?>

<div class="container">
    <h3><i class="glyphicon glyphicon-plus"></i> Tambah Peminjaman</h3>
    <a href="pinjam.php" class="btn btn-default btn-sm">
        <i class="glyphicon glyphicon-arrow-left"></i> Kembali
    </a>
    <br><br>

    <?php if (!empty($errors)) { ?>
        <div class="alert alert-danger">
            <ul style="margin:0; padding-left:18px;">
            <?php foreach($errors as $e) { echo "<li>".htmlspecialchars($e)."</li>"; } ?>
            </ul>
        </div>
    <?php } ?>

    <form method="post" action="">

        <!-- PILIH KENDARAAN -->
        <div class="form-group">
            <label>Pilih Kendaraan</label>
            <select name="kendaraan_nomor" class="form-control" required>
                <option value="">-- PILIH --</option>
                <?php while($k = mysqli_fetch_assoc($qKendaraan)) { ?>
                    <option value="<?= $k['kendaraan_nomor'] ?>">
                        <?= $k['kendaraan_nomor'] ?> - <?= htmlspecialchars($k['kendaraan_nama']) ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <!-- PILIH USER -->
        <div class="form-group">
            <label>Pilih User</label>
            <select name="user_id" class="form-control" required>
                <option value="">-- PILIH --</option>
                <?php while($u = mysqli_fetch_assoc($qUser)) { ?>
                    <option value="<?= $u['user_id'] ?>">
                        <?= $u['username'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <!-- TANGGAL PINJAM -->
        <div class="form-group">
            <label>Tanggal Pinjam</label>
            <input type="date" name="tgl_pinjam" class="form-control" required>
        </div>

        <!-- TANGGAL KEMBALI -->
        <div class="form-group">
            <label>Tanggal Kembali</label>
            <input type="date" name="tgl_kembali" class="form-control" required>
        </div>

        <!-- STATUS -->
        <div class="form-group">
            <label>Status Peminjaman</label>
            <select name="pinjam_status" class="form-control" required>
                <option value="1">READY</option>
                <option value="2">DIPINJAM</option>
            </select>
        </div>

        <input type="submit" name="simpan" value="Simpan" class="btn btn-success btn-sm">

    </form>
</div>

<?php include 'footer.php'; ?>