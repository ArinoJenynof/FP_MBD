<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'dbconnect.php';
    session_start();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <title>Statistik</title>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
		<div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
			<ul class="navbar-nav">
                <li class="nav-item">
					<a class="nav-link" href="product_admin.php">Produk</a>
				<li class="nav-item">
					<a class="nav-link" href="penjtrans.php">Transaksi</a>
				</li>
                <li class="nav-item">
                    <a class="nav-link" href="statistik.php">Statistik</a>
                </li>
				<li class="nav-item">
					<a class="nav-link" href="logout.php">Logout</a>
				</li>
			</ul>
		</div>
	</nav>
    <div class="container" style="margin-top: 1em">
        <button type="button" class="btn" onclick="chg(hasil, 1)">Query 1</button>
        <button type="button" class="btn" onclick="chg(hasil, 2)">Query 2</button>
        <button type="button" class="btn" onclick="chg(hasil, 3)">Query 3</button>
        <div id="hasil" style="margin-top: 1em">Hasil akan ditampilkan di sini</div>
    </div>
    <script>
        function chg(id, type) {
            if (window.XMLHttpRequest) xmlhttp = new XMLHttpRequest();
            else xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    id.innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "statistik_query.php?q=" + type, true);
            xmlhttp.send();
        }
    </script>
</body>
</html>