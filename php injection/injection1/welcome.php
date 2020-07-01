<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Account - <?php echo $login_session; ?></title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/welcome.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Welcome to your account</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Account
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Sign Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">
      </div>
      
      <?php
        /* Génération de la liste d'utilisateurs */
        $sql = "SELECT username FROM users";
        $result =  mysqli_fetch_all(mysqli_query($db,$sql),MYSQLI_ASSOC);

        /* Initialisation des variables d'affichages */ 
      	$name = "";
      	$pass = "";
  		  if(isset($_SESSION['query_result']))
  		  {
  		  	$rows = $_SESSION['query_result'];
  		    $name = $rows[1];
  		    $pass = $rows[2];
	      }
		  ?>

      <div class="col-lg-4">
      	
		 <h2 class="text-center">Your credentials</h2>       
        <div class="form-group">
        	<input type="text" name="username" placeholder="your username" class="form-control" value="<?php echo $name; ?>" disabled> 
    	</div>
		   	<div class="form-group"><input type="password" name="password" placeholder="your password" class="form-control" value="<?php echo $pass; ?>" disabled>
   	 	</div>  

		<p>Liste des utilisateurs : </p>
        <ul><?php foreach ($result as $key => $value) {
          echo "<li> " . $value["username"] . "</li>";
        } ?></ul>

      </div>

    </div>

    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Hackapable 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
