<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "fp_mbd";

$con = new mysqli($host,$user,$pass);

if($con->query("CREATE DATABASE $db") == true ) {

	$con->close();
	
	// $con = mysqli_connect($host,$user,$pass,$db);

	// if($con->query("CREATE TABLE hewan (
	// 			id int(11) AUTO_INCREMENT PRIMARY KEY,
	// 			tipe varchar(25),
	// 			jenis varchar(25),
	// 			harga varchar(25),
	// 			deskripsi text,
	// 			foto varchar(200))") == true  ) {
										
	// 			}

	// if($con->query("CREATE TABLE user (
	// 			id int(11) AUTO_INCREMENT PRIMARY KEY,
	// 			username varchar(25),
	// 			phone varchar(13),
	// 			email varchar(50) NOT NULL,
	// 			alamat text,
	// 			katakunci varchar(30) NOT NULL,
	// 			akses BOOLEAN NOT NULL)") == TRUE ) {
	// 			}

	// if($con->query("INSERT INTO user VALUES ('1','admin','','admin@email','','admin','1')")===TRUE) {

	// }
	// if($con->query("INSERT INTO hewan (tipe,jenis,harga,deskripsi,foto) VALUES ('Dog','Homete!!!!','Rp 900.000,-','Homete!!! Master!!!','aset/img/homete.jpg')")===TRUE) {
		
	// }
	// if($con->query("INSERT INTO hewan (tipe,jenis,harga,deskripsi,foto) VALUES ('Hamster','Hamtaro','Rp 350.000,-','Hamataro Yang Imut Suka Makan Biji Bunga Matahari','aset/img/HamtaroN.png')")===TRUE) {
		
	// }
	// if($con->query("INSERT INTO hewan (tipe,jenis,harga,deskripsi,foto) VALUES ('Dog','Looder Homete??','Rp 850.000,-','Masta-san, lemme paint u','aset/img/art.jpg')")===TRUE) {
		
	// }
}
else $con=mysqli_connect($host, $user, $pass,$db);

?>