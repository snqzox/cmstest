<div class="page-name">Stránka</div>
<h1>Úvod</h1>
<p class="perex">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore.</p>

<!-- <form class="form-basic">
	<div class="form-group">
		<label>Titulek:</label>
		<input type="text" class="form-ctrl title">
	</div>
	<div class="form-group">
		<label>Podtitulek:</label>
		<input type="text" class="form-ctrl subtitle">
	</div>
	<button type="submit" class="btn btn-submit">Uložit</button>
</form>
 -->
 <?php
	$user = 'root';
    $pass = '';
 	$db = 'cms';
    $host = 'localhost';

   //creating connection do db
   	$resultdb = new mysqli($host, $user, $pass, $db) or die("Unable to connect to database!");
	

          	$sql = "SELECT * FROM main" or die ("Unable to execute query!");
          	$result = mysqli_query($resultdb,$sql) or die ("False connection result!");

            while($row = mysqli_fetch_array($result)){ 
              	$title = $row['title'];	      
              	$subtitle =$row['subtitle'];            	
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
					<button class="btn btn-submit" id="btn" data-id="main">Uložit</button>
				   </div>';
				   mysqli_close($resultdb);

?>
