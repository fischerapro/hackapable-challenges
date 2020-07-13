<?php
   session_start();
   /* destruction session + redirection */
   if(session_destroy()) {
      header("Location: index.php");
   }
?>
