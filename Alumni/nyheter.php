 <!-- Dette side er laget av Mebrahtu zerizghi  -->
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
		<!-- visning av innhold i to kolonne  med lenker -->
   <article id="main">
	  <div class="row">
       <div class="column" >
	     <h3>Nyheter</h3>
	     <hr size="2" width= 100% />
         <h4>Forsknings nyheter</h4>
         <h5>Oppdrag forskning</h5>
         <p><a href="https://www.usn.no/aktuelt/aktivitetskalender/helskinnet-gjennom-doktorgraden-ph-d-kandidatenes-psykososiale-helse-article222317-7373.html" rel="nofollow"><em>USN ønsker å være en viktig bidragsyter til våre omgivelser.<br>
            En betydelig andel av vår forskning gjøres på oppdrag eller i samarbeid med andre</em></a></p>
            <h5>Hva forsker vi</h5>
            <p><a href="https://www.usn.no/forskning/oppdragsforskning/" rel="nofollow"><em>USN har sin særlige styrke i regional tilknytning og anvendt forskning.<br>
               Derfor bygger vi forskningskompetanse på noen av de mest sentrale områdene<br>
                der vi finner uløste samfunnsutfordringer – som helse, utdanning, teknologi og samfunnsforskning.<br></em></a></p>
               </div>
      <div class="column" >
	     <h3>Aktiviteter</h3>
	    <hr size="2" width= 100% />
        <h4>Alumni Aktiviteter</h4>
        <h5>Jun 5. Helskinnet gjennom doktorgraden – ph.d.-kandidatenes psykososiale helse</h5>
        <p><a href="https://www.usn.no/aktuelt/aktivitetskalender/helskinnet-gjennom-doktorgraden-ph-d-kandidatenes-psykososiale-helse-article222317-7373.html" rel="nofollow"><em>
        Universitetet i Sørøst-Norge ønsker velkommen til den nasjonale forskerutdanningskonferansen 2019! I år møtes vi i Norges eldste by Tønsberg.</em></a></p>
        <h5>Jun 6. Masterutstilling 2019</h5>
        <p><a href="https://www.usn.no/aktuelt/aktivitetskalender/masterutstilling-2019-article223148-7373.html" rel="nofollow"><em>UPresentasjon av masteroppgaver i design, kunst og håndverk.<br></em></a></p>

      </div>
     </div>

   </article>
	 <?php $bd->close();
 	include "footer.php";
 	?>
 </body>
</html>
