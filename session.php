<?php 
   session_start();

   if(isset($_SESSION["user"])) {
      $usermail=$_SESSION["user"];
      $name="SELECT username FROM user WHERE email='$usermail'";
   }

?>