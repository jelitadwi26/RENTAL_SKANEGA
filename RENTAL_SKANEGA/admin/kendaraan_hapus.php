<?php
include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM kendaraan WHERE kendaraan_nomor='$id'");

header("location:kendaraan.php");
?>