 <!-- Dette side er laget av Mebrahtu zerizghi   -->
<?php
session_start();
include 'connection.php';
extract($_POST);
if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin') {  //hvis dette finnes i session
    $idbruker = $_SESSION['idbruker'];
    $sql = "INSERT INTO regler(regelnavn, beskrivelse, idbruker) VALUES ('$regelnavn', '$beskrivelse', '$idbruker')";
    $bd->query($sql);
    include 'rules.php';
    header('location:admin_rules.php');
    $bd->close();
}

?>
