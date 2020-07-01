<?php
  /* Importation de la config */
  include("config.php");
  /* Démarrage de la session */
  session_start();
  /* Initialisation des variables d'affichage */  	
  $error="";


  /* Récupération des info de saisie si post */
  if(isset($_POST['username'],$_POST['password'])) {
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
      /* On enlève les blancs et les espaces */ 
      $sql= str_replace("\'","'",$sql);
      $result = mysqli_query($db,$sql);		
      $count = mysqli_num_rows($result);
      $username_find_flag=false;
      $password_correct_flag=false;
      $query_result=array();

      /* On créé notre tableau avec les entrées */
      while( $rows = mysqli_fetch_array($result,MYSQLI_ASSOC))
      {
		    foreach($rows as $row)
			  {		
			    $query_result[]=$row;
					if(strcmp($row,$myusername))
            $username_find_flag=true;
					  
				  if(strcmp($row,$mypassword))
            $password_correct_flag=true;
			  }
	    }

      /* On remlit les variables de session */ 
      if($username_find_flag and $password_correct_flag)
      {
  		  $_SESSION['login_user'] = $myusername;
  		  $_SESSION['sql_query'] = $sql;
  		  $_SESSION['count'] = $count;
  		  $_SESSION['query_result'] = $query_result;
        header("location: welcome.php");
      }
    }
  /* Sinon, erreur */
  else
	  $error = '<div class="alert alert-danger" role="alert">Your Login Name or Password is invalid</div>';

/* ---- Code a utiliser pour éviter les injections ----
    
    if($count == 1){
        $_SESSION['login_user'] = $myusername;
        header("location: welcome.php");
    }
    else{
       $error = "Your Login Name or Password is invalid";
    }
*/
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
              <a href="#" class="float-right">Forgot Password?</a>
          </div>        
    </form>
  </div>
</body>
</html>