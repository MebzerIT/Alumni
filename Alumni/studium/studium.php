<?php
//laget av Mahandri wardhana studentnr: 146980
include_once("../connection.php");
require_once('Ny_index.php');
?>
<?php
    if(isset($_POST["submit"])){
        $studiumarr=$_POST["Studium"];
        $newvalues=  implode(",", $studiumarr);
        include_once './checkboxClass.php';
        $checkBoxClass=new checkboxClass();
        echo $checkBoxClass->addtoDatabase($newvalues);
        foreach($_POST['Studium'] as $studiumarr){
          echo $studiumarr." ";
          header("Location: profile.php");
        }
      }
?>


<!DOCTYPEhtml>
<html>
 <head>
  <meta charset="UTF-8">
  <title>Studium</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/Bruker.css">

  <style>
  input[type='checkbox'] {
    -webkit-appearance:none;
    width:18px;
    height:18px;
    background:white;
    border-radius:5px;
    border:2px solid #555;
    vertical-align: middle;
    display: inline-block;

}
input[type='checkbox']:checked {
    background: black;
}

form {
  width: 600px;
  margin: 0 auto;
}

.containeer {
     border-top-style: solid;
     border-top-width: 0px;
     padding-top: 100px;
   }

fieldset {
  position: center;
  background-color: #ccc;
  border: 5px solid black;
  border-color: #4240A4;
}

legend {
  padding: 10px;
  background-color: #4240A4;
  color: black;
}



.item {
  white-space: nowrap;display:inline
}

.checkboxes {
    columns: 4 8em;
}
  </style>
 </head>
  <body>
    <header id="header">
    <div class="logo">
     <a href="../NewHjem.php"><img class = "logoSize"  alt="logo" src="../Bilder/logo.png"</img></a>
    </div>
    <nav class= "topnavigation" role="navigation">
     <div id="menuToggle">


      <ul id="menu">
      <li><a href="../NewHjem.php">Hjem</a></li>
      <li><a href="../home.php">Min Profil</a></li>
      <li><a href="../alleBrukere.php">Medlemmer</a></li>
      <li><a href="../inbox.php">Meldinger</a></li>
            <li><a href="../rules.html">Regler</a></li>
            <?php if($_SESSION['level']=='admin'){ ?>
                <li><a href="../admin_rules.php">Admin Regler</a></li>
                <li><a href="../admin.php">Admin bruker</a></li>
            <?php } ?>
    </ul>
   </nav>
    <div class="BpOrd">

       <button type="button"class="logout"><a href="Ny_index.php?loggut='1'"> Logg ut </a></button></p>

    </div>
   </header>

	 <div class="containeer">
			 <form action="../home.php" method="post">
				 <fieldset>
           <legend style="color: white; border-left-style: solid;border-left-width: 0px;margin-left: 20px;"><b> Velg Studium </b></legend> </br>





           <?php
           include "../connection.php";
           $nr =1;

           $select = mysqli_query($bd, "SELECT study_navn FROM study");

           while($row = mysqli_fetch_array($select)){
             echo "<input type='checkbox' name='Studium[]' value='".$row['study_navn']."'>"
             .$row['study_navn']."<br/>";
           ?>


           <?php };
            ?>
            <br/><br/>







               <br/><br/>
               <input type="submit" id="submit" name="submit" value="Rediger" formaction="study.php" class="btn btn-primary">
    					 <input type="submit" id="submit" name="submit" value="Søk" formaction="search.php" class="btn btn-primary">
    					 <input type="submit" id="submit" name="submit" value="Oppdater" class="btn btn-primary" <?php if(isset($_POST['submit'])) echo "checked='checked'"; ?>>
				 </fieldset>
			 </form>
	 </div>
 </div>
 <div id="fotcont">
   <?php
 	include "footer.php";
 	?>

 </body>
</html>
