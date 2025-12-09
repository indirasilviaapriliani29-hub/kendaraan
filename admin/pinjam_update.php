<?php
include '../koneksi.php';

$pinjam_id        = $_POST['pinjam_id'];
$user_id          = $_POST['user_id'];
$kendaraan_nomor  = $_POST['kendaraan_nomor'];
$tgl_pinjam       = $_POST['tgl_pinjam'];
$tgl_kembali      = $_POST['tgl_kembali'];
$status           = $_POST['status'];

$k = mysqli_query($koneksi, "SELECT kendaraan_harga_perhari FROM kendaraan WHERE kendaraan_nomor='$kendaraan_nomor'");

$kendaraan = mysqli_fetch_assoc($k);

$lama_sewa = (strtotime($tgl_kembali) - strtotime($tgl_pinjam)) / 86400;
if ($lama_sewa <= 0) $lama_sewa = 1;

mysqli_query($koneksi, 
    "UPDATE pinjam SET 
        user_id='$user_id',
        kendaraan_nomor='$kendaraan_nomor',
        tgl_pinjam='$tgl_pinjam',
        tgl_kembali='$tgl_kembali',
        pinjam_status='$status'
     WHERE pinjam_id='$pinjam_id'"
);

echo "<script>alert('Data pinjam berhasil diubah'); window.location.href='pinjam.php'</script>";
?>

