<?php 
include 'storedb.php';

session_start();

if(empty($_SESSION["user"])) {
   header('location: storepage.php');
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
				<li class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="pemtrans.php">Transaksi</a>
				</li>
				<li>
					<a class="nav-link" href="statistik.php">Statistik</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logout.php">Logout</a>
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
						$rating=$row["rating_penjual"];
						$tipe=$row["tipe_barang"];
						$id=$row['id_barang'];
						$penjual=$row['nama_penjual'];
						$nama=$row["nama_barang"];
						$harga=$row["harga_jual"];
						$jumlah=$row["jumlah_total"];
						$PID = $row['id_penjual'];
				echo  '			
					<div class="col-lg-4 col-md-6 mb-4 tofil" id='.$tipe.'>
						<div class="card h-100">
							<div class="card-body">
								<h4 class="card-title">
									<a href="?='.$nama.'">'.$nama.'</a>
								</h4>
								<h5>Penjual: '.$penjual.'</h5>
								<h5>Rating Penjual: '.$rating.'</h5>
								<h5>Harga: Rp. '.$harga.'</h5>
								
							</div>

							<div class="row justify-content-md-center">
								<form action="tocart.php" method="post">
								<input type="hidden"  name="barangID" value="'.$id.'">
								<input type="hidden"  name="penID" value="'.$PID.'">
								<div class="form-group">
								<input type="text" class="form-control" placeholder="Jumlah" name="jumlah" required="required">
								</div>     
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block">Tambah ke Cart</button>
								</div>
								</form>
							</div>
						</div>
					</div>
					';
				}
				?>

            </div>
        </div>
         
	   	<div class="col-lg-3">
			
			<div class="jumbotron">
				<h6>Selamat Datang <?php 
					$curr_uname = $_SESSION["user"];
					echo $curr_uname;
					?> 
				</h6>
    	</div>
        	<div class="row">

				<?php 
				$searchTID = "SELECT t.id_transaksi, j.nama_penjual, t.total_bayar FROM transaksi t 
				JOIN pembeli p ON p.id_pembeli = t.id_pembeli
				JOIN penjual j ON j.id_penjual = t.id_penjual
				WHERE t.status LIKE 'Cart' AND p.nama_pembeli LIKE '$curr_uname' ";
				$TID_list=mysqli_query($con,$searchTID);
				while($curr_trans=mysqli_fetch_assoc($TID_list)) {
						$TID=$curr_trans["id_transaksi"];
						$penjual=$curr_trans['nama_penjual'];
						$harga_tot=$curr_trans["total_bayar"];
				echo  '			
					<div class="col-md-6 mb-4 tofil" id='.$TID.'>
						<div class="card h-100">
							<div class="card-body">
								<h4 class="card-title">
									<a href="?'.$TID.'">'.$TID.'</a>
								</h4>
								<h5>'.$penjual.'</h5>
							
				';
				$searchCID = "SELECT b.nama_barang, d.jumlah_beli, b.harga_jual FROM cart c 
				JOIN transaksi t ON t.id_transaksi =c.id_transaksi
				JOIN ditaruh d ON d.id_cart = c.id_cart
				JOIN barang b ON b.id_barang = d.id_barang
				WHERE t.id_transaksi = $TID";
				$CID_list=mysqli_query($con,$searchCID);
				while($curr_cart=mysqli_fetch_assoc($CID_list)) {
						$nama_bar=$curr_cart["nama_barang"];
						$jum_beli=$curr_cart['jumlah_beli'];
						$harga_curr=$curr_cart["harga_jual"];
						echo ' <h6>'.$nama_bar.':	Rp.'.$harga_curr.'	x	'.$jum_beli.'</h6> ';
				}

				echo '
								<h6> Total: Rp.'.$harga_tot.'</h6>
								</div>
							<div class="row justify-content-md-center">
								<form action="bayar.php" method="post">
								<div class="form-group">
								<input type="hidden"  name="traID" value="'.$TID.'">
								</div>     
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block">Bayar</button>
								</div>
								</form>
							</div>
						</div>
					</div>
					';
				}
				?>

            </div>
	</div>

</body>
</html>