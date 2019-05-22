<?php
    session_start();
?>

<!DOCTYPE html>

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
                <?php
                if(!empty($_SESSION["user"])) {
				    echo '<li class="navbar-nav">
					    <a class="nav-link" href="userpageawal.php">Profile</a>
                    </li>';
                }
                ?>
				<li class="nav-item">
					<a class="nav-link" href="about.php">About Us</a>
				</li>
                <?php
                if(!empty($_SESSION["user"])) {
                    echo '<li class="nav-item">
					    <a class="nav-link" href="logout.php">Logout</a>
                    </li>';
                }
                ?>
			</ul>
		</div>
	</nav>

    <div class="container">
        <div class="row">
            <div class="col">
            <h1>Kosong :D</h1>

            </div>
        </div>
    </div>
</body>

</html>
