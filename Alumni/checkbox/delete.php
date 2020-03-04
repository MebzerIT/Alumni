<?php
//laget av Mahandri wardhana studentnr: 146980
// inkluderer forbindelse
include_once("../connection.php");

// Får iden for denne interesse
$id = $_GET['id'];

// Slett interessen basert på interesse id
$result = mysqli_query($bd, "DELETE FROM lagde_interesser WHERE inte_id=$id");

// Tilbake til interest.php
header("Location:interest.php");
?>
