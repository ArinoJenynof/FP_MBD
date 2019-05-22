<?php
    include 'dbconnect.php';

    session_start();

    if(isset($_GET['id']))

    $id=$_GET['id'];

    $con->query("UPDATE transaksi SET status =  'Dikirim' WHERE id_transaksi=$id");
    header("location: penjtrans.php?kirim=$id");
?>