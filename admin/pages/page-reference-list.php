<div class="page-name">Stránka</div>
<h1>Reference</h1>
<p class="perex">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore.</p>
<a class="button ajax" href="pages/page-reference-detail.php">Nová reference</a>
<table>
<tr>
	<th>Reference</th>
	<th>...</th>
</tr>
<?php
	$user = 'root';
    $pass = '';
 	$db = 'cms';
    $host = 'localhost';

   	$resultdb = new mysqli($host, $user, $pass, $db) or die("Unable to connect to database!");
	

   	$id = isset($_GET['id']) ? $_GET['id'] : '';

	if ($id != ''){
				$service_id = mysqli_real_escape_string($resultdb,$_GET["id"]);
				echo $service_id;
				$sql = "DELETE refrences where ID = $service_id" or die ("Unable to execute query!");
          		$result = mysqli_query($resultdb,$sql) or die ("False connection result!");
            
			}
	else {
		      	/*$title = '' ;	      
              	$content =''; 
              	$service ='';              	
              	$service_id='';*/
         $sql = "SELECT title,id FROM refrences" or die ("Unable to execute query!");
          	$result = mysqli_query($resultdb,$sql) or die ("False connection resulat!");

            while($row = mysqli_fetch_array($result)){ 
              	$title = $row['title'];	
              	$id = $row['id'];  
		 echo      '<tr>
							<td>' . $title . ' id = ' . $id . '</td>
							<td><a href="pages/page-reference-detail.php?id=' . $id . '" class="ajax" id="btn">Upravit</a>-
							<a href="scripts/delete.php?id=' . $id . '"  class="ajax" id="btn" data-id="deleteRef">Smazat</a></td>
						</tr>';
	          		}	
					
	}
       	    
              
			//add id variable to href path
          		   mysqli_close($resultdb);

?>
</table>