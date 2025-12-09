<?php
    include 'header.php';
?>

<div class="container">
    <br><br><br>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Edit User</h4>
            </div>
            <div class="panel-body">
                <?php
                    include '../koneksi.php';
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$id'");
                    while ($d = mysqli_fetch_array($data)) {
                ?>
                    <form method="post" action="user_update.php">

                        <div class="form-group">
                            <label>Id</label>
                            <input type="text" name="user_id" class="form-control" value="<?php echo $d['user_id']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $d['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" value="<?php echo $d['password']; ?>">
                        </div>
                        <div class="form-group">
                            <label>User_nama</label>
                            <input type="text" name="user_nama" class="form-control" value="<?php echo $d['user_nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="user_alamat" class="form-control" value="<?php echo $d['user_alamat']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" name="user_status" class="form-control" value="<?php echo $d['user_status']; ?>">
                        </div>

                        <br>
                        <input type="submit" class="btn btn-primary" value="Simpan">

                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


