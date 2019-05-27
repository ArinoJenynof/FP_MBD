<?php
include 'dbconnect.php';

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

	<div>
  <?php

		$pembeli = $_SESSION["user"];
		$sql = "SELECT t.id_transaksi, j.nama_penjual, t.total_bayar, t.tanggal_transaksi, t.status FROM transaksi t
		JOIN pembeli p ON t.id_pembeli = p.id_pembeli
        JOIN penjual j  ON j.id_penjual = t.id_penjual
        WHERE p.nama_pembeli = '$pembeli' 
        AND t.status NOT LIKE 'Dibatalkan' AND t.status NOT LIKE 'Cart' ";
    $result = mysqli_query($con, $sql);
     ?>
     <table class="table table-bordered">
       <tr>
       	<th scope="col">Id</th>
       	<th scope="col">Nama Penjual</th>
       	<th scope="col">Harga Total</th>
       	<th scope="col">Tanggal Transaksi</th>
       	<th scope="col">Status</th>
        <th scope="col">Options</th>
       </tr>
       	<?php  while($product = mysqli_fetch_assoc($result)) { ?>
      	<tr>
      		<td> <?php $id_trans =$product['id_transaksi']; echo $product['id_transaksi']; ?> </td>
      		<td> <?php echo $product['nama_penjual']; ?> </td>
            <td> <?php echo $product['total_bayar']; ?> </td>
      		<td> <?php echo $product['tanggal_transaksi']; ?> </td>
            <td> <?php $stat = $product['status'];echo $product['status']; ?> </td>
            
            <td>
            <?php
            if($stat == "Dibayar")
             echo '</a> <a href="batal.php?id='.$id_trans.'" onclick="return confirm('."'Apakah Anda yakin untuk Membatalkan Pesanan?'".')">Batal</a>';
             else if ($stat == "Dikirim")
             echo '<form action="rating.php" method="post">
             <div class="form-group">
             <input type="hidden"  name="traID" value="'.$id_trans.'">
             </div>     
             <select class="custom-select" name="nilai" required="required">
                <option selected>Nilai</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
             </select>
             <div class="form-group">
                 <button type="submit" class="btn btn-primary btn-block">Nilai</button>
             </div>
             </form>
             ';
            ?>
			
            </td>
          </tr>
		
	    <?php } ?>

		</div>

		<div>
		</div>

</body>

</html>
