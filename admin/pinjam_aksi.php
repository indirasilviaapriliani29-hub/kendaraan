<?php
include '../koneksi.php';

$pinjam_id        = trim($_POST['pinjam_id']);
$kendaraan_nomor  = trim($_POST['kendaraan_nomor']);
$user_id          = trim($_POST['user_id']);
$tgl_pinjam       = trim($_POST['tgl_pinjam']);
$tgl_kembali      = trim($_POST['tgl_kembali']);
$pinjam_status    = trim($_POST['pinjam_status']);

$kendaraan_nomor = strtoupper($kendaraan_nomor);

$k = mysqli_query($koneksi, "SELECT kendaraan_harga_perhari FROM kendaraan WHERE kendaraan_nomor='$kendaraan_nomor'");
if(!$k){
    die("Query gagal: " . mysqli_error($koneksi));
}

$simpan = mysqli_query($koneksi, 
    "INSERT INTO pinjam (
        pinjam_id,
        kendaraan_nomor,
        user_id,
        tgl_pinjam,
        tgl_kembali,
        pinjam_status
    ) VALUES (
        '$pinjam_id',
        '$kendaraan_nomor',
        '$user_id',
        '$tgl_pinjam',
        '$tgl_kembali',
        '$pinjam_status'
    )"
);

if($simpan){
    echo "<script>alert('Data pinjam BERHASIL disimpan!'); window.location='pinjam.php';</script>";
} else {
    echo "<script>alert('GAGAL menyimpan data!'); history.back();</script>";
}
?>






