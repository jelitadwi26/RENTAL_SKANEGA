<?php include 'header.php'; ?>
<div class="container">
    <h3><i class="glyphicon glyphicon-modal-window"></i> Data Kendaraan</h3>
    <a href="kendaraan_tambah.php" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah Kendaraan</a>
    <br><br>

    <table class="table table-bordered table-striped">
        <tr>
            <th>Nomor Kendaraan</th>
            <th>Nama Kendaraan</th>
            <th>Jenis Kendaraan</th>
            <th>Harga Per Hari</th>
            <th>Status</th>
            <th>Opsi</th>
        </tr>

        <?php
        include '../koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM kendaraan");
        while ($d = mysqli_fetch_array($data)) {
        ?>
        <tr>
            <td><?php echo $d['kendaraan_nomor']; ?></td>
            <td><?php echo $d['kendaraan_nama']; ?></td>
            <td><?php echo $d['kendaraan_tipe']; ?></td>
            <td><?php echo $d['kendaraan_harga_perhari']; ?></td>
            <td>
                <?php 
                    if($d['kendaraan_status']=="1"){
                        echo "<div class='label label-success'>READY</div>";
                    }else if($d['kendaraan_status']=="2"){
                        echo "<div class='label label-danger'>DIPINJAM</div>";
                    }
               ?>      
            </td>
            <td>
                <a href="kendaraan_edit.php?id=<?php echo $d['kendaraan_nomor']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a onclick="return confirm('Yakin hapus?')" href="kendaraan_hapus.php?id=<?php echo $d['kendaraan_nomor']; ?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>