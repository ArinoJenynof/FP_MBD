<?php
    include 'dbconnect.php';

    session_start();

    $name=$_POST['username'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $loc=$_POST['alamat'];
    $pass=$_POST['password'];
    $confirm=$_POST['password2'];


    if($pass == $confirm) {
        $_SESSION['msgr']="Update Berhasil";
        $con->query("UPDATE user SET email='$email',username='$name',phone='$phone',alamat='$loc',katakunci='$pass' WHERE email='$email'");
        header("location: userpageawal.php");
    }
    else {
        $_SESSION['msgr']="Password Tidak Sama";
        header("location: userpageawal.php");
    }




?>