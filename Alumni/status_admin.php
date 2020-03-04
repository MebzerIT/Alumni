<?php
//laget av Mahandri wardhana studentnr: 146980
include 'connection.php';
require_once('Ny_index.php');
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
    include "header.php";
  ?>
     <div class="content">
		<table>
				<tr>
					<th>Id</th>
					<th>Navn</th>
					<th>Epost</th>
          <th>Status</th>
          <th>Handling</th>
				</tr>
			<?php
			//We get the IDs, usernames and emails of users
			$req = mysqli_query($bd,'select idbruker, brukerNavn, ePost, fornavn, etternavn, status from bruker');
			while($dnn = mysqli_fetch_array($req))
			{
			?>
				<tr>
				<td class="left"><?php echo $dnn['idbruker']; ?></td>
				<td class="left"><a href="SePåAndre.php?id=<?php echo $dnn['idbruker']; ?>"><?php echo htmlentities($dnn['fornavn'], ENT_QUOTES, 'UTF-8'); ?>
				 <?php echo htmlentities($dnn['etternavn'], ENT_QUOTES, 'UTF-8'); ?></a></td>
				<td class="left"><?php echo htmlentities($dnn['ePost'], ENT_QUOTES, 'UTF-8'); ?></td>
        <td class="left"><?php echo htmlentities($dnn['status'], ENT_QUOTES, 'UTF-8'); ?></td>
        <td class="left"> <a href="status_aktiv.php?id=<?php echo $dnn['idbruker'] ?>">Bytt status</a></td>
			</tr>
			<?php
			}
			?>
		</table>
      </div>
	  <footer id="footer">
      <p> <strong>Kontakt Oss</strong>: Sentralbord - 31 00 80 00 |
	    Beredskap - 31 00 89 00<strong><br>Copyright&copy 2018</strong> </p>
  </footer>
   </body>
</html>
