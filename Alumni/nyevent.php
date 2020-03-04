<?php
//laget av Mahandri wardhana studentnr: 146980
// inkludere forbindelse
require_once "connection.php";

// Definer variablene med tom verdier
$tittel = $beskrivelse = $sted = $dato = $tid = "";
$tittel_err = $beskrivelse_err = $sted_err = $dato_err =$tid_err = "";

// Utføre form datahandling når submit
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Titel validering
    $input_tittel = trim($_POST["tittel"]);
    if(empty($input_tittel)){
        $tittel_err = "Vennligst skriv tittel.";

    } else{
        $tittel = $input_tittel;
    }

    // Beskrivelse validering
    $input_beskrivelse = trim($_POST["beskrivelse"]);
    if(empty($input_beskrivelse)){
        $beskrivelse_err = "Vennligst skriv beskrivelse.";
    } else{
        $beskrivelse = $input_beskrivelse;
    }

    // Sted validering
    $input_sted = trim($_POST["sted"]);
    if(empty($input_sted)){
        $sted_err = "Vennligst skriv sted.";

    } else{
        $sted = $input_sted;

    }
    // dato validering
    $input_dato = trim($_POST["dato"]);
    if(empty($input_dato)){
        $dato_err = "Vennligst skriv dato.";

    } else{
        $dato = $input_dato;

    }
    //Tid validering
    $input_tid = trim($_POST["tid"]);
    if(empty($input_tid)){
        $tid_err = "Vennligst skriv tid.";

    } else{
        $tid = $input_tid;
    }

    // Sjekk error før insert
    if(empty($tittel_err) && empty($beskrivelse_err) && empty($sted_err)&& empty($dato_err)&& empty($tid_err)){
        // Klargjøre insert
        $sql = "INSERT INTO event (event_tittel, event_beskrivelse, event_sted, event_dato, event_tid) VALUES (?, ?, ?, ?,?)";

        if($stmt = mysqli_prepare($bd, $sql)){
            // binde variabler  i parameter
            mysqli_stmt_bind_param($stmt, "sssss", $param_tittel, $param_beskrivelse, $param_sted, $param_dato, $param_tid);

            // Set parameter
            $param_tittel = $tittel;
            $param_beskrivelse = $beskrivelse;
            $param_sted = $sted;
            $param_dato = $dato;
            $param_tid = $tid;

            // utføre parameter
            if(mysqli_stmt_execute($stmt)){
                // vellyket, gå til location
                header("location: opprett.php");
                echo "Ditt arrangement er lagret";
                exit();
            } else{
                echo "Noe gikk galt, vennligst prøv igjen.";
            }
            // Steng statement
            mysqli_stmt_close($stmt);
        }

    }

    // Lukk forbindelse
    mysqli_close($bd);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Opprett arrangement</title>
    <link rel="stylesheet" href="../css/bruker.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }

        input[type=submit] {
  background-color: #0693cd;
  border: 0;
  border-radius: 5px;
  cursor: pointer;
  color: #fff;
  font-size:16px;
  font-weight: bold;
  line-height: 1.4;
  padding: 5px;
  margin-left: 20px;
  width: 80px
}

.form-group
{
  margin: 0 auto;
  max-width: 900px;
  padding: 10px 20px;
}
.form-control
{
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  font: 15px/1 'Open Sans', sans-serif;
  color: #333;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  width: 100%;
  max-width: 500px;
  background-color: white;
  border: none;
  padding: 10px 11px 11px 11px;
  border-radius: 3px;
  box-shadow: none;
  outline: none;
  margin: 0;
  box-sizing: border-box;
}

.avbryt{
background-color: #8b8b8b;
  border: 0;
  border-radius: 5px;
  cursor: pointer;
  color: white;
  font-size:16px;
  font-weight: bold;
  line-height: 1.4;
  padding: 5px;

  width: 80px
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
                <div class="col-md-12">
                    <div class="page-header"><br/>
                        <h2>Opprett ny arrangement</h2>
                    </div>
                    <p>Vennligst fyll feltene nedenfor</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($tittel_err)) ? 'has-error' : ''; ?>">
                            <label>Arrangement tittel</label>
                            <input type="text" name="tittel" class="form-control" value="<?php echo $tittel; ?>">
                            <span class="help-block"><?php echo $tittel_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($beskrivelse_err)) ? 'has-error' : ''; ?>">
                            <label>Beskrivelse</label>
                            <textarea name="beskrivelse" class="form-control"><?php echo $beskrivelse; ?></textarea>
                            <span class="help-block"><?php echo $beskrivelse_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($sted_err)) ? 'has-error' : ''; ?>">
                            <label>Sted</label>
                            <input type="text" name="sted" class="form-control" value="<?php echo $sted; ?>">
                            <span class="help-block"><?php echo $sted_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($dato_err)) ? 'has-error' : ''; ?>">
                            <label>Dato</label>
                            <input type="date" name="dato" class="form-control" value="<?php echo $dato; ?>">
                            <span class="help-block"><?php echo $dato_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($tid_err)) ? 'has-error' : ''; ?>">
                            <label>Tid</label>
                            <input type="time" name="tid" class="form-control" value="<?php echo $tid; ?>">
                            <span class="help-block"><?php echo $tid_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Opprett">
                        <a href="opprett.php" class="avbryt">Avbryt</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php $bd->close();
  	include "footer.php";
  	?>
</body>
</html>
