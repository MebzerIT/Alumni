 <!-- Dette side er laget av Mebrahtu zerizghi   -->
<?php
	require_once('Ny_index.php'); // tikobling
	include "connection.php";
	//session_start();
?>
<?php
//kode for opplasting av bilde
if(isset($_POST['upload'])){
	$check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
			move_uploaded_file($_FILES['file']['tmp_name'],"uploads/".$_FILES['file']['name']);
			$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
			mysqli_select_db($bd, $mysql_database) or die("Could not select database");
		$q = mysqli_query($bd,"UPDATE bruker SET bilde = '".$_FILES['file']['name']."' WHERE brukerNavn = '".$_SESSION['username']."'");
    }
	}

?>
<!DOCTYPEhtml>
<html>
 <head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="css//Bruker.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- internal styling -->
   <style>
	input.MyButton {
    position: absolute;
    left: 1700px;
		top:140px;
    width: 130px;
    padding: 12px;
    cursor: pointer;
    font-weight: bold;
    font-size: 100%;
    background: #ff6633;
    color: #fff;
    border: 1px solid #3366cc;
    border-radius: 10px;
    -moz-box-shadow:: 6px 6px 5px #999;
    -webkit-box-shadow:: 6px 6px 5px #999;
    box-shadow:: 6px 6px 5px #999;
    }
   input.MyButton:hover {
    color: #ffff00;
    background: #000;
    border: 1px solid #fff;
    }
	#De {
		position: absolute;
		left: 1700px;
	 top:200px;
		width: 130px;
		padding: 12px;
	  }
	 #Int {position: absolute;
	 left: 1700px;
	 top:250px;
	 width: 130px;
	 padding: 12px;

	 }
	 #Stt {position: absolute;
		 left:1700px;
		 top:300px;
		 width: 130px;
		 padding: 12px;
      }
	 #regel {position: absolute;
	 		 left:1700px;
	 		 top:350px;
	 		 width: 130px;
	 		 padding: 12px;
	       }
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
	@media screen and (max-width: 600px) {
		input.MyButton {
	    position: absolute;
	    left: 400px;
			top:200px;
	    }
		#De {
			position: absolute;
			left: 450px;
		 top:250px;
			}
		 #Int {position: absolute;
		 left: 350px;
		 top:250px;
		 }
		 #Stt {position: absolute;
			 left:250px;
			 top:250px;
      }
		 #regel {position: absolute;
		 		 left:150px;
		 		 top:250px;
		 		 }
			 }
	 @media (min-width: 601px) and (max-width: 1000px) {
		 input.MyButton {
 	    position: absolute;
 	    left: 800px;
 			top:10px;
 	    }
 		#De {
 			position: absolute;
 			left: 855px;
 		 top:80px;
 			}
 		 #Int {position: absolute;
 		 left: 725px;
 		 top:80px;
 		 }
 		 #Stt {position: absolute;
 			 left:600px;
 			 top:80px;
       }
 		 #regel {position: absolute;
 		 		 left:475px;
 		 		 top:80px;
 		 		 }
 			 }
}
  </style>
 </head>
  <body>
   <header id="header">
	  <div class="logo">
	   <a href="./NewHjem.php"><img class = "logoSize" alt="logo" src="./Bilder/logo.png"</img></a>
	  </div>
	  <nav class= "topnavigation" role="navigation">
	   <div id="menuToggle">
	     <input type="checkbox"/>
		 <span></span>
         <span></span>
         <span></span>
	    <ul id="menu">
			<li><a href="NewHjem.php">Hjem</a></li>
			<li><a href="home.php">Min Profil</a></li>
			<li><a href="./alleBrukere.php">Personer</a></li>
			<li><a href="./inbox.php">Meldinger</a></li>
            <?php if($_SESSION['level']=='admin'){ ?>
                <li><a href="admin_rules.php">Admin Regler</a></li>
                <li><a href="admin.php">Admin bruker</a></li>
            <?php } ?>
		</ul>
	 </nav>
    <div class="container">
	 <?php  if (isset($_SESSION['username'])) : ?>
		 <p>
			<a href="Ny_index.php?loggut='1'">
			  <button type="button" class="btn btn-default btn-sm">
			  <span class="glyphicon glyphicon-log-out" ></span> Logg ut</button>
			</a> </p>
     <?php endif ?>

	</div>
   </header>
    <?php
		require_once('connection.php');
		$username = $_SESSION['username'];
		$result3 = mysqli_query($bd,"SELECT * FROM bruker JOIN interesser ON bruker.idbruker = interesser.idbruker AND brukerNavn='$username'"); // query for henting av bruker detalj
		while($row3 = mysqli_fetch_array($result3))
		{
	    $idbruker=$row3['idbruker'];
		$fornavn=$row3['fornavn'];
		$etternavn=$row3['etternavn'];
		$ePost=$row3['ePost'];
		$telefonNr=$row3['telefonNr'];
		$kjønn=$row3['kjønn'];
		$adrresse=$row3['adrresse'];
		$biografi=$row3['biografi'];
		$interesse=$row3['inte_navn'];
		$studiear=$row3['studiear'];
		}
	?>
  <article id="main">
		<!-- lenker  -->
		<form>
		<input class="MyButton" type="button" value="Deaktivere" onclick="window.location.href='./Avregister.php'" />
	 </form>
	    <div id="De">
		     <p><a href="update.php?edit=<?php echo $username ?>"><button>Redigere min Profil</button></a></p>
	    </div>
			<div id="Int">
					 <p><a href="./checkbox/interesser.php"><button>Legge til Interesse</button></a></p>
				</div>
			<div id="Stt">
			     <p><a href="./studium/studium.php"><button>Legge til Studium</button></a></p>
	   </div>
		 <div id="regel">
					<p><a href="./HTML/rules.html"><button>Les Alumni Regler</button></a></p>
	   </div>
   <table>
        <tr>
        <td id="image">
		 <?php
		 $result = mysqli_query($bd, "select bilde from bruker where brukerNavn = '".$_SESSION['username']."'");  // henting av profil bilde for brukeren
				while ($row = mysqli_fetch_array($result)) {
					echo "<div id='img_div'>";
					  echo "<img src='uploads/".$row['bilde']."' />";
					  break;
					echo "</div>";
				 }
			  ?>
			  <form method="POST" action="home.php" enctype="multipart/form-data">
					<input type="file" name="file" size="8">
					<button type="submit" name="upload"  >POST</button>
			  </form>
		</td>
        <td>
         <?php echo $fornavn ?> <?php echo $etternavn ?>
		</td>
		</tr>
	    <tr>
		<td>Fornavn</td>
		<td> <?php echo $fornavn ?></td>
		</tr>
	    <tr>
		<td>Etternavn:</td>
		<td><?php echo $etternavn ?></td>
		</tr>
	    <tr>
		<td>Epost:</td>
		<td><?php echo $ePost ?></td>
		</tr>
		<tr>
		<td>TelefonNr:</td>
		<td><?php echo $telefonNr ?></td>
		</tr>
		<tr>
		<td>Kjønn:</td>
		<td><?php echo $kjønn ?></td>
		</tr>
	    <tr>
		<td>Adresse:</td>
		<td><?php echo $adrresse ?></td>
		</tr>
		<tr>
		<td align="right" valign="top">Biografi</td>
		<td colspan="2">
         <textarea readonly rows="6" cols="100" ><?php echo $biografi ?></textarea>
        </td>
		</tr>
		 <tr>
		<td>Interesse:</td>
		<td><?php echo $interesse ?></td>

		</tr>
		<tr>
	 <td>studiear:</td>
	 <td><?php echo $studiear ?></td>

	 </tr>
  </table>

  </article>
	<?php
	include "footer.php";
	?>
 </body>
</html>
