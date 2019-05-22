<?php
    include 'dbconnect.php';

    session_start();

    if(isset($_GET['id']))

    $id=$_GET['id'];

    $con->query("DELETE FROM stock WHERE id_barang=$id");
    $con->query("DELETE FROM barang WHERE id_barang=$id");
    header("location: product_admin.php?deleteproduct=$id");
?>