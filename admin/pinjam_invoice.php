<?php
include '../koneksi.php';

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$data = mysqli_query($koneksi,"
    SELECT 
        pinjam.*,
        user.user_nama,
        user.user_alamat,
        kendaraan.kendaraan_nama,
        kendaraan.kendaraan_tipe,
        kendaraan.kendaraan_harga_perhari
    FROM pinjam
    JOIN user ON pinjam.user_id = user.user_id
    JOIN kendaraan ON pinjam.kendaraan_nomor = kendaraan.kendaraan_nomor
    WHERE pinjam.pinjam_id = '$id'
");

$invoice = mysqli_fetch_assoc($data);

if (!$invoice) {
    echo "<h2 style='color:red;text-align:center;'>DATA TIDAK DITEMUKAN</h2>";
    echo "<p style='text-align:center;'>Pastikan link menggunakan ?id= pada URL.</p>";
    exit();
}

$lama = (strtotime($invoice['tgl_kembali']) - strtotime($invoice['tgl_pinjam'])) / 86400;
if($lama <= 0) $lama = 1;

$total = $lama * $invoice['kendaraan_harga_perhari'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Invoice Pinjam Kendaraan</title>
    <style>
        body {
            font-family: Arial;
            margin: 30px;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .table-box {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .table-box th, .table-box td {
            border: 1px solid #333;
            padding: 8px;
            font-size: 14px;
        }
        .title-head {
            background: #eee;
            font-weight: bold;
            text-align: left;
        }
        .print-btn {
            margin-top: 25px;
            display: inline-block;
            padding: 10px 18px;
            background: #2e8b57;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .print-btn:hover {
            background: #256b47;
        }
    </style>
</head>
<body>

<h2>INVOICE RENTAL KENDARAAN</h2>

<table class="table-box">
    <tr>
        <th colspan="2" class="title-head">Data Penyewa</th>
    </tr>
    <tr><td>Nama</td><td><?php echo $invoice['user_nama']; ?></td></tr>
    <tr><td>Alamat</td><td><?php echo $invoice['user_alamat']; ?></td></tr>
</table>

<br>

<table class="table-box">
    <tr>
        <th colspan="2" class="title-head">Data Kendaraan</th>
    </tr>
    <tr><td>Nomor Kendaraan</td><td><?php echo $invoice['kendaraan_nomor']; ?></td></tr>
    <tr><td>Nama Kendaraan</td><td><?php echo $invoice['kendaraan_nama']; ?></td></tr>
    <tr><td>Tipe Kendaraan</td><td><?php echo $invoice['kendaraan_tipe']; ?></td></tr>
    <tr><td>Harga / Hari</td><td>Rp <?php echo number_format($invoice['kendaraan_harga_perhari']); ?></td></tr>
</table>

<br>

<table class="table-box">
    <tr>
        <th colspan="2" class="title-head">Data Peminjaman</th>
    </tr>
    <tr><td>Tanggal Pinjam</td><td><?php echo $invoice['tgl_pinjam']; ?></td></tr>
    <tr><td>Tanggal Kembali</td><td><?php echo $invoice['tgl_kembali']; ?></td></tr>
    <tr><td>Status</td><td><?php echo strtoupper($invoice['pinjam_status']); ?></td></tr>
    <tr><td>Lama Sewa</td><td><?php echo $lama; ?> Hari</td></tr>
    <tr>
        <td><b>Total Bayar</b></td>
        <td><b>Rp <?php echo number_format($total); ?></b></td>
    </tr>
</table>

<br>

<a href="javascript:window.print()" class="print-btn">Print Invoice</a>

</body>
</html>
