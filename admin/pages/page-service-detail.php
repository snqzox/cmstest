<div class="page-name">Stránka</div>
<h1>Upravit službu</h1>
<p class="perex">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore.</p>

<?php
	$user = 'root';
    $pass = '';
 	$db = 'cms';
    $host = 'localhost';

   	$resultdb = new mysqli($host, $user, $pass, $db) or die("Unable to connect to database!");
	
	//get ID from URL
	$service_id = 8;

	if (!is_null($_GET["id"])){
				$service_id = mysqli_real_escape_string($resultdb,$_GET["id"]);
			}

			echo $service_id;
	       	$sql = "SELECT * FROM services where ID = $service_id" or die ("Unable to execute query!");
          	$result = mysqli_query($resultdb,$sql) or die ("False connection result!");



            while($row = mysqli_fetch_array($result)){ 
              	$title = $row['title'];	      
              	$subtitle =$row['subtitle'];
              	$content =$row['content'];              	
            }

          	 echo '<div class="form-basic" id="form">
					<div class="form-group">
						<label>Titulek:</label>
						<input type="text" class="form-ctrl title" value="'.$title.'" name="id" id="title">
					</div>
					<div class="form-group">
						<label>Podtitulek:</label>
						<input type="text" class="form-ctrl subtitle" name="subtitle" value="'.$subtitle.'" id="subtitle">
					</div>
					<div class="form-group">
						<label>Obsah:</label>
						<textarea class="form-ctrl" id="trumbowyg-demo" rows="15">' . $content . '</textarea>
					</div>
					<button class="btn btn-submit" id="btn" service-id="'.$service_id.'" data-id="service">Uložit</button>
				   </div>';
				   mysqli_close($resultdb);

?>






