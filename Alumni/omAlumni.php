 <!-- Dette side er laget av Mebrahtu zerizghi -->
<?php
	require_once('Ny_index.php');
	include "connection.php";
	//session_start();
?>
<!DOCTYPEhtml>
<html>
 <head>
  <meta charset="UTF-8">
  <title>Bruker Side</title>
  <link rel="stylesheet" href="css/Bruker.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- internal styling -->
		<style>
		* {
		box-sizing: border-box;
		}

		.column {
		float: left;
		width: 50%;
		padding: 10px;
		height: 500px;
		border-left: 5px solid #bbb;
		}

		.row:after {
		content: "";
		display: table;
		clear: both;
		}

  	}
		@media screen and (max-width: 600px) {
		.column {
		width: 100%;
		}
		hr {
		width: 50%;
		}
		}
   </style>
 </head>
  <body>
		<?php
 		 include "header.php";
 	 ?>
   <article >

	     <h3 span style="font-style:bold;font-size:30px;position:absolute;left:25%; bottom:-80%;">Om USN Alumni</h3>

           <p span style="font-style:bold;font-size:14px;position:absolute;left:25%; bottom:-140%;">
						  USN alumni er en tjeneste for studenter som ønsker å holde seg oppdatert på Universitetet i Sørøst Norge - både sosialt og faglig.<br>
	          	Mange av USN enheter arrangerer arrangementer for alumni, slik at de kan holde kontakten med og utvide sine sosiale og profesjonelle nettverk.</p>

				 	<p span style="font-style:bold;font-size:14px;position:absolute;left:25%; bottom:-230%;">
						Som medlem i USN Alumni du vil få tilgang til et profesjonelt nettverk over hele verden, som vil være relevant gjennom hele karrieren din<br>
						du kan holde deg oppdatert i ditt felt, utvikle nettverk og samarbeid gjennom konferanser og seminarer<br>
						du og din arbeidsplass kan ha nytte av USNs kompetanse gjennom samarbeid om forskningsprosjekter, gjestelesninger, studentoppgaver og praktikplasser.<br>
						du blir brobygger mellom universitet og samfunn, og bidrar til utvikling, transformasjon og vekst i Norge og internasjonalt<br>
						du vil få forskningsnyheter fra USN, du vil bli informert om videreutdanning og deltidsstudier o.s.v . </p>
   </article>
	 <?php $bd->close();
 	include "footer.php";
 	?>
 </body>
</html>
