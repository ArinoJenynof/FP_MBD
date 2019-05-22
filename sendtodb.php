<?php
    include 'dbconnect.php';

    session_start();

    $jenis=$_POST['jenis'];
    $tipe=$_POST['tipe'];
    $harga=$_POST['harga'];
    $deskripsi=$_POST['deskripsi'];
    
    if($_FILES['image']['type']){
        $folder="aset/img/";
        $dir=$folder.$_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"],$dir);
    }
    

    $con->query("INSERT INTO hewan VALUES ('','$tipe','$jenis','$harga','$deskripsi','$dir')") ;
    header("location: product_admin.php");

?>