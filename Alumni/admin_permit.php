<?php
//laget av Mahandri wardhana studentnr: 146980
include 'connection.php';
require_once('Ny_index.php');
?>
<!DOCTYPEhtml>
<html>
 <head>
  <meta charset="UTF-8">
  <title>admin</title>
  <link rel="stylesheet" href="css/Bruker.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

 </head>
  <body>
 <?php
   include "header.php";
 ?>
<?php
$id = $_GET['id'];
  include 'connection.php';
  $sql = "UPDATE bruker SET level='admin' WHERE idbruker='$id'";
  if(mysqli_query($bd, $sql)){
    echo "Records were updated successfully.";
    header("location:admin_tilgang.php");
	} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($bd);
	}


?>
<!DOCTYPE html>
<html>
<head>
 <meta charset=”UTF-8″>
</head>
 <body>

 <footer id="footer">
      <p> <strong>Kontakt Oss</strong>: Sentralbord - 31 00 80 00 |
      Beredskap - 31 00 89 00<strong><br>Copyright&copy 2018</strong> </p>
 </footer>

  </body>
  </html>
