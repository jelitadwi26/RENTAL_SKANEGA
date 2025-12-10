<?php include 'header.php'; ?>
<div class="container">
    <h3><i class="glyphicon glyphicon-user"></i> Data User</h3>
    <a href="user_tambah.php" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah User</a>
    <br><br>

    <table class="table table-bordered table-striped">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Status</th>
            <th>Opsi</th>
        </tr>

        <?php
        include '../koneksi.php';
        $no = 1;
        $user = mysqli_query($koneksi, "SELECT * FROM user");
        while ($d = mysqli_fetch_array($user)) {
            ?>
            <tr>
                <td><?php echo $d['user_id']; ?></td>
                <td><?php echo $d['username']; ?></td>
                <td><?php echo $d['password']; ?></td>
                <td><?php echo $d['user_nama']; ?></td>
                <td><?php echo $d['user_alamat']; ?></td>
                <td><?php echo $d['user_status']; ?></td>
                <td>
                    <a href="user_edit.php?id=<?php echo $d['user_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a onclick="return confirm('Yakin ingin menghapus user ini?')" href="user_hapus.php?id=<?php echo $d['user_id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>