<?php
  /* Importation de la config */
  include("config.php");
  /* Démarrage de la session */
  session_start();
  /* Initialisation des variables d'affichage */  	
  $error="";


  /* Récupération des info de saisie si post */
  if(isset($_POST['username'],$_POST['password'])) {
      $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
      $password = filter_var ($_POST['password'],FILTER_SANITIZE_STRING);

      $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username AND password=:password');
      $stmt->execute(['username' => $username, 'password' => md5($password)]);
      $user = $stmt->fetch();
      if($stmt->rowCount() == 1) {
        $_SESSION['login_user'] = $username;
        header("location: welcome.php");
      } else {
           $error = '<div class="alert alert-danger" role="alert">Your Login Name or Password is invalid</div>';
      }
    }
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
  </head>
<body>
  <div class="login-form">
    <?php echo $error; ?>
  	<form action="" name="loginform"  method="POST">
  		 <h2 class="text-center">Log in</h2>       
          <div class="form-group">
          	<input type="text" name="username"  placeholder="your username" class="form-control" required>
      	  </div>
  		   	<div class="form-group"><input type="password" name="password"  placeholder="your password" class="form-control" required>
     	 	  </div>
     	 	  <div class="form-group">
  				  <button type="submit" id="submit"   class="btn btn-primary btn-block">Log in</button>
  		    </div>
  		    <div class="clearfix">
              <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
              <a href="register.php" class="float-right">Register</a>
          </div>        
    </form>
  </div>
</body>
</html>