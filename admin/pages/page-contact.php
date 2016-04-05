<div class="page-name">Stránka</div>
<h1>Kontakt</h1>
<p class="perex">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore.</p>
<?php
	$user = 'root';
    $pass = '';
 	$db = 'cms';
    $host = 'localhost';

   //creating connection do db
   	$resultdb = new mysqli($host, $user, $pass, $db) or die("Unable to connect to database!");
	

          	$sql = "SELECT * FROM contact" or die ("Unable to execute query!");
          	$result = mysqli_query($resultdb,$sql) or die ("False connection result!");

            while($row = mysqli_fetch_array($result)){ 
              	$email = $row['email'];	      
              	$mobile =$row['mobile'];
              	$company =$row['company'];            	
              	$addres =$row['addres'];            	
              	$psc =$row['psc_city'];            	
              	$ic =$row['ic'];            	
              	$dic =$row['dic'];            	
            }

          	 echo '<div class="form-basic" id="form">
					<div class="form-group">
						<label>E-mail:</label>
						<input type="text" class="form-ctrl title" value="'.$email.'" name="id" id="email">
					</div>
					<div class="form-group">
						<label>Mobil:</label>
						<input type="text" class="form-ctrl subtitle" name="subtitle" value="'.$mobile.'" id="mobile">
					</div>
					<div class="form-group">
						<label>Název Splečnosti:</label>
						<input type="text" class="form-ctrl subtitle" name="subtitle" value="'.$company.'" id="company">
					</div>
					<div class="form-group">
						<label>Adresa:</label>
						<input type="text" class="form-ctrl subtitle" name="subtitle" value="'.$addres.'" id="addres">
					</div>
					<div class="form-group">
						<label>PSČ a Město::</label>
						<input type="text" class="form-ctrl subtitle" name="subtitle" value="'.$psc.'" id="psc">
					</div>
					<div class="form-group">
						<label>IČ:</label>
						<input type="text" class="form-ctrl subtitle" name="subtitle" value="'.$ic.'" id="ic">
					</div>
					<div class="form-group">
						<label>DIČ:</label>
						<input type="text" class="form-ctrl subtitle" name="subtitle" value="'.$dic.'" id="dic">
					</div>
					<button class="btn btn-submit" id="btn" data-id="contact">Uložit</button>
				   </div>';
				   mysqli_close($resultdb);
?>

















