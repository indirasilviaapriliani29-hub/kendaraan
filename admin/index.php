<?php
session_start();
include 'header.php';
include '../koneksi.php';
?>

<div class="container" style="margin-top:20px;">

    <!-- ALERT SELAMAT DATANG -->
    <div class="alert alert-success text-center" style="background-color:#a4dfbb; border:none; color:#2e8b57; font-weight:900; font-size:18px;">
        Selamat Datang! di Sistem Informasi Rental Kendaraan
    </div>

    <!-- DASHBOARD PANELS -->
    <div class="row text-center">

        <!-- Jumlah User -->
        <div class="col-md-3 mb-3">
            <div class="panel panel-hover" style="background-color:#d8f3dc; border-radius:10px; padding:20px; box-shadow:2px 2px 8px rgba(0,0,0,0.1); transition: transform 0.3s, box-shadow 0.3s;">
                <i class="glyphicon glyphicon-user" style="font-size:40px; color:#2e8b57;"></i>
                <h2 style="margin-top:10px;">
                    <?php
                    $user = mysqli_query($koneksi, "SELECT * FROM user");
                    echo mysqli_num_rows($user);
                    ?>
                </h2>
                <p>Jumlah User</p>
            </div>
        </div>

        <!-- Jumlah Kendaraan -->
        <div class="col-md-3 mb-3">
            <div class="panel panel-hover" style="background-color:#d8f3dc; border-radius:10px; padding:20px; box-shadow:2px 2px 8px rgba(0,0,0,0.1); transition: transform 0.3s, box-shadow 0.3s;">
                <i class="fas fa-car" style="font-size:40px; color:#2e8b57;"></i>
                <h2 style="margin-top:10px;">
                    <?php
                    $kendaraan = mysqli_query($koneksi, "SELECT * FROM kendaraan");
                    echo mysqli_num_rows($kendaraan);
                    ?>
                </h2>
                <p>Jumlah Kendaraan</p>
            </div>
        </div>

        <!-- Peminjaman Berjalan -->
        <div class="col-md-3 mb-3">
            <div class="panel panel-hover" style="background-color:#fff3cd; border-radius:10px; padding:20px; box-shadow:2px 2px 8px rgba(0,0,0,0.1); transition: transform 0.3s, box-shadow 0.3s;">
                <i class="glyphicon glyphicon-time" style="font-size:40px; color:#856404;"></i>
                <h2 style="margin-top:10px;">
                    <?php
                    $pinjam_proses = mysqli_query($koneksi, "SELECT * FROM pinjam WHERE pinjam_status='pinjam'");
                    echo mysqli_num_rows($pinjam_proses);
                    ?>
                </h2>
                <p>Peminjaman Berjalan</p>
            </div>
        </div>

        <!-- Peminjaman Selesai -->
        <div class="col-md-3 mb-3">
            <div class="panel panel-hover" style="background-color:#d8f3dc; border-radius:10px; padding:20px; box-shadow:2px 2px 8px rgba(0,0,0,0.1); transition: transform 0.3s, box-shadow 0.3s;">
                <i class="glyphicon glyphicon-ok-circle" style="font-size:40px; color:#2e8b57;"></i>
                <h2 style="margin-top:10px;">
                    <?php
                    $pinjam_selesai = mysqli_query($koneksi, "SELECT * FROM pinjam WHERE pinjam_status='kembali'");
                    echo mysqli_num_rows($pinjam_selesai);
                    ?>
                </h2>
                <p>Peminjaman Selesai</p>
            </div>
        </div>

    </div>

    <!-- RIWAYAT PEMINJAMAN -->
    <div class="panel" style="margin-top:20px; border-radius:10px; border:1px solid #b7e4c7; box-shadow:2px 2px 8px rgba(0,0,0,0.05);">
        <div class="panel-heading" style="background-color:#2e8b57; color:white; font-weight:bold; padding:10px 15px; border-top-left-radius:10px; border-top-right-radius:10px;">
            Riwayat Peminjaman Terakhir
        </div>
        <div class="panel-body p-3">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead style="background-color:#a4dfbb;">
                        <tr>
                            <th>NO</th>
                            <th>ID Pinjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>User</th>
                            <th>Kendaraan</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $data = mysqli_query($koneksi,
                            "SELECT * FROM pinjam 
                             JOIN user ON pinjam.user_id = user.user_id
                             JOIN kendaraan ON pinjam.kendaraan_nomor = kendaraan.kendaraan_nomor
                             ORDER BY pinjam_id DESC LIMIT 10");
                        while ($d = mysqli_fetch_array($data)) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $d['pinjam_id']; ?></td>
                                <td><?= date('d-m-Y', strtotime($d['tgl_pinjam'])); ?></td>
                                <td><?= $d['user_nama']; ?></td>
                                <td><?= $d['kendaraan_nama']; ?></td>
                                <td><?= date('d-m-Y', strtotime($d['tgl_kembali'])); ?></td>
                                <td>
                                    <?php if ($d['pinjam_status'] == 'pinjam') { ?>
                                        <span class="badge bg-warning text-dark">DIPINJAM</span>
                                    <?php } else { ?>
                                        <span class="badge bg-success">SELESAI</span>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Tambahkan CSS animasi hover -->
<style>
.panel-hover:hover {
    transform: translateY(-5px);
    box-shadow: 4px 4px 15px rgba(0,0,0,0.2);
    cursor: pointer;
}
.table-hover tbody tr:hover {
    background-color: #c6f0d6 !important;
}
</style>

<?php include 'footer.php'; ?>







