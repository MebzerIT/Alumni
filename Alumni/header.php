<!-- Dette side er laget i felleskap -->
<?php
require_once('Ny_index.php');
include "connection.php";
//session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/Bruker.css">
</head>
<body>
<header id="header">
    <div class="logo">
         <a href="./NewHjem.php"><img class = "logoSize"  alt="logo" src="./Bilder/logo.png"</img></a>
    </div>
    <nav class= "topnavigation" role="navigation">
        <div id="menuToggle">
            <input type="checkbox"/>
            <span></span>
            <span></span>
            <span></span>
            <ul id="menu">
                <li><a href="NewHjem.php">Hjem</a></li>
                <li><a href="home.php">Min Profil</a></li>
                <li><a href="./alleBrukere.php">Personer</a></li>
                <li><a href="./inbox.php">Meldinger</a></li>
                <?php if($_SESSION['level']=='admin'){ ?>
                    <li><a href="admin_rules.php">Admin Regler</a></li>
                    <li><a href="admin.php">Admin bruker</a></li>
                <?php } ?>
            </ul>
        </div>
    </nav>
    <div class="container">
        <?php  if (isset($_SESSION['username'])) : ?>
            <p><a href="Ny_index.php?loggut='1'">
                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-log-out" ></span> Logg ut</button>
                </a></p>
        <?php endif ?>
</header>
