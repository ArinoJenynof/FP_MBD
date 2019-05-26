<?php
  session_start();
  include 'dbconnect.php';
  $user = $_SESSION["user"];
  $data = mysqli_query($con,"select * from user where email='$user'");
  $edit = mysqli_fetch_array($data);
?>

<head>
  <title>Profil Pengguna</title>
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
                    <a class="nav-link" href="storepage.php">Store</a>
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
            <?php 

                if(!empty($_SESSION['msgr'])) {
                    print($_SESSION['msgr']);
                    unset($_SESSION['msgr']);
                }         
            ?>
            </h4>
        </div><!--/col-3-->
    	<div class="col-md-6">
          <div class="tab-content">
            <div class="tab-pane active" id="home">

                  <form action="updatedata.php" method="post">
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="name"><h4>Nama</h4></label>
                              <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $edit["username"];?>" title="enter your username.">
                          </div>
                      </div>

                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="phone"><h4>Telepon</h4></label>
                              <input type="text" class="form-control" name="phone" placeholder="Telepon" value="<?php echo $edit["phone"]; ?>" title="enter your phone number if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $edit["email"]; ?>" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="location"><h4>Alamat</h4></label>
                              <input type="location" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo $edit["alamat"]; ?>" title="enter your location">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $edit["katakunci"]; ?>" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                            <label for="password2"><h4>Verify</h4></label>
                              <input type="password" class="form-control" name="password2" placeholder="Verify" value="<?php echo $edit["katakunci"]; ?>" title="enter your password2.">
                          </div>
                      </div>
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
              </div> -->

              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->


</body>
