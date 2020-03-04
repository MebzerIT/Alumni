<!-- Dette side er laget av Mebrahtu zerizghi -->
<?php //tilkobling
include 'connection.php';
require_once('Ny_index.php');
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>sepåandre</title>
  <link rel="stylesheet" href="css/Bruker.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- internal styling -->
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

   }
@media screen and (max-width: 600px){
     table{
		width:60%;
        margin: 20px 60px;
	    }
	  textarea {
	  width: 100%;
	  height: 100%;
	}


}
@media(min-width: 601px)and (max-width:1000px){
     table{
		width:60%;
        margin: 20px 100px;
	    }
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
        <div class="content">
<?php
//vi kjekker om brukerens id
if(isset($_GET['id']))
{
        $id = intval($_GET['id']);
        //kjekker om brukeren finnes
        $dn = mysqli_query($bd,'SELECT * FROM bruker JOIN interesser ON bruker.idbruker = interesser.idbruker AND bruker.idbruker="'.$id.'"');
        if(mysqli_num_rows($dn)>0)
        {
                $dnn = mysqli_fetch_array($dn);
                //viser bruker detalj
?>
<table>
        <tr>
        <td id="image"><?php
if($dnn['bilde']!='')
{
        // echo '<img src="'.htmlentities($dnn['bilde'], ENT_QUOTES, 'UTF-8').'" alt="bilde" style="max-width:100px;max-height:100px;" />';
		echo "<img src='uploads/".$dnn['bilde']."' />";
}
else
{
        echo 'This user dont have an avatar.';
}
?></td>
        <td>
        <?php echo htmlentities($dnn['fornavn'], ENT_QUOTES, 'UTF-8'); ?> <?php echo htmlentities($dnn['etternavn'], ENT_QUOTES, 'UTF-8'); ?></td>
		</tr>
	    <tr>
		<td>Fornavn</td>
		<td><?php echo htmlentities($dnn['fornavn'], ENT_QUOTES, 'UTF-8'); ?></td>
		</tr>
	    <tr>
		<td>Etternavn:</td>
		<td><?php echo htmlentities($dnn['etternavn'], ENT_QUOTES, 'UTF-8'); ?></td>
		</tr>
	    <tr>
		<td>Epost:</td>
		<td><?php echo htmlentities($dnn['ePost'], ENT_QUOTES, 'UTF-8'); ?></td>
		</tr>
		<tr>
		<td>TelefonNr:</td>
		<td><?php echo htmlentities($dnn['telefonNr'], ENT_QUOTES, 'UTF-8'); ?></td>
		</tr>
		<td>Kjønn:</td>
		<td><?php echo htmlentities($dnn['kjønn'], ENT_QUOTES, 'UTF-8'); ?><br /></td>
		</tr>
	    <tr>
		<td>Adresse:</td>
		<td><?php echo htmlentities($dnn['adrresse'], ENT_QUOTES, 'UTF-8'); ?><br /></td>
		</tr>
		<tr>
		<td align="right" valign="top">Biografi</td>
		<td colspan="2">
         <textarea readonly rows="6" cols="100" ><?php echo htmlentities($dnn['biografi'], ENT_QUOTES, 'UTF-8'); ?></textarea>
        </td>
		</tr>
		<tr>
		<td>Interesse:</td>
		<td><?php echo htmlentities($dnn['inte_navn'], ENT_QUOTES, 'UTF-8'); ?><br /></td>
		</tr>

</table>

<?php
        }
        else
        {
                echo 'This user dont exists.';
        }
}
else
{
        echo 'The user ID is not defined.';
}
?>
                </div>

	<footer id="footer">
      <p> <strong>Kontakt Oss</strong>: Sentralbord - 31 00 80 00 |
	    Beredskap - 31 00 89 00<strong><br>Copyright&copy 2018</strong> </p>
    </footer>
        </body>
</html>
