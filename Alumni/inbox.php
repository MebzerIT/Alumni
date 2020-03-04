<!-- Dette side er laget av Mebrahtu zerizghi   -->
<?php
include 'connection.php';
require_once('Ny_index.php');
// session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/Bruker.css">
</head>
<body>
  <?php
    include "header.php";
  ?>
<style>
    /* internal styling */
    table#messages {
        border-collapse: collapse;
        border-spacing: 0;
        width: 50%;
        display: block;
        margin: 50px 350px;
        border: 1px solid #ddd;
    }

    #messages th, #messages td {
        text-align: left;
        padding: 16px;
    }

    #messages tr:nth-child(even) {
        background-color: #e8e6f8;
    }

    tr.unread {
        font-weight: 600;
    }
  	@media screen and (max-width: 600px) {
      table#messages {
          width: 100%;
          margin: 50px 20px;
          border: 1px solid #ddd;
      }
   }
  @media (min-width: 601px) and (max-width: 1000px) {
     table#messages {
        width: 80%;
        margin: 50px 80px;
        border: 1px solid #ddd;
    }
  }
</style>
<main>
    <?php

    if (isset($_SESSION['message'])) {       //hvis det finnes melding i session vis og slett det
        echo '<h3 align="center">' . $_SESSION['message'] . '</h3>';
        unset($_SESSION['message']);
    }

    if (isset($_SESSION['idbruker'])) {  // hvis den finnes i session
        $sql = "SELECT * FROM meldinger WHERE to_user2=" . $_SESSION['idbruker'];
        $result = mysqli_query($bd, $sql);

        ?>
        <!-- tabel for visnign av melding  -->
        <table id="messages" align="center">
        <tr>
            <th><h2>INNBOXS</h2></th>
            <th><a href="new_message.php">Ny Melding</a></th>
            <th><a href="sent.php">Sendte Meldinger</a></th>
        </tr>
        <tr>
            <th>Fra</th>
            <th>Subjekt</th>
            <th>Oversikt</th>
            <th>Dato</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr class="<?php echo $row['status']; ?>">
                <td><?php echo $row['from_username']; ?> <br><a href="insert_report.php?idbruker=<?php echo $row['from_user1']; ?>">(rapporter <?php echo $row['from_username']; ?>)</a></td>
                <td><a href="read_message.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></td>
                <td><?php echo substr($row['message'], 0, 60); ?>...</td>
                <td><?php echo $row['date_creation']; ?>...</td>
            </tr>
        <?php }
        mysqli_close($bd); ?>
        </table>
    <?php } ?>

</main>
<?php
require 'footer.php'; ?>
