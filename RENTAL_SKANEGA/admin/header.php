<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Rental Kendaraan RPL Skanega</title>

    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>

    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f5f5;
        }
        .navbar {
            background: #F7B5D3 !important; 
            border: none !important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.25);
        }
        .navbar-brand {
            color: #E3319D !important; 
            font-weight: 600;
            font-size: 16px;
            letter-spacing: .5px;
        }
        /* Menu kiri */
        .navbar-inverse .navbar-nav > li > a {
            color: white !important;
            padding: 12px 20px;
            font-size: 14px;
            transition: 0.25s;
        }
        .navbar-inverse .navbar-nav > li > a:hover {
            background: #F0A8D0 !important;
            color: #E3319D !important;
        }
        .navbar-inverse .navbar-nav > .active > a {
            background: #DE5FA2 !important;
            color: white !important;
            border-radius: 4px;
            font-weight: 600;
        }
        .navbar-text {
            color: #FFC0CB !important;
            font-size: 14px;
        }
        .navbar-toggle {
            border-color: #FFC0CB !important;
        }
        .icon-bar {
            background-color: #FFC0CB !important;
        }
        .navbar-brand {
            font-size: 20px !important;       
            color: #FFC0CB !important;         
            font-weight: 600 !important;
            padding: 15px 20px !important;     
        }
        .navbar-center {
            float: none !important;
            margin: 0 auto !important;
            display: table !important;
        }
    </style>
</head>
<body>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
}

$current_page = basename($_SERVER["PHP_SELF"]);
?>

<nav class="navbar navbar-inverse" style="border-radius:0px;">
    <div class="container-fluid">
CA
        <div class="row" style="padding: 10px 15px;">
            <div class="col-md-12 text-center">
                <span style="color:#C71585; font-size:22px; font-weight:600; letter-spacing:1px;">
                    SISTEM INFORMASI RENTAL KENDARAAN RPL SKANEGA
                </span>
            </div>
        </div>

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="nav navbar-nav navbar-center">
                <li class="<?= ($current_page == 'index.php') ? 'active' : '' ?>">
                    <a href="index.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a>
                </li>
                <li class="<?= ($current_page == 'user.php') ? 'active' : '' ?>">
                    <a href="user.php"><i class="glyphicon glyphicon-user"></i> User</a>
                </li>
                <li class="<?= ($current_page == 'kendaraan.php') ? 'active' : '' ?>">
                    <a href="kendaraan.php"><i class="glyphicon glyphicon-modal-window"></i> Kendaraan</a>
                </li>
                <li class="<?= ($current_page == 'pinjam.php') ? 'active' : '' ?>">
                    <a href="pinjam.php"><i class="glyphicon glyphicon-list-alt"></i> Pinjam</a>
                </li>
                <li class="<?= ($current_page == 'laporan.php') ? 'active' : '' ?>">
                    <a href="laporan.php"><i class="glyphicon glyphicon-book"></i> Laporan</a>
                </li>
                <li>
                    <a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Log Out</a>
                </li>
            </ul>
        </div>

        <div class="row" style="background:#FCA7CE; padding:8px 15px;">
            <div class="col-md-12 text-right">
                <span style="color:#ffffff; font-size:14px;">
                    Halo, <b><?= $_SESSION['email']; ?></b>!
                </span>
            </div>
        </div>

    </div>
</nav>
</nav>