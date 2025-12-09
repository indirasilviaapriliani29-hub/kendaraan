<?php
include 'header.php';
include '../koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE kendaraan_nomor='$id'");
$d = mysqli_fetch_assoc($data);
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Edit Kendaraan</h4>
        </div>

        <div class="panel-body">

            <form action="kendaraan_update.php" method="post">

                <div class="form-group">
                    <label>Nomor Kendaraan</label>
                    <input type="text" name="kendaraan_nomor" class="form-control" value="<?= $d['kendaraan_nomor']; ?>">
                </div>

                <div class="form-group">
                    <label>Nama Kendaraan</label>
                    <input type="text" name="kendaraan_nama" class="form-control" value="<?= $d['kendaraan_nama']; ?>" required>
                </div>

                <div class="form-group">
                    <label>Tipe Kendaraan</label>
                    <input type="text" name="kendaraan_tipe" class="form-control" value="<?= $d['kendaraan_tipe']; ?>" required>
                </div>

                <div class="form-group">
                    <label>Harga Per Hari</label>
                    <input type="number" name="kendaraan_harga_perhari" class="form-control" value="<?= $d['kendaraan_harga_perhari']; ?>" required>
                </div>

                <input type="hidden" name="mode" value="edit">

                <br>
                <input type="submit" value="Update" class="btn btn-primary">
                <a href="kendaraan.php" class="btn btn-warning">Kembali</a>

            </form>

        </div>
    </div>
</div>

<?php include 'footer.php'; ?>