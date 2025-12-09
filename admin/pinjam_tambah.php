<?php include '../koneksi.php'; ?>

<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div style="
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #f3f7f2;
    font-family: 'Segoe UI', sans-serif;
">

    <div class="col-md-6">

        <div class="panel" style="border-radius:12px; padding:25px;">
            <div class="panel-heading text-center">
                <h4 style="font-weight:600;">Tambah Pinjam</h4>
            </div>

            <div class="panel-body">
                
                <a href="pinjam.php" class="btn btn-sm btn-info pull-right">Kembali</a>
                <div style="clear:both;"></div>
                <br>

                <form method="post" action="pinjam_aksi.php">

                    <div class="form-group">
                        <label>Nomor Kendaraan</label>
                        <input type="text" class="form-control" name="kendaraan_nomor" placeholder="Masukkan nomor kendaraan.." required>
                    </div>

                    <div class="form-group">
                        <label>User ID</label>
                        <input type="text" class="form-control" name="user_id" placeholder="Masukkan user ID.." required>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input type="date" class="form-control" name="tgl_pinjam" required>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <input type="date" class="form-control" name="tgl_kembali" required>
                    </div>

                    <div class="form-group">
                        <label>Status Pinjam</label>
                        <select class="form-control" name="pinjam_status" required>
                            <option value="pinjam">Pinjam</option>
                            <option value="kembali">Kembali</option>
                        </select>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>

                </form>

            </div>
        </div>

    </div>

</div>

