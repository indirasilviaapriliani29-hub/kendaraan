<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kendaraan</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .center-wrapper {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-box {
            background: white;
            width: 380px;
            padding: 25px 35px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }

        .form-box h3 {
            text-align: center;
            margin-top: 0;
            font-weight: normal;
        }

        label {
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 3px;
            margin-bottom: 12px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 14px;
        }

        .btn-submit {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 15px;
        }

        .btn-submit:hover {
            background: #0069d9;
        }

        .btn-back {
            display: block;
            text-align: center;
            margin-top: 12px;
            text-decoration: none;
            color: #555;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="center-wrapper">

    <div class="form-box">

        <h3>Tambah Kendaraan</h3>

        <form action="kendaraan_update.php" method="post">

            <label>Nomor Kendaraan</label>
            <input type="text" name="kendaraan_nomor" required>

            <label>Nama Kendaraan</label>
            <input type="text" name="kendaraan_nama" required>

            <label>Tipe Kendaraan</label>
            <input type="text" name="kendaraan_tipe" required>

            <label>Harga Per Hari</label>
            <input type="number" name="kendaraan_harga_perhari" required>

            <input type="hidden" name="mode" value="tambah">

            <button type="submit" class="btn-submit">Simpan</button>

            <a href="kendaraan.php" class="btn-back">Kembali</a>

        </form>
    </div>
</div>

</body>
</html>

