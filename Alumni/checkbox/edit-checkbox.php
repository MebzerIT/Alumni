<?php
//laget av Mahandri wardhana studentnr: 146980
include 'connection.php';
require_once('Ny_index.php');
?>
<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
        include_once './checkboxClass.php';
        $checkBoxClass=new checkboxClass();
        if(isset($_POST["submit"])){
            $interesserValue=  implode(",",$_POST["Interesser"]);
            echo $checkBoxClass->updateCheckbox($interesserValue, $_GET["id"]);
        }
        $list=$checkBoxClass->listCheckbox("Where Id='$_GET[id]'");
        $checkboxvalues=  explode(",", $list[0]["Interesse"]);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Checkbox List</title>
    <link href="../css/checkbox.css" rel="stylesheet">
  </head>
  <body>

    <div class="container">
        <?php
        if(in_array("Håndball", $checkboxvalues)){
            $checkedValue="checked='checked'";
        }
        if(in_array("MMA", $checkboxvalues)){
            $checkedValue1="checked='checked'";
        }
        if(in_array("Fotball", $checkboxvalues)){
            $checkedValue2="checked='checked'";
        }
        if(in_array("Basketball", $checkboxvalues)){
            $checkedValue3="checked='checked'";
        }
        if(in_array("Mat", $checkboxvalues)){
            $checkedValue4="checked='checked'";
        }
        ?>
        <form action="<?php echo $_SERVER["PHP_SELF"]."?id=$_GET[id]"; ?>" method="post">
            <input type="checkbox" id="Interesser" name="Interesser[]" <?php echo $checkedValue; ?> value="Håndball">Håndball<br/>
            <input type="checkbox" id="Interesser" name="Interesser[]" <?php echo $checkedValue1; ?> value="MMA">MMA<br/>
            <input type="checkbox" id="Interesser" name="Interesser[]" <?php echo $checkedValue2; ?> value="Fotball">Fotball<br/>
            <input type="checkbox" id="Interesser" name="Interesser[]" <?php echo $checkedValue3; ?> value="Basketball">Basketball<br/>
            <input type="checkbox" id="Interesser" name="Interesser[]" <?php echo $checkedValue4; ?> value="Mat">Mat<br/>

            <br/><br/>
            <input type="submit" id="submit" name="submit" value="Submit Values" class="btn btn-primary">
        </form>
    </div> <!-- /container -->
  </body>
</html>
