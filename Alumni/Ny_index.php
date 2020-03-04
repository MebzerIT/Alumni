<!-- Dette side er laget i felleskap -->
<?php
  session_start();

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: default.php');
  }

  if(isset($_SESSION['username']))
    {
     if((time() - $_SESSION['last_time']) > 600) // Time in Seconds
     {
       session_destroy();
       unset($_SESSION['username']);
       header('location: default.php');
     }
     else
     {
     $_SESSION['last_time'] = time();
     }
   }

  if (isset($_GET['loggut'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: default.php");
  }

?>
