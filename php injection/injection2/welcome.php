<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Account - <?php echo $_SESSION['login_user'] ?></title>

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

      <div class="col-lg-12">
 <?php if($_SESSION['login_user']=="admin") echo '<h2 class="text-center">Well done ! Flag : Gang€dR00tSo£ucky54</h2>'?>
    
      <h2 class="text-center">Search products</h2>       
        <div class="form-group">
          <form method="POST" autocomplete="off">
            <input class="form-control" type="text" id="searchitem" name="searchitem">
            <input type="submit" value="Search!"/> 
          </form>
      </div> 
<table class="table">
  <thead>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Product Type</th>
      <th scope="col">Description</th>
      <th scope="col">Price (in USD)</th>
    </tr>
  </thead>
  <tbody>
    <?php
if (isset($_POST["searchitem"])) {
  $DBUSER = 'root';
  $DBPASS = '';

  $con=mysqli_connect("127.0.0.1",$DBUSER,$DBPASS,"injection2");

// Check connection
  if (mysqli_connect_errno($con))
    {
    echo "<font style=\"color:#FF0000\">Could not connect:". mysqli_connect_error()."</font\>";
    }

  $q = "Select * from products where product_name like '".$_POST["searchitem"]."%'";

  $result = mysqli_query($con,$q);
  if (!$result)
  {
      die("</table></div>".mysqli_error($con));
  }

  while($row = mysqli_fetch_array($result))
    {
    echo "<tr><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td></tr>";
    }

} ?>
    
  </tbody>
</table>


</table>
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
