<?php
  session_start();
  include 'dbconnect.php';

  if(empty($_SESSION["admin"])) {
    header('location: storepage.php');
 }

  if(isset($_GET['id']))
  $sql = "SELECT id_barang FROM barang WHERE id_barang=".$_GET['id'];
  $result = mysqli_query($con, $sql);
  $product = mysqli_fetch_array($result);
?>

<head>
  <title>List Produk</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
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
					<a class="nav-link" href="product_admin.php">Produk</a>
				</li>
				<li class="navbar-nav">
					<a class="nav-link" href="userpageawal.php">Profile</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="about.php">About Us</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="penjtrans.php">Transaksi</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logout.php">Logout</a>
				</li>
			</ul>
		</div>
	</nav>

    <div class="row">
  		<div class="col-sm-3"><!--left col-->
            <h4>
            </h4>
        </div><!--/col-3-->
    	<div class="col-md-6">
          <div class="tab-content">
            <div class="tab-pane active" id="home">

                  <form action="updateproduct.php" method="post">

                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="jual"><h4>Harga Jual</h4></label>
                              <input type="text" class="form-control" name="jual" placeholder="Harga Jual" value="" title="Harga Jual">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="beli"><h4>Harga Beli</h4></label>
                              <input type="text" class="form-control" name="beli" placeholder="Harga Beli" value="" title="Harga Beli">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="jumlah"><h4>Jumlah</h4></label>
                              <input type="text" class="form-control" name="jumlah" placeholder="Jumlah" value="" title="Jumlah">
                          </div>
                      </div>
                      <input type="hidden" name="id" value="<?php echo $product["id_barang"]; ?>">
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"> Save</button>
                            </div>
                      </div>
              	</form>

             </div>
                            </div>
                      </div>
              	</form>
              </div> 

              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->



</body>
