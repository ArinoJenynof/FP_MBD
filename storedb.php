<?php

include 'dbconnect.php';

$link='';
		if(isset($_GET['link'])) {
			$link=$_GET['link'];
		}

		$sql = "SELECT k.tipe_barang,b.id_barang, b.nama_barang, p.nama_penjual,p.id_penjual, b.harga_jual, b.jumlah_total  FROM barang b
		JOIN kategori k ON b.id_kategori = k.id_kategori
		JOIN penjual p ON b.id_penjual = p.id_penjual
		WHERE k.id_kategori =  '$link' ";	


?>