<?php
//laget av Mahandri wardhana studentnr: 146980
include 'connection.php';
require_once('Ny_index.php');
// Spørring for å hente alt studium
$result = mysqli_query($bd, "SELECT* FROM study ORDER BY study_id ASC");
if (!$result) {
    printf("Error: %s\n", mysqli_error($bd));
    exit();
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/Bruker.css">
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
      <li><a href="./inbox.php">Meldinger</a></li>
            <li><a href="rules.php">Regler</a></li>
            <?php if($_SESSION['level']=='admin'){ ?>
                <li><a href="admin_rules.php">Admin Regler</a></li>
                <li><a href="admin_users.php">Admin bruker</a></li>
            <?php } ?>
		</ul>
	   </div>
	  <div class="BpOrd">
	    <p>
       <button type="button"><a href="Ny_index.php?loggut='1'"> Logg av </a></button></p>

	  </div>
	 </nav>

   </header>
   <br/><br/>


<div align="center" class="ared"><p><a href="./addstudy.php">Legg til Studium</a></p></div><br/>

    <table class= "center" width='100%' border=1>

    <tr>
        <th>Studium</th> <th>Handling</th>
    </tr>
    <?php
    while($user_data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<tr>";
        echo "<td>".$user_data['study_navn']."</td>";
        echo "<td> <a href='delete.php?id=$user_data[study_id]'>Slett</a></td></tr>";
    }
    ?>
    </table>
    <?php
   include "footer.php";
   ?>
</body>
</html>
