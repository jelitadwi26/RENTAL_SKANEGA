<?php include 'header.php'; ?>
<div class="container">

    <h3><i class="glyphicon glyphicon-edit"></i> Edit Peminjam</h3>
    <a href="pinjam.php" class="btn btn-default btn-sm">Kembali</a>
    <br/><br/>

    <?php
    include "../koneksi.php";
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * FROM pinjam WHERE pinjam_id='$id'");
    $d = mysqli_fetch_assoc($data);
    ?>

    <form action="pinjam_update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $d['pinjam_id']; ?>">
        <div class="form-group">
            <label>Nomor Kendaraan</label>
            <input type="text" name="kendaraan_nomor" class="form-control" value="<?php echo $d['kendaraan_nomor']; ?>" required>
        </div>
        <div class="form-group">
            <label>ID User</label>
            <input type="text" name="user_id" class="form-control" value="<?php echo $d['user_id']; ?>" required>
        </div>
        <div class="form-group">
            <label>Tanggal Pinjam</label>
            <input type="text" name="tgl_pinjam" class="form-control" value="<?php echo $d['tgl_pinjam']; ?>" required>
        </div>
        <div class="form-group">
            <label>Tanggal Kembali</label>
            <input type="text" name="tgl_kembali" class="form-control" value="<?php echo $d['tgl_kembali']; ?>" required>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="pinjam_status" class="form-control" required>
            <option value="1" <?php if($d['pinjam_status']==1) echo "selected"; ?>>READY</option>
            <option value="2" <?php if($d['pinjam_status']==2) echo "selected"; ?>>DIPINJAM</option>
            </select>
        </div>

        <input type="submit" value="Update" class="btn btn-success">
    </form>

</div>
<?php include 'footer.php'; ?>