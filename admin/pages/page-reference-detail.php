<div class="page-name">Stránka</div>
<h1>Detail reference</h1>
<p class="perex">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore.</p>



<?php
	$user = 'root';
    $pass = '';
 	$db = 'cms';
    $host = 'localhost';

   	$resultdb = new mysqli($host, $user, $pass, $db) or die("Unable to connect to database!");
	
	if (!is_null($_GET["id"])){
				$service_id = mysqli_real_escape_string($resultdb,$_GET["id"]);
			}

			echo $service_id;
	       	$sql = "SELECT * FROM refrences where ID = $service_id" or die ("Unable to execute query!");
          	$result = mysqli_query($resultdb,$sql) or die ("False connection result!");



            while($row = mysqli_fetch_array($result)){ 
              	$title = $row['title'];	      
              	$content =$row['content']; 
              	$service =$row['service'];              	

            }

          	 echo '<div class="form-basic" id="form">
					<div class="form-group">
						<label>Titulek:</label>
						<input type="text" class="form-ctrl title" value="'.$title.'" name="id" id="title">
					</div>
					<div class="form-group">
						<label>Obsah:</label>
						<textarea class="form-ctrl" id="trumbowyg-demo" rows="15">' . $content . '</textarea>
					</div>
					<div class="form-group">
						<label>Logo (obrázek):</label>
						<input type="file" name="fileToUpload" id="fileToUpload">
					</div>
					<div class="form-group">
						<label>Služby:</label>
						<input type="text" class="form-ctrl" name="subtitle" value="'.$service.'" id="service_ref">
					</div>
					<button class="btn btn-submit" id="btn" service-id="'.$service_id.'" data-id="refrence">Uložit</button>
				   </div>';
			mysqli_close($resultdb);

?>