<?php
   include("config.php");	/*for db connection*/
   session_start(); 		/*to store valid username into session instance*/
   $error="";

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $sql= str_replace("\'","'",$sql);		/*to escape blanks and spaces from input*/
      $result = mysqli_query($db,$sql);		
      $count = mysqli_num_rows($result);
      $username_find_flag=false;
      $password_correct_flag=false;
      $query_result=array();
      while( $rows = mysqli_fetch_array($result,MYSQLI_ASSOC))
      {
				  foreach($rows as $row)
			  {		
					   $query_result[]=$row;
					if(strcmp($row,$myusername))
					  {
					  $username_find_flag=true;
					  }
					  if(strcmp($row,$mypassword))
					  {
					  $password_correct_flag=true;
					  }
			  }
			
	  }


      if($username_find_flag and $password_correct_flag)
      {
		  $_SESSION['login_user'] = $myusername;
		  $_SESSION['sql_query'] = $sql;
		  $_SESSION['count'] = $count;
		  $_SESSION['query_result'] = $query_result;
          header("location: welcome.php");
	  }
	  else{
		  $error = '<div class="alert alert-danger" role="alert">Your Login Name or Password is invalid</div>';
		  }



      // sql injection proof code

     /* if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;

         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }*/



   }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
.login-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
</style>
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