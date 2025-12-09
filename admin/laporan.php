<?php
include 'header.php';
include '../koneksi.php';

$dari = isset($_GET['dari']) ? $_GET['dari'] : '';
$sampai = isset($_GET['sampai']) ? $_GET['sampai'] : '';

$query = "
    SELECT 
        pinjam.*,
        user.user_nama,
        kendaraan.kendaraan_nama,
        kendaraan.kendaraan_tipe,
        kendaraan.kendaraan_harga_perhari
    FROM pinjam
    JOIN user ON pinjam.user_id = user.user_id
    JOIN kendaraan ON pinjam.kendaraan_nomor = kendaraan.kendaraan_nomor
";

if ($dari != "" && $sampai != "") {
    $query .= " WHERE tgl_pinjam BETWEEN '$dari' AND '$sampai'";
}

$query .= " ORDER BY pinjam.pinjam_id DESC";

$data = mysqli_query($koneksi, $query);
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4><i class="fa fa-file"></i> Laporan Peminjaman Kendaraan</h4>
        </div>

        <div class="panel-body">

            <form method="get" class="form-inline">
                <label>Dari Tanggal</label>
                <input type="date" name="dari" class="form-control" value="<?= $dari ?>">

                <label>Sampai Tanggal</label>
                <input type="date" name="sampai" class="form-control" value="<?= $sampai ?>">

                <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                <a href="laporan.php" class="btn btn-default btn-sm">Reset</a>
            </form>

            <hr>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Tanggal Pinjam</th>
                        <th>Nama Penyewa</th>
                        <th>Kendaraan</th>
                        <th>Tipe</th>
                        <th>Harga/Hari</th>
                        <th>Lama</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                <?php 
                $no = 1;
                while($d = mysqli_fetch_array($data)) {

                    $lama = (strtotime($d['tgl_kembali']) - strtotime($d['tgl_pinjam'])) / 86400;
                    if ($lama <= 0) $lama = 1;

                    $harga = $d['kendaraan_harga_perhari'];
                    $total = $lama * $harga;
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d['tgl_pinjam']; ?></td>
                        <td><?= $d['user_nama']; ?></td>
                        <td><?= $d['kendaraan_nama']; ?></td>
                        <td><?= $d['kendaraan_tipe']; ?></td>
                        <td>Rp <?= number_format($harga); ?></td>
                        <td><?= $lama ?> Hari</td>
                        <td><b>Rp <?= number_format($total); ?></b></td>
                        <td><?= $d['pinjam_status']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

            <a href="laporan_print.php?dari=<?= $dari ?>&sampai=<?= $sampai ?>" class="btn btn-success btn-sm" target="_blank">
                <i class="fa fa-print"></i> Print Laporan
            </a>

        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

