<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Kendaraan</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <style>
        body {
            background: #f0f0f0;
            padding-top: 80px;
        }
        .login-panel {
            margin-top: 50px;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.3);
            border-radius: 10px;
            padding: 30px;
            background: #fff;
        }
        h2 {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <center><h2>SISTEM RENTAL KENDARAAN</h2></center>
                
                <?php
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "gagal") {
                        echo "<div class='alert alert-danger'>Login Gagal! Username atau Password SALAH!</div>";
                    } elseif ($_GET['pesan']== "logout") {
                        echo "<div class='alert alert-info'>Anda telah berhasil logout</div>";
                    } elseif ($_GET['pesan']== "belum_login") {
                        echo "<div class='alert alert-warning'>Anda harus login untuk mengakses halaman admin!</div>";
                    }
                }
                ?>
                
                <div class="login-panel">
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>

            </div>
        </div>
    </div>    
</body>
</html>
