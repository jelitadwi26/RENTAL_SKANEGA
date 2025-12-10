<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>

    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <style>
        body{
            background:#e9f5ee;
            font-family: "Poppins", sans-serif;
        }
        .card{
            background:white;
            padding:25px;
            border-radius:10px;
            box-shadow:0 4px 12px rgba(0,0,0,0.15);
            max-width:550px;
            margin:auto;
            margin-top:40px;
        }
        h3{
            text-align:center;
            color:#2d6a4f;
            font-weight:600;
        }
        label{
            font-weight:600;
            color:#1b4332;
        }
        .btn-success{
            background:#2d6a4f;
            border:none;
        }
        .btn-success:hover{
            background:#1b4332;
        }
        .btn-default:hover{
            background:#b7e4c7;
        }
    </style>
</head>
<body>

<div class="card">
    <h3>Tambah User Baru</h3>
    <hr>

    <form action="user_tambah_act.php" method="post">

        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" placeholder="Masukkan username" required>
        </div>
        <div class="form-group">
            <label>Password User</label>
            <input type="password" class="form-control" name="user_password" placeholder="Masukkan password" required>
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="user_nama" placeholder="Masukkan nama" required>
        </div>
        <div class="form-group">
            <label>Email User</label>
            <input type="email" class="form-control" name="user_email" placeholder="Masukkan email" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" name="user_alamat" placeholder="Masukkan alamat" required>
        </div>

        <br>

        <div style="text-align:center;">
            <a href="user.php" class="btn btn-default">Kembali</a>
            <button type="submit" class="btn btn-success">Simpan User</button>
        </div>
    </form>

</div>

</body>
</html>