<!DOCTYPE html>
<html>
<head>
    <title>SISTEM INFORMASI RENTAL KENDARAAN RPL SKANEGA</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>

    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        h2 {
            text-align: center;
            font-weight: bold;
        }
</style>

<body style="background: #f0f0f0;">
    <br><br><br>
    <center>
        <h2>SISTEM INFORMASI RENTAL KENDARAAN RPL SKANEGA</h2>
    </center>
    <br><br><br>
    <div class="container">
        <div class="col-md-4 col-md-offset-4">
        	<?php
        	    if (isset($_GET['pesan'])) {
        	    if ($_GET['pesan'] == "gagal") {
        	    	echo "<div class='alert alert-danger'>Login Gagal!
        	    	Email atau Password SALAH!</div>";
        	    }elseif ($_GET['pesan'] == "logout") {
        	    	echo "<div class='alert alert-info'>Anda telah berhasil logout</div>";
        	    }elseif ($_GET['pesan'] == "belum_login") {
        	    	echo "<div class='alert alert5-danger'>Anda harus login untuk mengakses halaman admin!<?div>";
        	    }
        	}
        	?>
            <form method="post" action="login.php">
                <div class="panel">
                    <br>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div clas="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div><br>
                        <input type="submit" class="btn btn-primary" value="Log In">
                    </div>
                    <br>
                </div>
            </form>
        </div>
    </div>
</body>
</html>