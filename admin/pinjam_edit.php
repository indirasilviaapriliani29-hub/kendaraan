<?php
    include 'header.php';
?>

<?php
    include '../koneksi.php';
?>
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Edit Pinjam Kendaraan</h4>
        </div>
        <div class="panel-body">
            <div class="col-md-8 col-md-offset-2">
                <a href="pinjam.php" class="btn btn-sm btn-info pull-right">Kembalil</a>
                <br/>
                <br/>
                <?php
                $id = $_GET['id'];
                $transaksi = mysqli_query($koneksi,"select * from pinjam where pinjam_id='$id'");
                while($t=mysqli_fetch_array($transaksi)){
                    ?>
                <form method="post" action="pinjam_update.php">
                    <input type="hidden" name="id" value="<?php echo $t['pinjam_id']; ?>">

                     <div class="form-group">
                        <label>Id</label>
                        <select class="form-control" name="pinjam_id" required="required">
                            <option value="-">- Pilih Id</option>
                            <?php
                            $data = mysqli_query($koneksi, "select * from pinjam");
                            while($d = mysqli_fetch_array($data)){
                                ?>
                                <option <?php if($d['pinjam_id'] == $t['pinjam_id']){echo "selected='selected'";} ?> value="<?php echo $d['pinjam_id']; ?>"><?php echo $d['pinjam_id']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Kendaraan Nomer</label>
                        <input type="text" class="form-control" name="kendaraan_nomor" placeholder="Masukkan kendaraan nomor  .." required="required" value="<?php echo $t['kendaraan_nomor']; ?>">
                    </div>
                    <div class="form-group">
                        <label>User Id</label>
                        <input type="text" class="form-control" name="user_id" placeholder="Masukkan user id  .." required="required" value="<?php echo $t['user_id']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input type="date" class="form-control" name="tgl_pinjam" required="required" value="<?php echo $t['tgl_pinjam']; ?>">
                    </div>
                     <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <input type="date" class="form-control" name="tgl_kembali" required="required" value="<?php echo $t['tgl_kembali']; ?>">
                    </div>
                    <br/>

                    <div class="form-group alert alert-info">
                        <label>Status</label>
                            <select class="form-control" name="status" required="required">
                                <option <?php if($t['pinjam_status']=="0"){echo "selected='selected'";} ?> value="0">READY</option>
                                <option <?php if($t['pinjam_status']=="1"){echo "selected='selected'";} ?> value="1">DIPINJAM</option>
                             </select>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Simpan">

                    </form>
                    <?php
                }
                ?>
                </div>

            </div>
        </div>
    </div>