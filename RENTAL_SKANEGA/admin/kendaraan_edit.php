<?php include 'header.php'; ?>
<div class="container">

    <h3><i class="glyphicon glyphicon-edit"></i> Edit Kendaraan</h3>
    <a href="pinjam.php" class="btn btn-default btn-sm">Kembali</a>
    <br/><br/>

    <?php
    include "../koneksi.php";
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE kendaraan_nomor='$id'");
    $d = mysqli_fetch_assoc($data);
    ?>

    <form action="kendaraan_update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $d['kendaraan_nomor']; ?>">
        <div class="form-group">
            <label>Nomor Kendaraaan</label>
            <input type="text" name="kendaraan_nomor" class="form-control" value="<?php echo $d['kendaraan_nomor']; ?>" required>
        </div>
        <div class="form-group">
            <label>Nama Kendaraaan</label>
            <input type="text" name="kendaraan_nama" class="form-control" value="<?php echo $d['kendaraan_nama']; ?>" required>
        </div>
        <div class="form-group">
            <label>Jenis Kendaraan</label>
            <input type="text" name="kendaraan_tipe" class="form-control" value="<?php echo $d['kendaraan_tipe']; ?>" required>
        </div>
        <div class="form-group">
            <label>Harga Per Hari</label>
            <input type="number" name="kendaraan_harga_perhari" class="form-control"
            value="<?php echo $d['kendaraan_harga_perhari']; ?>" required>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="kendaraan_status" class="form-control" required>
            <option value="1" <?php if($d['kendaraan_status']==1) echo "selected"; ?>>READY</option>
            <option value="2" <?php if($d['kendaraan_status']==2) echo "selected"; ?>>DIPINJAM</option>
            </select>
        </div>

        <input type="submit" value="Update" class="btn btn-success">
    </form>

</div>
<?php include 'footer.php'; ?>