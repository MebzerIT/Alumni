<?php
//laget av Mahandri wardhana studentnr: 146980
  error_reporting(0);
  include '../includes/connection.php';
?>

<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>Søk</title>
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
     top:800px;
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
            <li><a href="../rules.html">Regler</a></li>
            <?php if($_SESSION['level']=='admin'){ ?>
                <li><a href="../admin_rules.php">Admin Regler</a></li>
                <li><a href="../admin.php">Admin bruker</a></li>
            <?php } ?>
    </ul>
   </nav>
    <div class="BpOrd">
        <?php  if (isset($_SESSION['username'])) : ?>
       <p><a href="Ny_index.php?loggut='1'">
        <button type="button" class="logout">
        <span class="logout" ></span> Logg ut</button>
        </a></p>
       <?php endif ?>
     </div>
   </header>
     <div class="content">
      <br/>
  <h2>Søk personer basert på studium</h2>

  <form action="" method="POST">
    <input type="text" name="query" placeholder="Søk"/>
    <input type="submit" name="cari" value="Search" />
  </form><br>

  <table border = "1" cellspacing= "0">
    <tr style = "font-weight: bold;">
      <td>Nr</td>
      <td>Brukernavn</td>
      <td>Studium</td>

    <tr>

      <?php
      $nr =1;

      $query = $_POST['query'];
      if($query !=''){
        $select = mysqli_query($bd, "select bruker.brukerNavn, studium.studium_navn
        from bruker , studium
        Where bruker.idbruker=studium.studium_id
        AND studium_navn LIKE '%".$query."%' ");
      }else{
        echo "";

      }

      if(mysqli_num_rows($select)){
      while($baris = mysqli_fetch_array($select)){
      ?>

      <tr>
        <td><?php echo $nr++ ?></td>
        <td><?php echo $baris ['brukerNavn']?></td>
        <td><?php echo $baris ['studium_navn'] ?></td>

      <tr>

      <?php }}else{
        echo '<tr><td colspan ="3"><?php echo $nr++ ?></td><tr>';
      } ?>
      </table>
    </div>
    <div id="fotcont">
     <footerr>
       <p> <strong>Kontakt Oss</strong>: Sentralbord - 31 00 80 00 |
       Beredskap - 31 00 89 00<strong><br>Copyright&copy 2018</strong> </p>
     </footer>
    </div>
    </body>
    </html>
