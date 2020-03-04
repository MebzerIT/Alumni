<?php
//laget av Mahandri wardhana studentnr: 146980
// inkluderer forbindelse
include_once("../connection.php");

// Sjekk om skjema er submitted
if(isset($_POST['update']))
{
	$id = $_POST['idbruker'];

	$name=$_POST['studium_navn'];


	// Oppdaterer
	$result = mysqli_query($mysqli, "UPDATE studium SET studium_navn='$name' WHERE idbruker=$name");

	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Vis iden
// Får ID fra url
$id = $_GET['id'];

// Hente data basert på ID
$result = mysqli_query($bd, "SELECT * FROM studium WHERE idbruker=$id");

while($user_data = mysqli_fetch_array($result))
{
	$name = $user_data['name'];

}
?>
<html>
<head>
	<title>Rediger studium</title>
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
