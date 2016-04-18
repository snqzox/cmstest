<?php 


require_once('scripts/datahandler.php'); 

function getServices(){

	$result = data_handler("service","select",'');
	
	while($row = mysqli_fetch_array($result)){ 
		$id = $row['ID'];
	  	$title = $row['title'];
	  	$subservice = $row['subservice'];	

	 	if ($subservice){

	 		echo '<tr class="child">';
		}
	 	else {
	 
	 		echo '<tr class="parent">';
	 	}
	  	echo '	<td>'.$title.'</td>
				<td><a href="http://localhost/cmstest/pbl/admin/service-detail.php?edit='. $id .'">Upravit</a></td>
				</tr>';
	 }
}

if (isset($_POST['submit'])){

	require_once('scripts/datahandler.php');
	
	$name="page_services";
	$action="update";
	data_handler($name,$action,5); 

}
	else {
		
		require_once('scripts/datahandler.php');
		
		$name="page_services";
		$action="select";

		$result_select = data_handler($name,$action,5); 

		while($row = mysqli_fetch_array($result_select)){ 

            $id = $row['ID'];   
            $title = $row['title']; 
            //$subtitle = $row['subtitle']; 
              
	    }
	}

?>






<!DOCTYPE html>
<html>
<?php include 'meta.php'; ?>
<body>	
<?php include 'navigation.php'; ?>
<div id="content">

	<h1>Služby</h1>
	<form method="POST" action="">
	<div class="form-basic" id="form">
		<div class="form-group">
			<label>Titulek:</label>
			<input type="text" class="form-ctrl title" <?php echo 'value="'.$title.'"'; ?> name="title" id="title">
			<input type="hidden" name="id" <?php echo 'value="'.$id.'"'; ?> >
		</div>
		<div class="form-group">
			<label>Podtitulek:</label>
			<input type="text" class="form-ctrl subtitle" name="subtitle" <?php //echo 'value="'.$subtitle.'"'; ?> id="subtitle">
		</div>
		<button class="btn btn-submit" id="btn" data-id="about" name="submit">Save</button>
	</div>
	</form>
	<h2>Sluzby a podsluzby</h2>
	<table>
		<tr>
			<th>Název služby</th>
			<th>Akce</th>
		</tr>
		<?php getServices();  ?>
	</table>
</div>
</body>
</html>