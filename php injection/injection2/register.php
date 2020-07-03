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
      $error = '<div class="alert alert-success" role="alert">Registered Successfully</div>';
      try{
        $data = [
          'username' => $username,
          'fname' => $username,
          'description' => "",
          'password' => md5($password),
      ];
      $sql = "INSERT INTO users (username, password, fname, description) VALUES (:username, :password, :fname, :description)";
      $stmt= $pdo->prepare($sql);
      $stmt->execute($data);
      }
      catch(PDOException $exception){         
        $error = '<div class="alert alert-danger" role="alert">Error</div>';    
      }      //later in code     echo "An Error has occurred " . $error;

      //$error = '<div class="alert alert-success" role="alert">Registered Successfully</div>';
    }
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
  </head>
<body>
  <div class="login-form">
    <?php echo $error; ?>
  	<form action="" name="loginform"  method="POST">
  		 <h2 class="text-center">Register</h2>       
          <div class="form-group">
          	<input type="text" name="username"  placeholder="your username" class="form-control" required>
      	  </div>
  		   	<div class="form-group"><input type="password" name="password"  placeholder="your password" class="form-control" required>
     	 	  </div>
     	 	  <div class="form-group">
  				  <button type="submit" id="submit"   class="btn btn-primary btn-block">Register</button>
  		    </div>    
           <div class="clearfix">
              <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
              <a href="index.php" class="float-right">Login</a>
          </div> 
    </form>
  </div>
</body>
</html>