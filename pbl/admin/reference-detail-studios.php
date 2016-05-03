<?php 
require_once('scripts/datahandler.php');
//require('scripts/config.php'); 
$add = isset($_GET['add']) ? $_GET['add'] : '';
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$delattach = isset($_GET['delattach']) ? $_GET['delattach'] : 'undefined';

 
$name="studios";

if (isset($_POST['submit'])){
	
	
	if ($add != ''){

	$action="create";

		data_handler($name,$action,'',''); 
	} 
	else {

		$action="update";
		data_handler($name,$action,'',''); 
	
	}
}
	else {
		if ($add != ''){

			$title='';
			$pd='';
			$client='';
			$costs='';
			$content='';

		
		} else {

			$action="select";
			$result_select = data_handler($name,$action,$id,''); 
			$checkedResult = checkResult($result_select);
						
			while($row = mysqli_fetch_array($checkedResult)){ 
	            
	            $id = $row['ID']; 
	            $title = $row['title']; 
	            $pd = $row['PD']; 
	            $client = $row['client']; 
				$costs = $row['costs']; 
				$content = $row['content']; 

            }
		}

if ($delattach != 'undefined'){		
	
   data_handler("attachments","delete",$delattach,'studio_id');
   

 }
}

function attachSizeError(){
	if (isset($_SESSION["error_message"])){

		echo '<br><span style="color:red">' . $_SESSION["error_message"] . '</span>';
		unset($_SESSION["error_message"]);
	}
}

function getAttach($article_id){


	require_once('scripts/datahandler.php');
	$result_attach = data_handler("attachments","select",$article_id,'studio_id');

	while($row = mysqli_fetch_array($result_attach)){ 

        $id = $row['ID'];   
        $name = $row['name']; 
        $path = $row['whole_path']; 
        $size = $row['size']; 
		$studio_id = $row['studio_id'];
		$title_attach = $row['title'];


        echo '<tr><td><input type="text" class="form-ctrl" name="id_attach[]" id="id_attach" value="'.$id.'" readonly></td>
        		<td><a href="'. $path .'" download>' . $name . '</a></td>
        	  	<td><img src="uploads/thumb/' . $name . '" height="42" width="42"></td><td>' . $size . '</td>
        	  	<td align="right"><a class="button small red" href="' . HOST . 'reference-detail-studios.php?delattach=' . $id . '">Smazat</a></td>
        	  </tr>';
          
    }


				

} 



?>



<!DOCTYPE html>
<html>
<?php include 'meta.php'; ?>
<body>	
<?php include 'navigation.php'; ?>
<div id="content">

	<h1>upravit/pridat referenciu k Projekční ateliér</h1>
	<div class="form-basic" id="form">

	<form method="POST" action="" enctype="multipart/form-data">
		<div class="form-group">
			<label>Titulek:</label>
			<input type="text" class="form-ctrl title" <?php echo 'value="'.$title.'"'; ?> name="title" id="title">
			<input type="hidden" name="id" <?php echo 'value="'.$id.'"'; ?> >
		</div>
		<div class="form-group">
			<label>Klient:</label>
			<input type="text" class="form-ctrl" name="client" <?php echo 'value="'.$client.'"'; ?> id="client">
		</div>
		<div class="form-group">
			<label>Náklady:</label>
			<input type="text" class="form-ctrl" name="costs" <?php echo 'value="'.$costs.'"'; ?> id="costs">
		</div>
		<div class="form-group">
			<label>PD:</label>
			<input type="text" class="form-ctrl" name="pd" <?php echo 'value="'.$pd.'"'; ?> id="pd">
		</div>
		<div class="form-group">
			<label>Obsah:</label>
			<input type="text" class="form-ctrl" name="content" <?php echo 'value="'.$content.'"'; ?> id="content">
		</div>
		<div class="form-group">
			<input type="file" name="files[]" id="fileToUpload" multiple=""/>		
		</div>
		<?php attachSizeError(); ?>
		<div class="form-group">
		<table>
			<?php	getAttach($id); ?>
		</table>
		</div>
		<button class="btn btn-submit" id="btn" data-id="about" name="submit" onclick='checkFileSize();'>Save</button>
	  </div>
	</form>

</div>
<script src="js/checkFileSize.js"></script>
</body>
</html>