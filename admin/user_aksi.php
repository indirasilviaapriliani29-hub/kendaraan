<?php

include '../koneksi.php';

$username    = $_POST['username'];
$password    = $_POST['password'];
$user_nama   = $_POST['user_nama'];
$user_alamat = $_POST['user_alamat'];
$user_status = $_POST['user_status'];

mysqli_query($koneksi, "INSERT INTO user (
    username, password, user_nama, user_alamat, user_status
) VALUES (
    '$username',
    '$password',
    '$user_nama',
    '$user_alamat',
    '$user_status'
)");

echo "<script>alert('Data Tersimpan'); window.location.href='user.php'</script>";

?>

