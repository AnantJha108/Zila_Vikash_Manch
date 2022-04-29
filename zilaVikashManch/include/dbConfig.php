<?php
  $connect= mysqli_connect('localhost','root','','zilaVikash');
  session_start();

  function redirect($page="index")
   {
       echo "<script>window.open('$page.php','_self')</script>";
   }

   function message($msg)
   {    
       echo "<script>alert('$msg')</script>";
   }

   function authCheck($session,$page="index")
   {    
       if (!isset($_SESSION[$session])) {
           redirect($page);
       }
   }
   
?>