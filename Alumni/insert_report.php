 <!-- Dette side er laget av Mebrahtu zerizghi   -->
<?php
//session_start();
	require_once('Ny_index.php');
include 'connection.php';

if (isset($_POST['idbruker']) && isset($_SESSION['idbruker']) && isset($_POST['regel'])) {  //hvis det finnes i session
    extract($_POST);
    $laget_av = $_SESSION['idbruker']; //bruker som vil rapportere
    $idbruker = $_POST['idbruker'];  //brukern som skal bli rapportert
    $sql = "INSERT INTO report_log (regel, beskrivelse, bruker_id, laget_av) VALUES ('$regel', '$beskrivelse', '$idbruker', '$laget_av');";
    //die($sql);
    $bd->query($sql);
    header('location:insert_report.php?success=true&idbruker='.$idbruker);
    $bd->close();
} else {    //Det kommer ikke fra et innlegg, så det skal bare vise skjemaet
    $sql = "SELECT * FROM regler";
    $result = $bd->query($sql);

    $sql2 = "SELECT idbruker, brukerNavn FROM bruker;";
    $result2 = $bd->query($sql2);

    include 'header.php';
    ?>
    <h1 align="center">Report user</h1><br>
    <?php if(isset($_GET['success'])){ ?>
    <h3>Takk for repporten !</h3>
    <?php } ?>
    <form method="post">
        <table align="center" style="margin: auto"> 
            <tr>
                <td>Bruker</td>
                <td><select name="idbruker" id="idbruker">
                        <?php
                        while($row2 = $result2->fetch_assoc()) { $selected = '';
                            if (isset($_GET['idbruker']) && $row2['idbruker']==$_GET['idbruker']){
                                $selected = ' SELECTED=SELECTED ';
                            }
                        ?>
                            <option <?php echo $selected; ?> value="<?php echo $row2['idbruker']; ?>"><?php echo $row2['brukerNavn']; ?></option>
                        <?php }  ?>
                        <option value=""></option>
                    </select></td>
            </tr>
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
} ?>
