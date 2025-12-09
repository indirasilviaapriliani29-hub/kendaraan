<?php 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah User Baru</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <style>
        body {
            background: #f3f7f2;
            font-family: 'Segoe UI', sans-serif;
        }

        .panel {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>
<div class="container" 
     style="min-height:100vh; display:flex; justify-content:center; align-items:center;">

    <div class="col-md-5">
        <div class="panel">
            <div class="panel-heading">
                <h4>Tambah User Baru</h4>
            </div>
            <div class="panel-body">

                <form method="post" action="user_aksi.php">

                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" class="form-control" name="user_id" placeholder="Masukkan user id ..">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan username ..">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Masukkan password ..">
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="user_nama" placeholder="Masukkan nama ..">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="user_alamat" placeholder="Masukkan alamat ..">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control" name="user_status" placeholder="Masukkan status ..">
                    </div>

                    <br/>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                    <a href="user.php" class="btn btn-warning">Kembali</a>

                </form>

            </div>
        </div>
    </div>

</div>

</body>
</html>



