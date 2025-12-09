<?php
include '../koneksi.php';

$dari = $_GET['dari'];
$sampai = $_GET['sampai'];

$query = "SELECT 
            pinjam.*,
            user.user_nama,
            kendaraan.kendaraan_nama
          FROM pinjam
          JOIN user ON pinjam.user_id = user.user_id
          JOIN kendaraan ON pinjam.kendaraan_nomor = kendaraan.kendaraan_nomor";

if ($dari != "" && $sampai != "") {
    $query .= " WHERE tgl_pinjam BETWEEN '$dari' AND '$sampai'";
}

$data = mysqli_query($koneksi, $query);
?>

<html>
<head>
    <title>Print Laporan</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; }
        h3 { text-align: center; }
    </style>
</head>
<body onload="window.print()">

<h3>LAPORAN PEMINJAMAN KENDARAAN</h3>

<table>
    <tr>
        <th>No</th>
        <th>Tanggal Pinjam</th>
        <th>Nama Penyewa</th>
        <th>Kendaraan</th>
        <th>Status</th>
    </tr>

    <?php 
    $no = 1;
    while($d = mysqli_fetch_array($data)){
    ?>

    <tr>
        <td><?= $no++; ?></td>
        <td><?= $d['tgl_pinjam']; ?></td>
        <td><?= $d['user_nama']; ?></td>
        <td><?= $d['kendaraan_nama']; ?></td>
        <td><?= $d['pinjam_status']; ?></td>
    </tr>

    <?php } ?>
</table>

</body>
</html>
