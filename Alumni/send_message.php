 <!-- Dette side er laget av Mebrahtu zerizghi -->
<?php
session_start();
require 'connection.php';
if ($_POST['from_user1']==$_SESSION['idbruker']){   //Hvis informasjonen i POST  og SESSION om bruker-ID er det samme
    extract($_POST);
    $sql = "INSERT INTO meldinger (from_user1, from_username, to_user2, title, message)
            VALUES ('$from_user1', '$from_username', '$to_user2', '$title', '$message');";

    if (mysqli_query($bd, $sql)) {
        $_SESSION['message'] =  "Message has been sent";
        header('location:inbox.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($bd);
    }

    mysqli_close($bd);



} else {
    echo '<h1>You are not allowed to be here</h1>';
}
