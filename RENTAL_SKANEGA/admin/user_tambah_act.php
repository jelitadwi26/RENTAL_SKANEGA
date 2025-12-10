<?php
include '../koneksi.php';

$username    = $_POST['username'];
$password    = $_POST['password'];
$nama        = $_POST['user_nama'];
$alamat      = $_POST['user_alamat'];
$status      = $_POST['user_status'];

mysqli_query($koneksi,"INSERT INTO user VALUES('','$username','$password','$nama','$alamat','$status')");

header("location:user.php");