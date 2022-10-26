<?php
   session_start();
   if(session_destroy()) {
      header("Location:../store_login.php");
   }
?>