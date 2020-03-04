<!-- Dette side er laget av Mebrahtu zerizghi og Najim Zaoughi -->
<?php
session_start();

// initialiser variabler
$username = "";
$email    = "";
$errors = array();
$parts ="";
$domain ="";

// DB tilkobling

include "connection.php";

// register bruker
if (isset($_POST['reg_user'])) {
  // får inndata verdiene
  $username = mysqli_real_escape_string($bd, $_POST['username']);
  $email = mysqli_real_escape_string($bd, $_POST['email']);
  $password_1 = mysqli_real_escape_string($bd, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($bd, $_POST['password_2']);

  //  kontrolerer om form er fylt på ryktig måte...
  // ved å legge til (array_push ()) tilsvarende feil til $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required");
  } else {

    $allowed = ['student.usn.no'];
  // kjekker om  addresse er riktig
    if (filter_var($email,FILTER_VALIDATE_EMAIL)){

       $parts = explode('@',$email);
       $domain = array_pop($parts);
    // kjekker om domainet er finnes
    if ( ! in_array($domain, $allowed))
       {
        { array_push($errors, "Bruk en usn-ePostadresse e.g 'student.usn.no'"); }
      }
    }
  }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // kjekker data baseen om brukern finnes med samma navn og epost
  $user_check_query = "SELECT * FROM bruker WHERE brukerNavn='$username' OR ePost='$email' LIMIT 1";
  $result = mysqli_query($bd, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // hvis brukern finnes
    if ($user['brukerNavn'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['ePost'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // register bruker om det ikke finnes feil
 if (count($errors) == 0) {
  	//$password = md5($password_1);//encrypt the password before saving in the database
    $salt = 'IT2_2019';
    $password = sha1($password_1.$salt);

  	$query = "INSERT INTO bruker (brukerNavn, ePost, passord)
  			  VALUES('$username', '$email', '$password')";
       mysqli_query($bd, $query);

	  $last_id = mysqli_insert_id($bd);

	  $sql = mysqli_query($bd, "INSERT INTO interesser (idbruker) VALUES ('$last_id')")
            or die(mysqli_error($bd));
    $_SESSION['idbruker'] = $last_id;
  	$_SESSION['username'] = $username;
    $_SESSION['last_time'] = time();
    $_SESSION['level'] = $row['level'];
  	$_SESSION['success'] = "You are now logged in";
  	header('location: ./NewHjem.php');
  }
}

// ...
// loggin bruker
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($bd, $_POST['username']);
  $password = mysqli_real_escape_string($bd, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  if (count($errors) == 0) {
  	//$password = md5($password);
    $date = date("Y-m-d H:i:s");
    $salt = 'IT2_2019';
    $password = sha1($password.$salt);
  	$query = "SELECT * FROM bruker WHERE (brukerNavn='$username' AND passord='$password'AND status = 1 ) AND (feilLogginnSiste < '$date' - INTERVAL 5 MINUTE OR feilLogginnSiste IS NULL)";
  	$results = mysqli_query($bd, $query);
  	if (mysqli_num_rows($results) == 1) {
      $qq = mysqli_query($bd,"UPDATE bruker SET feilLogginnnTeller = NULL, feilLogginnSiste = NULL, feilIP = NULL WHERE brukerNavn = '$username' ");
  	  $row = $results->fetch_assoc();
  	  $_SESSION['idbruker'] = $row['idbruker']; 
  	  $_SESSION['username'] = $username;
  	  $_SESSION['level'] = $row['level'];
      $_SESSION['last_time'] = time();
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: ./NewHjem.php');
  	} else {
          // Login feilet, søker etter brukernavn og feilLogginnteller.
          $q = ("SELECT * FROM bruker WHERE brukerNavn = '$username' ");
          $resultat = mysqli_query($bd,$q);
        //  $qqq = mysqli_query($bd,"UPDATE bruker SET feilLogginnnTeller = NULL, feilLogginnSiste = NULL, feilIP = NULL WHERE (brukerNavn = '$username') AND (feilLogginnnTeller >= 3)");
          $row = mysqli_fetch_assoc($resultat);

          $_SESSION['feilLogginnnTeller'] = $row['feilLogginnnTeller'];

          $rowCount = $resultat->num_rows;
         if ($rowCount == 1) {
            //Rad funnet, vi tar verden, legger til 1antall mislykket forsøk, og oppdaterer databasen
            $result = $row['feilLogginnnTeller'] + 1;
            $IPadress = $_SERVER['REMOTE_ADDR'];
            $user = $_POST['username'];
            $sql = mysqli_query($bd,"UPDATE bruker SET feilLogginnnTeller = '$result', feilIP = '$IPadress' WHERE brukerNavn = '$user' ");
            array_push($errors, "Innlogging mislykket!.");

            if ($result > 2){
              $date = date("Y-m-d H:i:s");
              // Teller har overstget 3 mislykkede forsøk - feilLogginnSiste oppdateres med tispunkt.
              $q = mysqli_query($bd,"UPDATE bruker SET feilLogginnSiste = '$date' WHERE brukerNavn = '$user' ");

              array_push($errors,"Din brukerkonto er utestengt i 5 minutter fra nå. ");
            }

          }

         }
 }
}

?>
