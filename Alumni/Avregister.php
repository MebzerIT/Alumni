<!-- Dette side er laget av Mebrahtu zerizghi   -->
<?php
// tilkobling
require_once('Ny_index.php');
include 'connection.php';

$userid =  $_SESSION['idbruker']; // sett bruker id med session

$query = ("SELECT* FROM bruker WHERE idbruker = '$userid' ");
  $result = mysqli_query($bd, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = $result->fetch_assoc();
    $_SESSION['idbruker'] = $row['status'];
    $status = $row['status'];
    if($status == 1)
    {
      echo "$status";

      //echo "$status";
        //$status = no;
      $update = mysqli_query($bd, "UPDATE bruker SET status = NULL  WHERE idbruker = '$userid'"); // setter bruker status til 0 , for å diaktivere
                header('location: ./default.php');
    }
  }
  ?>
