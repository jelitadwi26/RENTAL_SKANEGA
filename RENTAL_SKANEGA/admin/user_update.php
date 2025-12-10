<?php
include "../koneksi.php";

$id            = $_POST['user_id'];
$username      = $_POST['username'];
$password      = $_POST['password'];
$nama          = $_POST['user_nama'];
$alamat        = $_POST['user_alamat'];
$status        = $_POST['user_status'];

$query = mysqli_query ($koneksi, "
    UPDATE user SET 
        username='$username',
        password='$password',
        user_nama='$nama',
        user_alamat='$alamat',
        user_status='$status'
    WHERE user_id='$id'
");

if($query){
    header("location:user.php?pesan=update_berhasil");
}else{
    echo "ERROR : " . mysqli_error($koneksi);
}
?>