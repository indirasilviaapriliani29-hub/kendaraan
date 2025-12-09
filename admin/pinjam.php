<?php include 'header.php'; ?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Rental Kendaraan</h4>
        </div>
        <div class="panel-body">

            <a href="pinjam_tambah.php" class="btn btn-sm btn-info pull-right">Pinjam</a>
            <br/>
            <br/>

            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Id</th>
                    <th>Nomer Kendaraan</th>
                    <th>Nama User</th>
                    <th>Tgl. Pinjam</th>
                    <th>Tgl. Kembali</th>
                    <th>Status</th>
                    <th width="20%">OPSI</th>
                </tr>

                <?php 
                include '../koneksi.php';
                $no = 1;

                $data = mysqli_query($koneksi, "
                    SELECT 
                        pinjam.pinjam_id,
                        pinjam.kendaraan_nomor,
                        pinjam.user_id,
                        pinjam.tgl_pinjam,
                        pinjam.tgl_kembali,
                        pinjam.pinjam_status,
                        user.user_nama
                    FROM pinjam
                    JOIN user ON pinjam.user_id = user.user_id
                    ORDER BY pinjam.pinjam_id DESC
                ");

                while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td>INVOICE-<?php echo $d['pinjam_id']; ?></td>
                    <td><?php echo $d['kendaraan_nomor']; ?></td>
                    <td><?php echo $d['user_nama']; ?></td>
                    <td><?php echo $d['tgl_pinjam']; ?></td>
                    <td><?php echo $d['tgl_kembali']; ?></td>

                    <td>
                        <?php   
                        if($d['pinjam_status'] == "pinjam"){
                        echo "<div class='label label-info'>DISEWA</div>";
                        } elseif($d['pinjam_status'] == "kembali"){
                        echo "<div class='label label-success'>SELESAI</div>";
                        } else {
                        echo "<div class='label label-warning'>PROSES</div>";
                        }
                        ?>
                    </td>
                    </td>

                    <td>
                        <a href="pinjam_invoice.php?id=<?php echo $d['pinjam_id']; ?>" target="_blank" class="btn btn-sm btn-warning">Invoice</a>
                        <a href="pinjam_edit.php?id=<?php echo $d['pinjam_id']; ?>" class="btn btn-sm btn-info">Edit</a>
                        <a href="pinjam_hapus.php?id=<?php echo $d['pinjam_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin membatalkan transaksi ini?')">Batalkan</a>
                    </td>
                </tr>
                <?php 
                }
                ?>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>