<?php
include '../koneksi.php';

$mode = $_POST['mode'];

$nomor = $_POST['kendaraan_nomor'];
$nama = $_POST['kendaraan_nama'];
$tipe = $_POST['kendaraan_tipe'];
$harga = $_POST['kendaraan_harga_perhari'];

if ($mode == "tambah") {

    mysqli_query($koneksi, "INSERT INTO kendaraan VALUES (
        '$nomor',
        '$nama',
        '$tipe',
        '$harga'
    )");

    header("location:kendaraan.php?pesan=tambah_berhasil");

} else if ($mode == "edit") {

    mysqli_query($koneksi, "UPDATE kendaraan SET 
        kendaraan_nama='$nama',
        kendaraan_tipe='$tipe',
        kendaraan_harga_perhari='$harga'
        WHERE kendaraan_nomor='$nomor'
    ");

    header("location:kendaraan.php?pesan=edit_berhasil");
}
?>
