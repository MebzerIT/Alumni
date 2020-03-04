<?php
//laget av Mahandri wardhana studentnr: 146980
  error_reporting(0);
  include '../includes/connection.php';
?>

<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>Mebrahtu Personal website</title>
  <link rel="stylesheet" href="css/Bruker.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  table {
        width: 60%;
    margin: 50px 350px;
        }

  th {
      height: 50px;
       }
  th, td {
      padding: 15px;
      text-align: left;
      }
  tr:nth-child(even) {background-color:#cccccc ;}
  tr:hover {background-color: #e6e6e6;}
  th {
  background-color: #595959;
  color: white;
   }
  </style>
 </head>
  <body>
  <?php
    include "./header.php";
  ?>
     <div class="content">
      <br/>
  <h2>Søk bruker basert på studieår</h2>

  <form action="" method="POST">
    <input type="text" name="query" placeholder="Søk"/>
    <input type="submit" name="cari" value="Search" />
  </form><br>

  <table border = "1" cellspacing= "0">
    <tr style = "font-weight: bold;">
      <td>Nr</td>
      <td>Brukernavn</td>
      <td>Studieår</td>

    <tr>

      <?php
      $nr =1;

      $query = $_POST['query'];
      if($query !=''){
        $select = mysqli_query($bd, "select bruker.brukerNavn, bruker.studiear
        from bruker
        Where  studiear LIKE '%".$query."%' ");
      }else{
        echo "Vennligst skriv år på feltet ovenfor for å finne brukerens studieår";
        $select = mysqli_query($bd, "SELECT bruker.brukerNavn FROM bruker");
      }

      if(mysqli_num_rows($select)){
      while($baris = mysqli_fetch_array($select)){
      ?>

      <tr>
        <td><?php echo $nr++ ?></td>
        <td><?php echo $baris ['brukerNavn']?></td>
        <td><?php echo $baris ['studiear'] ?></td>

      <tr>

      <?php }}else{
        echo '<tr><td colspan ="3">Finnes ikke<?php echo $nr++ ?></td><tr>';
      } ?>
      </table>
    </div>
    <?php
  	include "footer.php";
  	?>
   </div>
    </body>
    </html>
