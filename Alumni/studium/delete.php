<?php
//laget av Mahandri wardhana studentnr: 146980
// inkluderer forbindelse
include_once("../connection.php");

// Får IDen til studium
$id= $_GET['id'];

// Slett studium basert på IDen
$result = mysqli_query($bd, "DELETE FROM study WHERE study_id=$id");

// Etter sletting tilbake til study.php
header("Location:study.php");
?>
