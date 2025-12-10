<?php
include "../koneksi.php";

if (isset($_POST['kendaraan_nomor'])) {

    $id                      = $_POST['kendaraan_nomor'];
    $kendaraan_nomor         = $_POST['kendaraan_nomor'];
    $kendaraan_nama          = $_POST['kendaraan_nama'];
    $kendaraan_tipe          = $_POST['kendaraan_tipe'];
    $kendaraan_harga_perhari = $_POST['kendaraan_harga_perhari'];
    $kendaraan_status         = $_POST['kendaraan_status'];

    $query = mysqli_query($koneksi, "
        UPDATE kendaraan SET
            kendaraan_nama = '$kendaraan_nama',
            kendaraan_tipe = '$kendaraan_tipe',
            kendaraan_harga_perhari = '$kendaraan_harga_perhari',
            kendaraan_status = '$kendaraan_status'
        WHERE kendaraan_nomor = '$id'
    ");

    if ($query) {
        header("location:kendaraan.php?pesan=update_berhasil");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
