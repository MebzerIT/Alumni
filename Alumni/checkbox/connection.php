<?php

$mysql_hostname = "s120.hbv.no";
$mysql_user = "alumni10_adm@";
$mysql_password = "aLuMni_10_adM";
$mysql_database = "alumni10";
$prefix = "";

$mysql_hostname = "s120.hbv.no";
$mysql_user = "alumni10_adm@";
$mysql_password = "aLuMni_10_adM";
$mysql_database = "alumni10";
$prefix = "";

$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database) or die("Could not connect database");
mysqli_select_db($bd, $mysql_database) or die("Could not select database");
?>
