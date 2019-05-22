<?php
    include 'dbconnect.php';

    session_start();

    $id=$_POST['id'];
    $tipe=$_POST['tipe'];
    $jenis=$_POST['jenis'];
    $harga=$_POST['harga'];
    $deskripsi=$_POST['deskripsi'];

    if($_FILES['image']['type']){
        $folder="aset/img/";
        $dir=$folder.$_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"],$dir);
    }


    $con->query("UPDATE hewan SET tipe='$tipe',jenis='$jenis',harga='$harga',deskripsi='$deskripsi',foto='$dir' WHERE id='$id'");
    header("location: product_admin.php?editproduct=$id");

?>