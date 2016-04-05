<div class="page-name">Stránka</div>
<h1>Služby</h1>
<p class="perex">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore.</p>

<table>
<tr>
	<th>Služba</th>
	<th>...</th>
</tr>
<?php
	$user = 'root';
    $pass = '';
 	$db = 'cms';
    $host = 'localhost';

   	$resultdb = new mysqli($host, $user, $pass, $db) or die("Unable to connect to database!");
	

          	$sql = "SELECT title,id FROM services" or die ("Unable to execute query!");
          	$result = mysqli_query($resultdb,$sql) or die ("False connection result!");

            while($row = mysqli_fetch_array($result)){ 
              	$title = $row['title'];	
              	$id = $row['id'];      
              
			//add id variable to href path
          	 echo      '<tr>
							<td>' . $title . ' id = ' . $id . '</td>
							<td><a href="pages/page-service-detail.php" class="ajax" id="btn">Upravit</a></td>
						</tr>';
	          		}	
				   mysqli_close($resultdb);

?>
</table>










