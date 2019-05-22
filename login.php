<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Masuk</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
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
					<a class="nav-link" href="#">About Us</a>
				</li>
			</ul>
		</div>
	</nav>
<br>
<br>


<div class="container">
<div class="row justify-content-md-center" >

<div class="col-md-4">
	<form action="register.php" method="post">
        <h2 class="text-center">Daftar</h2>  
        <div class="form-group">
            <select class="custom-select" name="tipe_pengguna" required="required">
                <option selected>Tipe Akun</option>
                <option value="penjual">Penjual</option>
                <option value="pembeli">Pembeli</option>
            </select>
        </div>     
        <div class="form-group">

            <input type="text" class="form-control" placeholder="Username" name="username" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" required="required">
        </div>
			<div class="form-group">
            <input type="password" class="form-control" placeholder="Confirm Password" name="password2" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
        </div>
    </form>
</div>

<div class="col-md-4">
    <h4 class="text-center">
    <?php 
        session_start();

        if(!empty($_SESSION['msg'])) {
            print($_SESSION['msg']);
            unset($_SESSION['msg']);
        }         
    ?>
    </h4>
</div>

<div class="col-md-4">
	<form action="cek.php" method="POST">
        <h2 class="text-center">Masuk</h2> 
        <div class="form-group">
            <select class="custom-select" name="tipe_pengguna" required="required">
                <option selected>Tipe Akun</option>
                <option value="penjual">Penjual</option>
                <option value="pembeli">Pembeli</option>
            </select>
        </div>          
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" required="required" name="username">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required="required" name="password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
        </div>        
    </form>
</div>
</div>
</div>
</body>
</html>