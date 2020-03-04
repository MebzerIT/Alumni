 <!-- Dette side er laget av Mebrahtu zerizghi -->
<?php
include 'connection.php';
require_once('Ny_index.php');
?>
<!DOCTYPEhtml>
<html>
 <head>
  <meta charset="UTF-8">
  <title>Mebrahtu Personal website</title>
  <link rel="stylesheet" href="./Bruker.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>/* internal styling*/
body{background-color:#f2f3f4;}
input[type=text], input[type=password], input[type=date], input[type=tel]{
    width: 100%;
    padding: 8px 10px;
    margin: 2px  0;
    display:block;
    border: 1px solid #ccc;
    box-sizing: border-box;

}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}
textarea {
	  width: 100%;
	  height: 100%;
	}

hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}
.Uform {margin:5% 38% 5% 38%;background-color:#f2f3f4;border: 1px solid black;}


.Uform {
    padding: 16px;
}

/* mobil */
@media screen and (max-width: 600px) {
     .Uform {margin:5% 15% 5% 15%;}
	  textarea {
	  width: 100%;
	  height: 100%;
	}

}
@media(min-width: 601px)and (max-width:1000px){
    .Uform {margin:5% 20% 5% 20%;}
	 textarea {
	  width: 100%;
	  height: 100%;
	}

    }
  </style>
 </head>
  <body>
 <?php
   include "header.php";
 ?>
<?php
	if (isset($_GET['edit'])) {
		$username = $_GET['edit'];
		$update = true;
		$record = mysqli_query($bd, "SELECT * FROM bruker WHERE brukerNavn = '$username' ") or exit ("Error in query: $record. ".mysqli_error($bd));

		if (mysqli_num_rows($record) > 0 ) {
			$n = mysqli_fetch_array($record);
			$brukerNavn = $n['brukerNavn'];
			$passord = $n['passord'];
			$fornavn = $n['fornavn'];
			$etternavn = $n['etternavn'];
			$adrresse = $n['adrresse'];
			$ePost = $n['ePost'];
			$telefonNr = $n['telefonNr'];
      $studiear = $n['studiear'];
			$kjønn = $n['kjønn'];
			$biografi = $n['biografi'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset=”UTF-8″>
</head>
 <body>
 <form action='php_code.php' method="POST">
  <div class="Uform">
	  <label>Bruker Navn</label><br>
	  <input type="text" name="brukerNavn" value="<?php echo $brukerNavn; ?>">
	  <label>Passord</label><br>
	  <input type="text" name="passord" value="<?php echo $passord; ?>">
	  <label>Fornavn</label><br>
	  <input type="text" name="fornavn" value="<?php echo $fornavn; ?>">
	  <label>Etternavn</label><br>
	  <input type="text" name="etternavn" value="<?php echo $etternavn; ?>">
	  <label>Addresse</label><br>
	  <input type="text" name="adrresse" value="<?php echo $adrresse; ?>">
	  <label>Epost</label><br>
	  <input type="text" name="ePost" value="<?php echo $ePost; ?>">
	  <label>TelefonNr</label><br>
	  <input type="text" name="telefonNr" value="<?php echo $telefonNr; ?>">
    <label>Studie År</label><br>
	  <input type="text" name="studiear" value="<?php echo $studiear; ?>">
	  <label>Biografi</label><br>
	  <textarea name="biografi" rows="8" cols="50"><?php echo $biografi;?></textarea>
	  <label>Gender</label><br>
	  <input type="radio" name="kjønn"
	  <?php if (isset($kjønn) && $kjønn=="female") echo "checked";?>
	  value="female">Female
	  <input type="radio" name="kjønn"
	  <?php if (isset($kjønn) && $kjønn=="male") echo "checked";?>
	  value="male">Male
	  <input type="submit" name="update" value="update" />
  </div>
  </form>
 <footer id="footer">
      <p> <strong>Kontakt Oss</strong>: Sentralbord - 31 00 80 00 |
	    Beredskap - 31 00 89 00<strong><br>Copyright&copy 2018</strong> </p>
 </footer>

  </body>
  </html>
