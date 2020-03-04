<!-- Dette side er laget av Mebrahtu zerizghi   -->
<?php
session_start();
require 'connection.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (isset($_SESSION['level']) && $id && $_SESSION['level'] == 'admin') {  //hvis dette finnes i session

    // sql for sletting
    $sql = "DELETE FROM regler WHERE id=$id";

    if ($bd->query($sql) === TRUE) {
        header('location:admin_rules.php');
    } else {
        echo "Error deleting record: " . $sql;
    }
    $bd->close();
}
?>
