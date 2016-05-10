<?php 

require_once('scripts/datahandler.php'); 

function getRefsTable($table_name){

	$result = data_handler($table_name,'select','','');
	$checkedResult = checkResult($result);
	
	while($row = mysqli_fetch_array($checkedResult)){ 

	  	$id = $row['ID'];	
	  	$title = $row['title'];	
	  	$client = $row['client'];	
	  
	   	echo '<tr>
	   		  <td>' . $title . ' </td>	 
	   		   <td>' . $client . ' </td>	   
			  <td align="right"><a class="button small blue" href="' . HOST . 'reference-detail-'.$table_name.'.php?edit='. $id .'">Upravit</a> <a class="button small red" href=' . HOST . 'page-references.php?del'.$table_name.'='. $id .'>Odstranit</a></td>
	         </tr>';
		 }
	}


$delsubsidies = isset($_GET['delsubsidies']) ? $_GET['delsubsidies'] : 'undefined';
$delstudios = isset($_GET['delstudios']) ? $_GET['delstudios'] : 'undefined';
$delactivities = isset($_GET['delactivities']) ? $_GET['delactivities'] : 'undefined';
$deldefaultrefs = isset($_GET['deldefaultrefs']) ? $_GET['deldefaultrefs'] : 'undefined';

if ($delsubsidies != 'undefined'){

	$result = data_handler("subsidies","delete",$delsubsidies,'');
	unset($_GET['delsubsidies']);

} else if ($delstudios != 'undefined'){

	$result = data_handler("studios","delete",$delstudios,'');
	unset($_GET['delstudios']);

}else if ($delactivities != 'undefined'){

	$result = data_handler("activities","delete",$delactivities,'');
	unset($_GET['delactivities']);

} else if ($deldefaultrefs != 'defaultrefs'){

	$result = data_handler("defaultrefs","delete",$deldefaultrefs,'');
	unset($_GET['defaultrefs']);

}

if (isset($_POST['submit'])){

	require_once('scripts/datahandler.php');
	
	$name="page_references";
	$action="update";
	$resultSubmit = data_handler($name,$action,5,''); 

}
	else {
		
		require_once('scripts/datahandler.php');
		
		$name="page_references";
		$action="select";

		$result_select = data_handler($name,$action,5,''); 
		$checkedResult = checkResult($result_select);

		while($row = mysqli_fetch_array($checkedResult)){ 

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
	<p class="perex">
	Zoznam pridaných referencií k jednotlivým službám. Referencie je možné mazať, upravovať ich obsah a prídávať nové.
	</p>
	<form method="POST" action="">
		<div class="form-basic">
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
	<table>
		<tr class="no-hover">
			<td colspan="3">
				<h2>Granty a dotace</h2>
			</td>
		</tr>
		<?php  getRefsTable('subsidies'); ?>		
		<tr class="no-hover">
			<td colspan="3">
			<a class="button" id="btn" data-id="about" href=<?php echo '" ' . HOST . 'reference-detail-subsidies.php?add=true"'?>>Add new</a>
			</td>
		</tr>


		<tr class="no-hover">
			<td colspan="3">
				<h2>Projekční ateliér</h2>
			</td>
		</tr>
		<?php  getRefsTable('studios'); ?>		
		<tr class="no-hover">
			<td colspan="3">
			<a class="button" id="btn" data-id="about" href=<?php echo '" ' . HOST . 'reference-detail-studios.php?add=true"'?>>Add new</a>
			</td>
		</tr>


		<tr class="no-hover">
			<td colspan="3">
				<h2>Realitní činnost</h2>
			</td>
		</tr>
		<?php  getRefsTable('activities'); ?>		
		<tr class="no-hover">
			<td colspan="3">
			<a class="button" id="btn" data-id="about" href=<?php echo '" ' . HOST . 'reference-detail-activities.php?add=true"'?>>Add new</a>
			</td>
		</tr>
	</table>
	</section>

<!-- 	<section>
		<h2>Štandardní reference</h2>
		<table>
			<?php  getRefsTable('defaultrefs'); ?>
		</table>
		<a class="button" id="btn" data-id="about" href="http://pbl.imakeui.com/admin/reference-detail-defaultrefs.php?add=true">Add new</a>
	</section> -->

</div>
</body>
</html>