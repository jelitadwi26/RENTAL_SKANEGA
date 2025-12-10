<?php
include "../koneksi.php";

$pinjam_id       = (int)$_POST['pinjam_id'];
$kendaraan_nomor = (int)$_POST['kendaraan_nomor'];
$user_id         = (int)$_POST['user_id'];
$tgl_pinjam       = $_POST['tgl_pinjam'];
$tgl_kembali      = $_POST['tgl_kembali'];
$pinjam_status    = (int)$_POST['pinjam_status'];

$query = mysqli_query($koneksi, "
    UPDATE pinjam SET 
        kendaraan_nomor = $kendaraan_nomor,
        user_id = $user_id,
        tgl_pinjam = '$tgl_pinjam',
        tgl_kembali = '$tgl_kembali',
        pinjam_status = $pinjam_status
    WHERE pinjam_id = $pinjam_id
");

if($query){
    header("location:pinjam.php?pesan=update_berhasil");
}else{
    echo "ERROR : " . mysqli_error($koneksi);
}
?>
