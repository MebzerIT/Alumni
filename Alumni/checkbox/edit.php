<?php
//laget av Mahandri wardhana studentnr: 146980
// inkluderer forbindelse
include_once("../connection.php");
include 'connection.php';
require_once('Ny_index.php');

// Sjekk om skjema er submitted
if(isset($_POST['update']))
{
	$id = $_POST['idbruker'];

	$name=$_POST['inte_navn'];


	// Oppdaterer interesse basert på bruker ID
	$result = mysqli_query($mysqli, "UPDATE interesser SET inte_navn='$name' WHERE idbruker=$id");

	// tilbake
	header("Location: index.php");
}
?>
<?php
// Vis data basert på ID
// Får Id fra URL
$id = $_GET['id'];

// Henete data basert på ID
$result = mysqli_query($bd, "SELECT * FROM interesser WHERE idbruker=$id");

while($user_data = mysqli_fetch_array($result))
{
	$name = $user_data['name'];

}
?>
<html>
<head>
	<title>Rediger interesser</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<form name="update_user" method="post" action="edit.php">
		<table border="0">
			<tr>
				<td>Interesser</td>
				<td><input type="text" name="name" value=<?php echo $id;?>></td>
			</tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Oppdater"></td>
			</tr>
		</table>
	</form>
</body>
</html>
