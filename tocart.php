<?php
    include 'dbconnect.php';

    session_start();
    $pembeli = $_SESSION["user"];
    $searchID = "SELECT id_pembeli FROM pembeli WHERE nama_pembeli = '$pembeli' ";
    $pem=mysqli_query($con,$searchID);
    $vals =mysqli_fetch_assoc($pem);
    $id_pem = $vals["id_pembeli"];
    $barang=$_POST['barangID'];
    $jum=$_POST['jumlah'];
    $Id_pen=$_POST['penID'];
    $add_cart = "CALL tambah_cart($id_pem,$Id_pen,$barang,$jum)";
    $call=mysqli_query($con,$add_cart);
    header("location: logged_in.php");

?>