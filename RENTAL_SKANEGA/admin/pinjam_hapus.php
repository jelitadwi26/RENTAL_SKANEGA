<?php
include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM pinjam WHERE pinjam_id='$id'");

header("location:pinjam.php?pesan=hapus_berhasil");
?>