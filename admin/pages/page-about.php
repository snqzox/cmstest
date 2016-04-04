<div class="page-name">Stránka</div>
<h1>O nás</h1>
<p class="perex">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore.</p>
<!-- <form class="form-basic" method="post" id="form">
	<div class="form-group">
		<label>Titulek:</label>
		<input type="text" class="form-ctrl title" value="'.$title.'" name="id">
	</div>
	<div class="form-group">
		<label>Podtitulek:</label>
		<input type="text" class="form-ctrl subtitle" name="subtitle" value="'.$caption.'">
	</div>
	<div class="form-group">
		<label>Obsah:</label>
		<textarea class="form-ctrl" id="trumbowyg-demo" rows="15">' . $row['content'] . '</textarea>
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
	

          	$sql = "SELECT * FROM about" or die ("Unable to execute query!");
          	$result = mysqli_query($resultdb,$sql) or die ("False connection result!");

            while($row = mysqli_fetch_array($result)){ 
              	$title = $row['title'];	      
              	$subtitle =$row['subtitle'];
              	$content =$row['content'];              	
            }

          	 echo '<form class="form-basic" method="post" id="form">
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
					<button class="btn btn-submit" id="btn" data-id="about">Uložit</button>
				   </form>';
				   mysqli_close($resultdb);

?>
