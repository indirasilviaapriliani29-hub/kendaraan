<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rental Kendaraan</title>

    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">

    <style>
        body {
            background: rgba(164, 223, 187, 1);
        }

        nav.navbar-custom {
            width: 100%;
            background: #2e8b57;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand-left {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .brand-left span {
            color: white;
            font-size: 18px;
            font-weight: 700;
        }

        .menu-left {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-left: 25px;
        }

        .menu-left a {
            color: white;
            font-weight: 600;
            text-decoration: none;
        }

        .menu-left a:hover {
            opacity: 0.8;
        }

        .nav-right {
            color: white;
            font-weight: bold;
        }

        .container {
            margin-top: 20px !important;
        }

        <?php if ($currentPage == "index.php") { ?>
        .container {
            margin-top: 45px !important;
        }
        <?php } ?>

        footer {
            margin-top: 20px !important;
        }
    </style>
</head>
<body>

<nav class="navbar-custom">

    <div style="display:flex; align-items:center; gap:25px;">
        <div class="brand-left">
            <i class="fa fa-car" style="color:white; font-size:20px;"></i>
            <span>Rental Kendaraan</span>
        </div>

        <div class="menu-left">
            <a href="index.php"><i class="fa fa-home"></i> Dashboard</a>
            <a href="user.php"><i class="fa fa-users"></i> User</a>
            <a href="kendaraan.php"><i class="fa fa-car"></i> Kendaraan</a>
            <a href="pinjam.php"><i class="fa fa-key"></i> Pinjam</a>
            <a href="laporan.php"><i class="fa fa-file"></i> Laporan</a>
            <a href="logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>

    <div class="nav-right">
        Hallo Rott!
    </div>

</nav>

