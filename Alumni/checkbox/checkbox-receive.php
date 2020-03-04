<?php

 $chkbox = $_POST['Interesser'];
 $i = 0;
 While($i < sizeof($chkbox))
 {
 echo $chkbox[$i] . ' ';

 $i++;
 }

 ?>
