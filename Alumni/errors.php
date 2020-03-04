<!-- Dette side er laget av Mebrahtu zerizghi   -->
 <?php  if (count($errors) > 0) : ?> <!--teller og viser error og ved innloging ,registrering eller bytt_passord -->
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
