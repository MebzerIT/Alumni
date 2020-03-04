 <!-- Dette side er laget av Mebrahtu zerizghi -->
<?php
require_once('Ny_index.php');
include "connection.php";

$location="uploads/";
$name=$_FILES['myimage']['name'];

if(isset($_POST['submit'])){
    $location="uploads/";
    $name=$_FILES['myimage']['name'];
    $temp_name=$_FILES['myimage']['tmp_name'];
    if(isset($name)){
        move_uploaded_file($temp_name,$location.$name);
    }
}

$insert_path="INSERT INTO bruker VALUES('$location','$name')";

$var=mysqli_query($bd,"INSERT INTO bruker VALUES('$location','$name')")or die("ERRRR");
?>
<?php
   if(isset($_POST['submit'])){
      move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/".$_FILES["file"]["name"]);
      $bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
      mysqli_select_db($bd, $mysql_database) or die("Could not select database");
	  $q =mysqli_query($bd,"UPDATE bruker SET bilde = '".$_FILES["file"]["name"]."! WHERE brukerNavn = '".$_SESSION['SESS_MEMBER_ID'],"'");
       }
?>
  <?php
      $bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
      $q =mysqli_query($bd,"SELECT* FROM bruker );
      while ($row = mysqli_fetch_assoc($q)){
		  eco $row['SESS_MEMBER_ID'];
		  if($row['bilde'] = ""] {
			  echo "<img width='100' height='100' src='uploads/default.jpg' alt='Default profie pic'>";
		  } else {
			  echo "<img width='100' height='100' src="uploads/".$row['picture']."' alt='profile profie pic'>";
		  }
		  echo"<br>";
	    }
  ?>
