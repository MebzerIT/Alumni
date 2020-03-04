 <!-- Dette side er laget av Mebrahtu zerizghi   -->
<?php      //tilkobling
	require_once('Ny_index.php');
	include "connection.php";
	//session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/Bruker.css">
  </head>
 <body>
   <header id="header">
	  <div class="logo">
	   <img class = "logoSize"  alt="logo" src="./bilder/logo.png"</img>
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
	   </div>
	 </nav>
    <div class="container">
	      <?php  if (isset($_SESSION['username'])) : ?>
			 <p><a href="Ny_index.php?loggut='1'">
				<button type="button" class="btn btn-default btn-sm">
				<span class="glyphicon glyphicon-log-out" ></span> Logg ut</button>
				</a></p>
		   <?php endif ?>
   </header>
  <main>
    <div class="xop-section">
      <ul class="xop-grid">
        <li>
          <div class="xop-box xop-img-1">
            <a href="./nyheter.php">
              <div class="xop-info">
                <h3>Nyheter</h3>
                <!-- <p>Her kan dere finne nyheter relatert til Alumni og USN.</p> -->
              </div></a>
          </div>
        </li>
        <li>
          <div class="xop-box xop-img-2">
            <a href="./event.php">
              <div class="xop-info">
                <h3>Arrangementer</h3>
                <!-- <p>Her kan man opptre et nytt arrangement eller finne hvor det skjer</p> -->
              </div></a>
          </div>
        </li>
        <li>
          <div class="xop-box xop-img-3">
            <a href="searchyear.php">
              <div class="xop-info">
                <h3>Alumni gruppe</h3>
                <!-- <p>Her kan man finne liste over studenter som fullfører bacheloren sin.</p> -->
              </div></a>
          </div>
        </li>
        <li>
          <div class="xop-box xop-img-4">
            <a href="https://www.usn.no/ledige-stillinger/" rel="nofllow">
              <div class="xop-info">
                <h3>Jobb annonse</h3>
                <!-- <p>Her kan man legge til en jobb annonse eller søke ledige jobber.</p> -->
              </div></a>
          </div>
        </li>
        <li>
          <div class="xop-box xop-img-5">
            <a href="./omAlumni.php">
              <div class="xop-info">
                <h3>Om Alumni</h3>
                <!-- <p>Her kan man finne alle informasjonen på denne hjemmesiden.</p> -->
              </div></a>
          </div>
        </li>
		<li>
          <div class="xop-box xop-img-6">
            <a href="https://www.usn.no/studiestart/ofte-stilte-sporsmal/" rel="nofllow">
              <div class="xop-info">
                <h3>Ofte stilte spørsmål</h3>
                 <!-- <p>Her kan man finne alle informasjonen på denne hjemmesiden.</p>  -->
              </div></a>
          </div>
        </li>
      </ul>
    </div>
  </main>
	<?php $bd->close();
	include "footer.php";
	?>


 </body>
</html>
