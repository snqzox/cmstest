<?php 
			  $user = 'root';
              $pass = '';
              $db = 'web';
              $host = 'localhost';
              $table = 'pages';

              //creating connection do db
              $db = new mysqli($host, $user, $pass, $db) or die("unable to connect");
 ?>
