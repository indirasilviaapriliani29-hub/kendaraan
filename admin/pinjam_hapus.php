<?php
include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM pinjam WHERE pinjam_id='$id'");

echo "<script>alert('Data pinjam berhasil dihapus'); window.location.href='pinjam.php'</script>";
?>
