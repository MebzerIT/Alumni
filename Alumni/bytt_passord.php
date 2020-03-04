<!-- Dette side er laget av Mebrahtu zerizghi og Najim zoaughi  -->
<?php  // tilkobling
 include ('connection.php');
 include('server.php');
 require('bytte.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="css/Bruker.css">
  <link rel="stylesheet" type="text/css" href="css/registrer.css">
</head>
<body onLoad="self.focus();document.form.username.focus()">

  <div class="header">
  	<h2>Bytt passord</h2>
  </div>
  <form action="bytt_passord.php" method="post" name="form"> 
  	<?php include('errors.php'); ?>
  	<div class="input-group">
      <label for="username"><b>Bruker Navn</b></label>
   	  <input type="text" placeholder="Ditt bruker navn" name="username" required>
  	</div>
  	<div class="input-group">
      <label for="password"><b>Gamle passord</b></label>
    	<input type="password" placeholder="Ditt gamle passord" name="password" required>
  	</div>
    <div class="input-group">
      <label for="newpassword"><b> Ny Passord</b></label>
      <input type="password" placeholder="Ditt ny passord" name="newpassword" required>
  	</div>
  	<div class="input-group">
      <label for="confirmnewpassword"><b>Gjenta Ny Passord</b></label>
      <input type="password" placeholder="Gjenta ditt ny passord" name="confirmnewpassword" required>
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="submit">Bytt passord</button>
  	</div>
    <p>
     <a href="default.php"> Tilbake til Logg inn!</a>
   </p>
  </form>
</body>
</html>
