<?php
   session_start();
   /* on détruit la session */
   if(session_destroy()) {
   	  // on renvoi sur l'index 
      header("Location: index.php");
   }
?>
