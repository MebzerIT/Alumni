 <!-- Dette side er laget av Mebrahtu zerizghi   -->
<?php
session_start();
require 'connection.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (isset($_SESSION['level']) && $id && $_SESSION['level'] == 'admin') {  //hvis dette fines i session

    // sql for sletting
    $sql = "UPDATE bruker  SET
            rapportere ='exclude'
            WHERE  idbruker =$id";

    if (isset($_GET['remove'])){
        $sql = "UPDATE bruker  SET
            rapportere = Null
            WHERE  idbruker =$id";
    }

    if ($bd->query($sql) === TRUE) {
        header('location:admin_users.php');
    } else {
        echo "Error deleting record: " . $sql;
    }
    $bd->close();
}
?>
