<?php 

require_once('scripts/datahandler.php'); 

function getRefsTable($table_name){

	$result = data_handler($table_name,'select','');

	
	while($row = mysqli_fetch_array($result)){ 

	  	$id = $row['ID'];	
	  	$title = $row['title'];	
	  
	   	echo '<tr>
	   		  <td>' . $title . ' </td>	  
			  <td><a href="http://localhost/cmstest/pbl/admin/reference-detail-'.$table_name.'.php?edit='. $id .'">Upravit</a>, <a href=http://localhost/cmstest/pbl/admin/page-articles.php?del='. $id .'>Odstranit</a></td>
	         </tr>';
		 }
	}



if (isset($_POST['submit'])){

	require_once('scripts/datahandler.php');
	
	$name="page_references";
	$action="update";
	data_handler($name,$action,5); 

}
	else {
		
		require_once('scripts/datahandler.php');
		
		$name="page_references";
		$action="select";

		$result_select = data_handler($name,$action,5); 

		while($row = mysqli_fetch_array($result_select)){ 

            $title = $row['title']; 
            $subtitle = $row['subtitle']; 
              
	    }
	}

?>


<!DOCTYPE html>
<html>
<?php include 'meta.php'; ?>
<body>	
<?php include 'navigation.php'; ?>
<div id="content">

	<h1>Reference</h1>
	<form method="POST" action="">
	<div class="form-basic" id="form">
		<div class="form-group">
			<label>Titulek:</label>
			<input type="text" class="form-ctrl title" <?php echo 'value="'.$title.'"'; ?> name="title" id="title">
		</div>
		<div class="form-group">
			<label>Podtitulek:</label>
			<input type="text" class="form-ctrl subtitle" name="subtitle" <?php echo 'value="'.$subtitle.'"'; ?> id="subtitle">
		</div>
		<button class="btn btn-submit" id="btn" data-id="about" name="submit">Save</button>
	  </div>
	  </form>
	  <section>
		<h2>Dotace</h2>
		<table>
			<tr>
				<th>Title</th>
				<th>Actions</th>
			</tr>
			<?php  getRefsTable('subsidies'); ?>
		</table>
		<a class="button" id="btn" data-id="about" href="http://localhost/cmstest/pbl/admin/reference-detail-subsidies.php?add=true">Add new</a>
	</section>
	<section>
		<h2>Reference k Projekčnímu ateliéru</h2>
		<table>
			<tr>
				<th>Title</th>
				<th>Actions</th>
			</tr>
			<?php  getRefsTable('studios'); ?>
		</table>
		<a class="button" id="btn" data-id="about" href="http://localhost/cmstest/pbl/admin/reference-detail-studios.php">Add new</a>
	</section>
	<section>
		<h2>Reference k Realitní činnosti</h2>
		<table>
			<tr>
				<th>Title</th>
				<th>Actions</th>
			</tr>
			<?php  getRefsTable('activities'); ?>
		</table>
		<a class="button" id="btn" data-id="about" href="http://localhost/cmstest/pbl/admin/reference-detail-activities.php">Add new</a>
	</section>
	<section>
		<h2>Štandardní reference</h2>
		<table>
			<tr>
				<th>Title</th>
				<th>Actions</th>
			</tr>
			<?php  getRefsTable('defaultrefs'); ?>
		</table>
		<a class="button" id="btn" data-id="about" href="http://localhost/cmstest/pbl/admin/reference-detail-defaultrefs.php">Add new</a>
	</section>

</div>
</body>
</html>