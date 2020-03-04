<!-- //laget av Mahandri wardhana studentnr: 146980 -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Vis arrangement</title>
    <link rel="stylesheet" href="../css/bruker.css">

    <style type="text/css">

        table {
  width: 60%;
    margin: 50px 350px;
  }

  th {
  height: 50px;
  }
  th, td{
  padding: 15px;
  text-align: left;
  }
  tr:nth-child(even) {background-color:#cccccc ;}
  tr:hover {background-color: #e6e6e6;}
  th {
  background-color: #595959;
  color: white;
   }

</style>

</head>
<body>
    <?php
    include "header.php";
    ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12"><br/>
                    <div class="page-header clearfix">
                        <h2 style="text-align:center">Arrangementer</h2>

                    </div>
                    <?php
                    // inkluderer forbindelse
                    require_once "connection.php";

                    // klagjøre select query
                    $sql = "SELECT * FROM event ORDER BY event_dato DESC";
                    if($resultat = mysqli_query($bd, $sql)){
                        if(mysqli_num_rows($resultat) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";

                                        echo "<th>Tittel</th>";
                                        echo "<th>Beskrivelse</th>";
                                        echo "<th>Sted</th>";
                                        echo "<th>Dato</th>";
                                        echo "<th>Tid</th>";

                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($resultat)){
                                    echo "<tr>";

                                        echo "<td>" . $row['event_tittel'] . "</td>";
                                        echo "<td>" . $row['event_beskrivelse'] . "</td>";
                                        echo "<td>" . $row['event_sted'] . "</td>";
                                        echo "<td>" . $row['event_dato'] . "</td>";
                                        echo "<td>" . $row['event_tid'] . "</td>";

                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            // resultatet
                            mysqli_free_result($resultat);
                        } else{
                            echo "<p class='lead'><em>Ingen resultat.</em></p>";
                        }
                    } else{
                        echo "ERROR: Kan ikke utføre $sql. " . mysqli_error($bd);
                    }

                    // Lukk forbindelse
                    mysqli_close($bd);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
  	include "footer.php";
  	?>
</body>
</html>
