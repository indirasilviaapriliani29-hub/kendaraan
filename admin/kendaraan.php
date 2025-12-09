<?php
include 'header.php';
include '../koneksi.php';
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Kendaraan</h4>
        </div>

        <div class="panel-body">

            <a href="kendaraan_tambah.php" class="btn btn-primary btn-sm">
                <i class="glyphicon glyphicon-plus"></i> Tambah Kendaraan
            </a>
            <br><br>

            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Nomor Kendaraan</th>
                    <th>Nama Kendaraan</th>
                    <th>Tipe</th>
                    <th>Harga / Hari</th>
                    <th width="15%">Aksi</th>
                </tr>

                <?php
                $data = mysqli_query($koneksi, "SELECT * FROM kendaraan");
                $no = 1;
                while ($d = mysqli_fetch_array($data)) {
                ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['kendaraan_nomor']; ?></td>
                    <td><?= $d['kendaraan_nama']; ?></td>
                    <td><?= $d['kendaraan_tipe']; ?></td>
                    <td>Rp.<?= number_format($d['kendaraan_harga_perhari']); ?></td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="kendaraan_edit.php?id=<?= $d['kendaraan_nomor']; ?>">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="kendaraan_hapus.php?id=<?= $d['kendaraan_nomor']; ?>" onclick="return confirm('Hapus kendaraan?')">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>
                    </td>
                </tr>

                <?php } ?>

            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>