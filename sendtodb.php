<?php
    include 'dbconnect.php';

    session_start();

    $nama_bar=$_POST['nama'];
    $kategori=$_POST['kat'];
    $harga=$_POST['harga'];
    $penjual=$_SESSION['admin'];

    $idkat = "SELECT  id_kategori FROM kategori 
    WHERE  tipe_barang = '$kategori' ";
    $val=mysqli_query($con,$idkat);
    
    if(mysqli_num_rows($val) == 0)
    {
        
        $ins = "INSERT INTO kategori VALUES(NULL,'$kategori')";
        mysqli_query($con,$ins);
        $newkat=mysqli_query($con,$idkat);
        $kat=mysqli_fetch_assoc($newkat);
        $id_kat = $kat['id_kategori'];
        echo $id_kat;

    }
    else 
    {
        $kat=mysqli_fetch_assoc($val);
        $id_kat = $kat['id_kategori'];
        echo $id_kat;

    }
    $idpen = "SELECT p.id_penjual FROM penjual p 
    WHERE p.nama_penjual = '$penjual' ";
    $pen=mysqli_query($con,$idpen);
    $penj=mysqli_fetch_assoc($pen);
    $id_pen = $penj['id_penjual'];
    
    $ins = "INSERT INTO barang(id_penjual,nama_barang,id_kategori,harga_jual) VALUES($id_pen,'$nama_bar',$id_kat,$harga)";
    mysqli_query($con,$ins);
  

    header("location: product_admin.php");

?>