 <?php
//laget av Mahandri wardhana studentnr: 146980
include 'connection.php';
require_once('Ny_index.php');
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>Admin</title>
  <link rel="stylesheet" href="css/Bruker.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  #button1{
    width: 300px;
    height: 40px;
    display: block;
  max-width: 300px;
  margin: auto;
}
	#button2{
    width: 300px;
    height: 40px;
    display: block;
  max-width: 300px;
  margin: auto;
}

#button3{
    width: 300px;
    height: 40px;
    display: block;
  max-width: 300px;
  margin: auto;
}

#button {
  display: block;
  max-width: 300px;
  margin: auto;
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


    <br/><br/><br/><br/><br/>
     <div class="content">
    <div id="container">

      <button onclick="location.href='admin_users.php'"type="button reg-button" id="button1" >Oversikt</button>
      <button onclick="location.href='admin_tilgang.php'"type="button sok-button" id="button2">Bytt admin rolle</button>
      <button onclick="location.href='status_admin.php'"type="button sok-button" id="button2">Aktiver bruker status</button>


  </div>
      </div>
      <?php
      require 'footer.php'; ?>
   </body>
</html>
