<!DOCTYPEhtml>
<html>
 <head>
  <meta charset="UTF-8">
  <title>Mebrahtu Personal website</title>
  <link rel="stylesheet" href="profile.css">
  <!-- <link rel="stylesheet" href="../style.css"> -->
  <style>
   form{
	position:absolute; top: 280px;  right: 200px;
   	width: 25%;
   	margin:0;
   }
   /*  form div{
	  width:10px;

   } */
   img{
   	position:absolute; right: 60px;
   	margin: 0;
   	width: 200px;
   	height: 200px;
   }

  #footer {position:absolute;
         padding: 20px;
         left:0 ;
		 bottom:-800px;
		 width:100%;
		 background-color:gray;
		 color:white;
		 text-align: center;
		 display:inline;}
  #hjem a{color:blue; text-decoration:none;
            }
  #hjem a:hover{color:red;
                 }
  #hjem p{font-size:18px;
          }
  #cvp{text-align:center;
       }
  #asidecv{
    position:relative;
    left:-450px;
	top:-600px;

    width: 12em;
	high:100%;
    border:1px solid #bbb;
	padding:65px 35px 700px 80px;

	<!-- background-color: #f2f3f4; -->
    }
  #asidecv h3 {position:absolute; bottom:330px; left:35px; color:white; font-size: 70%; margin:15px;
                padding:10px 10px; text-align: center;background-color: black; width: 16em;
		       }
  #asidecv img {
       border-radius: 50%;
         }
  #asidecv p a{border:none;font-size: 70%;
               color:black; text-align:left;
		       }
  #asidecv p a:hover{color:red;
                     }
  #asidecv p a{color:blue;
               }
  #main{position:relative;left:10%;top:150px; padding:50px 20px 0px 20px; width:45%; height:50%; box-sizing:border 1px #bbb;
     <!-- border:1px solid #bbb;    -->
      }
   #cv ul ul li{ list-style-type: none;
              position:relative;left:5em; margin:20px;
              }
   #cv ul li{list-style-type: none; margin:20px;
          }
   #DeEdit { position:absolute;
             right: 20px;
			 font-weight:700;
	         font-size:12px;
	         font-family: verdana,Arial,sans-serif;
			 color:black;
			 background:#cfcfc4; padding:10px 3px 3px 3px;
        }
	#DeEdit a {color:black; text-decoration:none;}
	#DeEdit a:hover {background:#738678 ; padding:10px 3px 3px 3px; margin:0px;
           }

 </style>
 </head>
  <body>
   <header id="header">
	  <div class="logo">
	   <img style="width:100%" alt="logo" src="uploads/logo2.jpg"</img>
	  </div>
	 <nav class= topnavigation id="navigation">
	  <ul>
		<li><a href="bruker.html">Hjem</a></li>
		<li><a href="MineProfil.html">Min Profil</a></li>
		<li><a href="">Valg 3</a></li>
		<li><a href="">Valg 4</a></li>
		 <a href="javascript:void(0);" class="icon" onclick="myFunction()">
         <i class="fa fa-bars"></i></a>
	  </ul>
	  <div class="BpOrd">
	    <p><a href="html/Byttpass.php">Bytt Passord</a></p>
	  </div>
	 </nav>
    <div class="container">
	 <p>
	    <a href="php/default.php">
		  <button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-log-out" ></span> Log ut</button>
        </a> </p>
	</div>
   </header>

   <article id="main">
	 <article id="cv">
	    <h3>Detalj</h3>
		<hr>
		<div id="DeEdit">
	        <p><a href="html/Byttpass.php">Redigere</a></p>
	    </div>



      <h3>Om Meg</h3>
		<hr>
		<div id="DeEdit">
	        <p><a href="html/Byttpass.php">Redigere</a></p>
	    </div>
		<ul>
		   <li>ingen biografi lagt ennå !</li>
		</ul>

	  <h3>Interesse</h3>
		<hr>
		<div id="DeEdit">
	        <p><a href="index.php">Redigere</a></p>
	    </div>
		<ul>
		   <li>
         <?php

        $chkbox = (isset($_POST['Interesser']) ? $_POST['Interesser'] : null);
        $i = 0;
        if(!empty($_POST['Interesser'])) {
          foreach($_POST['Interesser'] as $check) {
            echo $check . ' ';}


        $i++;
        }

        ?></li>
		</ul>
	 </article>

         <aside id="asidecv">
			  <?php
			    mysqli_select_db($bd, $mysql_database) or die("Could not select database");
			    $result = mysqli_query($bd, "SELECT * FROM member");
				while ($row = mysqli_fetch_array($result)) {
					echo "<img src='uploads/".$row['picture']."' >";
				 }
			  ?>
			  <form method="POST" action="home.php" enctype="multipart/form-data">
					<input type="file" name="file" size="15">
					<button type="submit" name="upload"  >POST</button>
			  </form>
		 </aside>

     </article>
  <footer id="footer">
      <p> <strong>Kontakt Oss</strong>: Sentralbord - 31 00 80 00 |
	    Beredskap - 31 00 89 00<strong><br>Copyright&copy 2018</strong> </p>
  </footer>


 </body>
</html>
