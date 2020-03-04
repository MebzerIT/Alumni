<?php
//laget av Mahandri wardhana studentnr: 146980
  error_reporting(0);
  include 'connection.php';
  require_once('Ny_index.php');
?>

<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>Søk interesse</title>
  <link rel="stylesheet" href="../css/Bruker.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  tr:hover {background-color: #e6e6e6;}
  th {
  background-color: #595959;
  color: white;
   }
   #fotcont{
     position: relative;
     top:500px;
     width:100%;
     padding: 20px;
     height: 100px;
     margin-bottom:-100px;
     clear: both;
     background-color:gray;
     color:white;
     text-align: center;
       }
  </style>
 </head>
  <body>
    <header id="header">
     <div class="logo">
      <a href="../NewHjem.php"><img class = "logoSize"  alt="logo" src="../bilder/logo.png"</img></a>
     </div>
     <nav class= "topnavigation" role="navigation">
      <div id="menuToggle">

       <ul id="menu">
       <li><a href="../NewHjem.php">Hjem</a></li>
       <li><a href="../home.php">Min Profil</a></li>
       <li><a href="../alleBrukere.php">Medlemmer</a></li>
       <li><a href="../inbox.php">Meldinger</a></li>
             <?php if($_SESSION['level']=='admin'){ ?>
                 <li><a href="../admin_rules.php">Admin Regler</a></li>
                 <li><a href="../admin.php">Admin bruker</a></li>
             <?php } ?>
     </ul>
      </div>
     <div class="BpOrd">
        <button type="button"><a href="Ny_index.php?loggut='1'"> Logg av </a></button></p>

     </div>
    </nav>

    </header>
     <div class="content">
      <br/>
  <h2>Søk interesse</h2>

  <form action="" method="POST">
    <input type="text" name="query" placeholder="Søk"/>
    <input type="submit" name="cari" value="Search" />
  </form><br>

  <table border = "1" cellspacing= "0">
    <tr style = "font-weight: bold;">
      <td>Nr</td>
      <td>Brukernavn</td>
      <td>Interesse</td>

    <tr>

      <?php
      $nr =1;

      $query = $_POST['query'];
      if($query !=''){
        $select = mysqli_query($bd, "select bruker.brukerNavn, interesser.inte_navn
        from bruker , interesser
        Where bruker.idbruker=interesser.idbruker
        AND inte_navn LIKE '%".$query."%' ");
      }else{
        echo "";
        $select = mysqli_query($bd, "SELECT bruker.brukerNavn FROM bruker");
      }

      if(mysqli_num_rows($select)){
      while($baris = mysqli_fetch_array($select)){
      ?>

      <tr>
        <td><?php echo $nr++ ?></td>
        <td><?php echo $baris ['brukerNavn']?></td>
        <td><?php echo $baris ['inte_navn'] ?></td>

      <tr>

      <?php }}else{
        echo '<tr><td colspan ="3">Finnes ikke<?php echo $nr++ ?></td><tr>';
      } ?>
      </table>
      </div>
      <div id="fotcont">
    	  <footerr>
    		  <p> <strong>Kontakt Oss</strong>: Sentralbord - 31 00 80 00 |
    	   	Beredskap - 31 00 89 00<strong><br>Copyright&copy 2018</strong> </p>
       </footer>
    </body>
    </html>
