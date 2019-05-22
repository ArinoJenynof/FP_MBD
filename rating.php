<?php
    include 'dbconnect.php';

    session_start();

    $id_trans=$_POST['traID'];
    $nilai= $_POST['nilai'];
    $set = "UPDATE transaksi SET status = 'Diterima', penilaian_pembeli = $nilai WHERE id_transaksi = $id_trans ";
    $call=mysqli_query($con,$set);

    header("location: pemtrans.php");

?>