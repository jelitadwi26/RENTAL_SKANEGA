<?php include 'header.php'; ?>
<div class="container">
    <h3><i class="glyphicon glyphicon-modal-window"></i> Data Peminjaman</h3>
    <a href="pinjam_tambah.php" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah Peminjam</a>
    <br><br>

    <table class="table table-bordered table-striped">
        <tr>
            <th>ID Pinjam</th>
            <th>Nomor Kendaraan</th>
            <th>ID User</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th>Opsi</th>
        </tr>

        <?php
        include '../koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM pinjam");
        while ($d = mysqli_fetch_array($data)) {
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
                        echo "<div class='label label-success'>DIPINJAM</div>";
                    }else if($d['pinjam_status']=="2"){
                        echo "<div class='label label-danger'>DIKEMBALIKAN</div>";
                    }
               ?>      
            </td>
            <td>
                <a href="pinjam_edit.php?id=<?php echo $d['pinjam_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a onclick="return confirm('Yakin ingin menghapus?')" href="pinjam_hapus.php?id=<?php echo $d['pinjam_id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>