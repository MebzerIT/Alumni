 <!-- Dette side er laget av Mebrahtu zerizghi og Najim Zaoughi -->
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="css/Bruker.css">
  <link rel="stylesheet" type="text/css" href="css/registrer.css">
</head>
<body onLoad="self.focus();document.form.username.focus()">

  <div class="header">
  	<h2>Logg inn</h2>
  </div>

  <form method="post" action="ny_login.php" name="form">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Bruker Navn</label>
  		<input type="text" name="username">
  	</div>
  	<div class="input-group">
  		<label>Passord</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Logg inn</button>
  	</div>
  	<p>
  		Ikke medlem? <a href="./registrer.php">Register</a>
  	</p>

  </form>
</body>
</html>
