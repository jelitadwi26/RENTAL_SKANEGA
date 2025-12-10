<?php include 'header.php'; ?>
<div class="container">

    <h3><i class="glyphicon glyphicon-edit"></i> Edit Data User</h3>
    <a href="pinjam.php" class="btn btn-default btn-sm">Kembali</a>
    <br/><br/>

    <?php
    include "../koneksi.php";

    $id = $_GET['id']; 
    $data = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$id'");
    $d = mysqli_fetch_assoc($data);
    ?>

    <form action="user_update.php" method="post">

        <input type="hidden" name="user_id" value="<?php echo $d['user_id']; ?>">

<div class="form-group">
    <label>ID</label>
    <input type="text" name="user_id" class="form-control" value="<?php echo $d['user_id']; ?>"
    required>
</div>

<div class="form-group">
    <label>Username</label>
    <input type="text" name="username" class="form-control" value="<?php echo $d['username']; ?>"
    required>
</div>
<div class="form-group">
    <label>Password</label>
    <input type="text" name="password" class="form-control" value="<?php echo $d['password']; ?>"
    required>
</div>
<div class="form-group">
    <label>Nama</label>
    <input type="text" name="user_nama" class="form-control" value="<?php echo $d['user_nama']; ?>"
    required>
</div>
<div class="form-group">
    <label>Alamat</label>
    <input type="text" name="user_alamat" class="form-control" value="<?php echo $d['user_alamat']; ?>"
    required>
</div>
<div class="form-group">
            <label>Status</label>
            <select name="user_status" class="form-control" required>
        <option value="1" <?php if($d['user_status']==1) echo "selected"; ?>>DIPINJAM</option>
        <option value="2" <?php if($d['user_status']==2) echo "selected"; ?>>DIKEMBALIKAN</option>
    </select>
</div>

        <input type="submit" value="Update" class="btn btn-success">

    </form>

</div>
<?php include 'footer.php'; ?>
