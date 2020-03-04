 <!-- Dette side er laget av Mebrahtu zerizghi -->
<?php
require 'connection.php';  // tilkobling
require_once('Ny_index.php');
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id  || $_SESSION['level'] != 'admin'){ // hvis det ikke er admin
    die('NOT ALLOWED');
}
// sql for visning av rapportert regel avbrudd
$sql = "SELECT l.date_report, l.beskrivelse as message, r.regelnavn, r.beskrivelse FROM report_log l
inner join regler r on r.id = l.regel
where bruker_id = $id";
$result = $bd->query($sql);
?>
<?php include 'header.php' ?>
<!-- internal styling -->
    <style>

    table.zebra {
        border-collapse: collapse;
        border-spacing: 0;
        width: max-content;
        display: block;
        margin: auto;
        border: 1px solid #ddd;
    }

    .zebra th, .zebra td {
        text-align: left;
        padding: 16px;
    }

    .zebra tr:nth-child(even) {
        background-color: #e8e6f8;
    }
</style>

<h1 align="center">Regler</h1>
<!-- tabel for visning  -->
<table class="zebra">
    <tr>
        <th style="width: 5%">date_report</th>
        <th>Message</th>
        <th>Regelnavn</th>
        <th>Beskrivelse</th>
    </tr>
    <?php
    while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['date_report']; ?></td>
            <td><?php echo nl2br($row['message']); ?></td>
            <td><?php echo $row['regelnavn']; ?></td>
            <td><?php echo nl2br($row['beskrivelse']); ?></td>
        </tr>
        <?php
    }
    echo '</table>';
    $bd->close(); ?>
</table>
<?php include 'footer.php' ?>
