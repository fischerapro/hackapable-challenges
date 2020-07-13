<?php
   // on charge la BDD
   include('config.php');
   // on démarre la session
   session_start();
   // on vérfie que l'utilisateur existe
   $user_check = $_SESSION['login_user'];
   $ses_sql = mysqli_query($db,"select username from users where username = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['username'];
   // si pas de session : retour à la page d'accueil
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
      die();
   }
?>
