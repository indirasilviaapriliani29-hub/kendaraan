<?php
$koneksi = mysqli_connect("localhost","root","","db_rental_skanega_indira");
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal :". mysqli_connect_errno();
}
?>