<?php
    include 'dbconnect.php';

    session_start();

    $id_trans=$_POST['traID'];
    $set = "UPDATE transaksi SET status = 'Dibayar' WHERE id_transaksi = $id_trans ";
    $call=mysqli_query($con,$set);

    header("location: logged_in.php");

?>