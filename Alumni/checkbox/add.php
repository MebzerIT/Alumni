<?php
//laget av Mahandri wardhana studentnr: 146980
include 'connection.php';
require_once('Ny_index.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/Bruker.css">
  <link rel="stylesheet" href="../css/checkbox.css">
	<style>
 table {
			 width: 60%;
	 margin: 20px 350px;

			 }

 th {
		 height: 50px;
			}
 th, td {
		 padding: 15px;
		 text-align: left;
		 }
 tr:nth-child(even) {background-color:#cccccc ;}
	}
 </style>
  </head>
 <body>
   <header id="header">
	  <div class="logo">
	   <a href="../NewHjem.php"><img class = "logoSize"  alt="logo" src="../bilder/logo.png"</img></a>
	  </div>
	  <nav class= "topnavigation" role="navigation">
	   <div id="menuToggle">

	    <ul id="menu">
			<li><a href="../NewHjem.php">Hjem</a></li>
			<li><a href="../home.php">Min Profil</a></li>
			<li><a href="../alleBrukere.php">Medlemmer</a></li>
      <li><a href="../inbox.php">Meldinger</a></li>
            <?php if($_SESSION['level']=='admin'){ ?>
                <li><a href="../admin_rules.php">Admin Regler</a></li>
                <li><a href="../admin.php">Admin bruker</a></li>
            <?php } ?>
		</ul>
	   </div>
	  <div class="BpOrd">
       <button type="button"><a href="Ny_index.php?loggut='1'"> Logg av </a></button></p>

	  </div>
	 </nav>

   </header>
   <br/><br/>
	<!-- <a class="ared" href="index.php">Tilbake</a> -->
	<br/><br/>
<div class="contain">
	<div class="dynamic-label-wrapper">
	    <div>
	      <label>Ny interesse: </label>
	<form action="add.php" method="post" name="form1">
		<input type="text" name="name">

</div>
</div>
</div>
<input type="submit" name="Submit" value="Legg til">
</form>

	<?php

	// Sjekk om skjema er submit, også sett inn
	if(isset($_POST['Submit'])) {
		$name = $_POST['name'];

		// inkluderer forbindelse
		include_once("../connection.php");

		// Sett inn interesser
		$result = mysqli_query($bd, "INSERT INTO lagde_interesser(inte_navn) VALUES('$name')");

		// Vis melding når den er gjort
		echo "Interesser oppdatert. <a href='interest.php'>Se oppdatering</a>";
	}
	?>
  <?php $bd->close();
	include "footer.php";
	?>
</body>
</html>
