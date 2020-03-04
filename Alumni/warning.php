 <!-- Dette side er laget av Mebrahtu zerizghi -->
<?php
require_once('Ny_index.php');
include 'connection.php';

if (isset($_SESSION['level']) && $_SESSION['level']=='admin'){

    if (isset($_GET['idbruker']) && isset($_SESSION['idbruker']) && isset($_POST['regel'])) {  //hvis dette finnes i session
        extract($_POST);
        $laget_av = $_SESSION['idbruker']; //brukern som vil rapportere
        $idbruker = $_GET['idbruker'];  //brukeren som skal bli rapportert av
        $sql = "INSERT INTO report_log (regel, beskrivelse, bruker_id, laget_av) VALUES ('$regel', '$beskrivelse', '$idbruker', '$laget_av');";
        //echo($sql);
        $bd->query($sql);


        $from_username = $_SESSION['username'];
        $title = "Advarsel#".$_POST['regel'];
        $message = $_POST['beskrivelse'];

        $sql2 = "INSERT INTO meldinger (from_user1, from_username, to_user2, title, message, date_creation, status) VALUES
                ('$laget_av', '$from_username', '$idbruker', '$title', '$message', now(), 'unread')";

        $bd->query($sql2);
        //die("<br>".$sql2);

        header('location:warning.php?success=true&idbruker='.$idbruker);
        $bd->close();
    } else {    //Det betyr at det ikke kommer fra et POST, da er det bare å vise skjemaet
        $sql = "SELECT * FROM regler";
        $result = $bd->query($sql);
        include 'header.php';
        ?>
        <h1 align="center">Send en advarsel</h1><br>

        <?php
        if (isset($_GET['success'])){
          if ($_GET['success']==true)?>
            <h3>En advarsel ble sendt til brukeren</h3>
        <?php } ?>
        <form method="post">
            <table align="center" style="margin: auto">
                <tr>
                    <td>ødelagt regel</td>
                    <td><select name="regel">
                            <?php
                            while($row = $result->fetch_assoc()) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['regelnavn']; ?></option>
                            <?php } $bd->close(); ?>
                        </select></td>
                </tr>
                <tr>
                    <td>beskrivelse</td>
                    <td><textarea name="beskrivelse" id="" cols="30" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" style="float: right">
                    </td>
                </tr>
            </table>

        </form>

        <?php
        include 'footer.php';
    }

}
?>
