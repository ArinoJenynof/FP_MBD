<?php
    include 'dbconnect.php';

    session_start();
 
    $tipe=$_POST['tipe_pengguna'];
    $name=$_POST['username'];
    $pass=$_POST['password'];

    $sql="SELECT * FROM $tipe WHERE nama_$tipe ='$name' AND katakunci='$pass'";
    $check=$con->query($sql);
    $row=$check->fetch_assoc();

    if(empty($row)) {
        $_SESSION['msg']="Email atau Password Salah";
        header("location: login.php");
    }
    else {
        if($tipe == "penjual" ) {
            $_SESSION["admin"]=$name;
            header("location: product_admin.php");
        }
        else{
            $_SESSION["user"]=$name;
            header("location: logged_in.php");
        }
                
    }
?>