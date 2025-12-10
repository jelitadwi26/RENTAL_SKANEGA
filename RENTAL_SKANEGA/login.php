<?php
    session_start();

    include 'koneksi.php';
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $data = mysqli_query($koneksi,"select * from admin where email='$email' and password='$password'");
    $cek = mysqli_num_rows($data);
    if ($cek>0) {
        $_SESSION['email'] = $email;
        $_SESSION['status'] = "login";
        header("location:admin/index.php");
    }else{
        header("location:index.php?pesan=gagal");
    }

?>