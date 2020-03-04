<!-- Dette side er laget av Mebrahtu zerizghi   -->
<?php //tilkobling  og henting data for sortering
require 'connection.php';
$extra = "";
if (isset($_GET['sortBy'])){
    $extra = " ORDER BY ". $_GET['sortBy'];
}
$sql = "SELECT b.idbruker, b.brukerNavn, b.ePost, b.telefonNr, b.adrresse, b.biografi, b.bilde, level, b.rapportere FROM bruker b $extra";
$result = $bd->query($sql);

include 'header.php';

if ($result->num_rows > 0) {
    // utdata for hver rad
?>
<style>
    <style>
        /*internal styling*/
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
    input[type="text"] {
        width: 180px;
    }
</style>
<!-- sortering etter bruker navn ,epost og id -->
<a href="?sortBy=brukerNavn">brukerNavn</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="?sortBy=ePost">ePost</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="?sortBy=idbruker">Id</a>
        <table class="zebra">  <!-- table for visning av bruker detalj -->
        <tr>
            <th>id bruker</th>
            <th>brukerNavn</th>
            <th>rapporter og advarsler</th>
            <th colspan="4">Actions</th>
            <th>ePost</th>
            <th>telefonNr</th>
            <th>adrresse</th>
            <th>biografi</th>
            <th>bilde</th>
        </tr>
<?php
    while($row = $result->fetch_assoc()) {

        $sqlSingle = "SELECT count(*) as num_reports FROM report_log WHERE bruker_id = ".$row['idbruker'];
        $resultInside = $bd->query($sqlSingle);
        $rowSingle = $resultInside->fetch_assoc();
        ?>
        <tr>
            <form method="post" action="update_user.php">
            <td><?php echo $row['idbruker']; ?><input type="hidden" name="idbruker" value="<?php echo $row['idbruker']; ?>"></td>
            <td><input type="text" name="brukerNavn" value="<?php echo $row['brukerNavn']; ?>"></td>
            <td><a href="reports.php?id=<?php echo $row['idbruker']; ?>"><?php echo $rowSingle['num_reports']; ?></a></td>
            <td>
                <?php if ($row['rapportere'] == 'quarantine'){ ?>
                    <a href="quarantine_user.php?id=<?php echo $row['idbruker']; ?>&remove">Remove Quarantine</a>
                <?php } else { ?>
                    <a href="quarantine_user.php?id=<?php echo $row['idbruker']; ?>">Quarantine</a>
                <?php } ?>
            </td>
            <td>
                <?php if ($row['rapportere'] == 'exclude'){ ?>
                <a href="exclude_user.php?id=<?php echo $row['idbruker']; ?>">Remove Exclude</a></td>
                <?php } else { ?>
                <a href="exclude_user.php?id=<?php echo $row['idbruker']; ?>">Exclude</a></td>
                <?php } ?>


            <td><a href="warning.php?idbruker=<?php echo $row['idbruker']; ?>">Give a warning</a></td>
            <td><input type="submit" value="Oppdater"></td>
            <td><input type="text" name="ePost" value="<?php echo $row['ePost']; ?>"></td>
            <td><input type="text" name="telefonNr" value="<?php echo $row['telefonNr']; ?>"></td>
            <td><input type="text" name="adrresse" value="<?php echo $row['adrresse']; ?>"></td>
            <td><input type="text" name="biografi" value="<?php echo $row['biografi']; ?>"></td>
            <td><img src="<?php echo $row['bilde']; ?>" height="100"></td>

            </form>
        </tr>
<?php
    }
    echo '</table>';
} else {
    echo "0 results";
}
$bd->close();
include 'footer.php';
?>
