<!-- Dette side er laget av Mebrahtu zerizghi -->
<?php // tikobling og henting av data
require 'connection.php';
  $sql = "SELECT* FROM regler";
  // opner html fila for skriving
  $open = fopen("./HTML/rules.html",'w');
  fwrite($open, "<html>\n\t<head> <meta charset='UTF-8'> <link rel='stylesheet' href='../css/Bruker.css' />\n\t\t<title>regler</title>\n\t<style>
  header { Padding:30px 20px; text-align: center ; width:100%;
             color: #ffffff; background-color:#4240A4; }
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
   footer{
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
  </style></head>\n");
   fwrite($open,"\t<body>\n\t\t");
   fwrite($open,"\t<header> <div class='logo'>
      <a href='../NewHjem.php'><img class = 'logoSize' alt='logo' src='../Bilder/logo.png'</img></a>
    </div>
   <nav class= 'topnavigation' role='navigation'>
     <div id='menuToggle'>
       <input type='checkbox'/>
     <span></span>
         <span></span>
         <span></span>
      <ul id='menu'>
          <li><a href='../NewHjem.php'>Hjem</a></li>
          <li><a href='../home.php'>Min Profil</a></li>
          <li><a href='../alleBrukere.php'>Pesroner</a></li>
          <li><a href='../inbox.php'>Meldinger</a></li>
     </ul>
   </nav>
    <div class='container'>
     <p>
      <a href='../Ny_index.php?loggut='1''>
        <button type='button' class='btn btn-default btn-sm'>
        <span class='glyphicon glyphicon-log-out' ></span> Logg ut</button>
      </a> </p>
  </div></header>\n\t\t");
    fwrite($open,"\t<article>\n\t\t");
    fwrite($open,"<h1  align='center'>Regler</h1>");
     fwrite($open,"<table class='zebra'>\n\t\t\t<tr><th style='width: 5%'>Regelnavn</th><th>Beskrivelse</th></tr>");
         $resultat=mysqli_query($bd,$sql) or die ("ikke mulig &aring; hente data fra databasen");
         $antallRader=mysqli_num_rows($resultat);
// overførong av data fra database 
 for($r=1;$r<=$antallRader;$r++){
     $rad = mysqli_fetch_array($resultat);
     $regelnavn = $rad["regelnavn"];
     $regel = $rad["beskrivelse"];
     fwrite($open,"\n\t\t\t<tr><td>$regelnavn</td><td>$regel</td></tr>");
 }
 fwrite($open,"\n\t\t");
 fwrite($open,"</table>\n\t");
 fwrite($open,"<h2 align='center'><a href='../insert_report.php'>Report Bruker</a></h2>");
 fwrite($open,"</article>\n\t<div id='fotcont'>\n\t
  <footer>
    <p> <strong>Kontakt Oss</strong>: Sentralbord - 31 00 80 00 |
    Beredskap - 31 00 89 00<strong><br>Copyright&copy 2018</strong> </p>
  </footer>\n\t</body>\n</html>");
 fclose($open);

?>
