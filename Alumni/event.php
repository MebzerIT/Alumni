<?php
//laget av Mahandri wardhana studentnr: 146980
include 'connection.php';
require_once('Ny_index.php');
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>event</title>
  <link rel="stylesheet" href="css/Bruker.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  #button1{
    width: 300px;
    height: 40px;
}
	#button2{
    width: 300px;
    height: 40px;
}
#button3{
    width: 300px;
    height: 40px;
}
	#container{
    text-align: center;
}
  </style>
 </head>
  <body>
  <?php
    include "header.php";
  ?>
  <br/>
     <div class="content">
		<div id="container">
    	<button onclick="location.href='nyevent.php'"type="button opprett-button" id="button1" >Opprett arrangement</button>
    	<button onclick="location.href='opprett.php'"type="button vis-button" id="button2">Vis arrangementer</button>
    	<button onclick=""type="button inv-button" id="button3">Invitasjon</button>
	</div>
      </div>
      <?php $bd->close();
    	include "footer.php";
    	?>
   </body>
</html>
