<?php
    include 'dbconnect.php';

    session_start();

    $name=$_POST['username'];
    $tipe=$_POST['tipe_pengguna'];
    $pass=$_POST['password'];
    $confirm=$_POST['password2'];

    $checkmail = mysqli_num_rows(mysqli_query($con,"SELECT * from $tipe WHERE nama_$tipe  ='$name'"));

    if($pass != $confirm) {
        $_SESSION['msg']="Password Tidak Sama";
        header("location: login.php");
    }
    else if($checkmail > 0) {
        $_SESSION['msg']="Email Sudah Ada";
        header("location: login.php");
    }
    else {
        mysqli_query($con,"INSERT INTO $tipe(nama_$tipe,katakunci) VALUES ('$name','$pass')");
        $_SESSION['msg']='Registrasi Berhasil';
        header("location: login.php");
    }


?>