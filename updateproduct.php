<?php
    include 'dbconnect.php';

    session_start();

    $id=$_POST['id'];

    if(isset($_POST['jual']))
    {
        $ju =$_POST['jual'];
        $upjul = "CALL update_harga($id,$ju)";
        mysqli_query($con,$upjul);
    }
    $be=$_POST['beli'];
    $jumlah=$_POST['jumlah'];


    $call_jum="CALL tambah_stock_barang($jumlah,$be,$id)";
    mysqli_query($con,$call_jum);

    header("location: product_admin.php");

?>