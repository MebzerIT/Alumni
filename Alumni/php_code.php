<!-- Dette side er laget av Mebrahtu zerizghi -->
<?php
include 'connection.php';
require_once('Ny_index.php');
?>
<?php

//..initialiser variabler
	$brukerNavn = "";
	$passord ="";
	$fornavn =  "";
	$etternavn =  "";
	$adrresse = "";
	$ePost = "";
	$telefonNr="";
	$kjønn = "";
	$studiear="";
	$id = 0;
// om update sette verdi til variablene
    if (isset($_POST['update'])) {
	$brukerNavn = $_POST['brukerNavn'];
	$passord = $_POST['passord'];
	$fornavn    = $_POST['fornavn'];
	$etternavn   =  $_POST['etternavn'];
	$adrresse =  $_POST['adrresse'];
	$ePost =  $_POST['ePost'];
	$telefonNr =  $_POST['telefonNr'];
	$kjønn  =  $_POST['kjønn'];
	$studiear=$_POST['studiear'];;
	$biografi   =  $_POST['biografi'];
//sql for updatering av brukere detalje
    $sql = mysqli_query($bd, "UPDATE bruker SET brukerNavn='$brukerNavn',passord='$passord',fornavn='$fornavn',etternavn='$etternavn',adrresse='$adrresse',ePost='$ePost',
                          telefonNr='$telefonNr',kjønn='$kjønn',biografi='$biografi',studiear='$studiear' WHERE brukerNavn = '".$_POST['brukerNavn']."' ") or die(mysqli_error($bd));
			if(mysqli_affected_rows($bd)>=1){
			  header("location: home.php");
			echo "<p>($brukerNavn) Record Updated<p>";
			}else{
			echo "<p>($brukerNavn) Not Updated<p>";
			}

}

	 // $_SESSION['message'] = "Address updated!";
	  // header('location: index.php');

?>
