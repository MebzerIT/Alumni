 <!-- Dette side er laget av Mebrahtu zerizghi   -->
<?php
include 'connection.php';
require_once('Ny_index.php');
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>Alle brukere</title>
  <link rel="stylesheet" href="css/Bruker.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- internal sytling -->
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
       <!-- table for visning av alle brukere -->
		<table>
				<tr>
					<th>Id</th>
					<th>Bruker Navn</th>
					<th>Epost</th>
				</tr>
			<?php
			// query for å få, id, bruker navn og ePost av brukere
			$req = mysqli_query($bd,'select idbruker, brukerNavn, ePost, fornavn, etternavn from bruker');
			while($dnn = mysqli_fetch_array($req))
			{
			?>
				<tr>
				<td class="left"><?php echo $dnn['idbruker']; ?></td>
				<td class="left"><a href="SePåAndre.php?id=<?php echo $dnn['idbruker']; ?>"><?php echo htmlentities($dnn['brukerNavn'], ENT_QUOTES, 'UTF-8'); ?>
				 <?php echo htmlentities($dnn['etternavn'], ENT_QUOTES, 'UTF-8'); ?></a></td>
				<td class="left"><?php echo htmlentities($dnn['ePost'], ENT_QUOTES, 'UTF-8'); ?></td>
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
