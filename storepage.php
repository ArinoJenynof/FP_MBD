<?php 
include 'storedb.php';

session_start();

if(!empty($_SESSION["user"])) {
    header("location: logged_in.php");
}
if(!empty($_SESSION["admin"])) {
	header('location: product_admin.php');
 }

?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device=width, intial-scaled=1" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<title></title>
</head>
<body>
	<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
		<a class="navbar-brand" href="#"><img src="aset/img/404.png" style="width:40px" alt="logo" /></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="storepage.php">Store</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="about.php">About</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container-fluid">
    <br>
    <div class="row">

		<div class="col-lg-3 ">
			<h1 class="my-4">Kategori</h1>
			<div class="list-group">
				<?php 
				$cat = "SELECT k.id_kategori, k.tipe_barang , COUNT(b.id_barang) jumlah FROM kategori k
				JOIN barang b ON b.id_kategori = k.id_kategori
				GROUP BY k.id_kategori, k.tipe_barang
				ORDER BY jumlah  DESC";	
				$table=mysqli_query($con,$cat);
				while($row=mysqli_fetch_assoc($table)) {
						$id=$row['id_kategori'];
						$tipe=$row["tipe_barang"];
						$amount=$row["jumlah"];
				echo  '
				<a href="?link='.$id.'" class="list-group-item">'.$tipe.' ('.$amount.') </a>			
					';
				}
				?>
			</div>
		</div>

		<div class="col-lg-6">
            <div class="row">

        <?php 

		$table=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($table)) {
				$tipe=$row["tipe_barang"];
				$id=$row['id_barang'];
				$penjual=$row['nama_penjual'];
                $nama=$row["nama_barang"];
                $harga=$row["harga_jual"];
                $jumlah=$row["jumlah_total"];
		echo  '			
			<div class="col-lg-4 col-md-6 mb-4 tofil" id='.$tipe.'>
				<div class="card h-100">
					<div class="card-body">
						<h4 class="card-title">
							<a href="?'.$nama.'">'.$nama.'</a>
						</h4>
						<h5>Rp.'.$harga.'</h5>
						<h5>'.$penjual.'</h5>
					</div>
				</div>
			</div>
            ';
        }
        ?>

            </div>
        </div>
         
		<div class="col-lg-3">
	   		<div class="jumbotron">Selamat Datang, Silahkan <a href="login.php">Masuk </a>Terlebih Dahulu</div>
	   	</div>
	</div>
</body>
</html>

