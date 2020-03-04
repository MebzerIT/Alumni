<!-- Dette side er laget av Mebrahtu zerizghi   -->
<?php
// tikobling
require_once('Ny_index.php');
include "connection.php";
	

$select_path="select * from bruker";

$var=mysql_query($select_path);

while($row=mysql_fetch_array($var))
{
 $image_name=$row["imagename"];
 $image_path=$row["imagepath"];
 echo "img src=".$image_path."/".$image_name." width=100 height=100"; // henting av bilde fra katalog
}
?>
