<!-- Dette side er laget av Mebrahtu zerizghi og Najim Zaoughi -->
<?php include('server.php')?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" href="css/Bruker.css">
  <link rel="stylesheet" type="text/css" href="css/registrer.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>

  <form method="post" action="registrer.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Bruker Navn</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Epost</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Passord</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Gjenta passord</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Allerede medlem? <a href="default.php">Logg inn</a>
  	</p>
  </form>
</body>
</html>
