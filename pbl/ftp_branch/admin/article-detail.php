<?php 
require_once('scripts/datahandler.php');

$edit = isset($_GET['edit']) ? $_GET['edit'] : '';
$add = isset($_GET['add']) ? $_GET['add'] : '';
$delattach = isset($_GET['delattach']) ? $_GET['delattach'] : 'undefined';

if (isset($_POST['submit'])){

	
	if ($add != ''){
	
		$_SESSION['saved'] = $datasaved;
		$name="article";
		$action="create";
		data_handler($name,$action,$add,'');
		exit();
	}
	else {

		$_SESSION['saved'] = $datasaved;
		$name="article";
		$action="update";
		data_handler($name,$action,'',''); //id sent in form
		data_handler('attachments','update',''); 
		exit();
	}

	unset($_POST['submit']);

}
	else {
		
		if ($add != ''){
			
			$id='';
			$title='';
			$content='';

		}

		else {

			$name="article";
			$action="select";
			$result_select = data_handler($name,$action,$edit,''); 

			while($row = mysqli_fetch_array($result_select)){ 

	            $id = $row['ID'];   
	            $title = $row['title']; 
	            $content = $row['content'];      
	              
		   	}
		}
		
		
if ($delattach != 'undefined'){		
	
   data_handler("attachments","delete",$delattach,'article_id');
   

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
	$result_attach = data_handler("attachments","select",$article_id,'article_id');

	$count = mysqli_num_rows($result_attach);

	if ($count>0){	

		echo '	<tr>
					<th align="left"></th>
					<th align="left">NAZEV</th>
					<th align="left">TITULEK</th>
					<th align="left">VELKOST</th>
					<th align="right">AKCE</th>
				</tr>' ;

	}


	while($row = mysqli_fetch_array($result_attach)){ 

        $id = $row['ID'];   
        $name = $row['name']; 
        $size = $row['size']; 
		$article_id = $row['article_id'];
		$title_attach = $row['title'];
		$size = round($size / 1000);

		$path =  'http://pblm.cz/Upload/'.$name;

        echo '<tr><td><input type="hidden" class="form-ctrl" name="id_attach[]" id="id_attach" value="'.$id.'" readonly></td>
        		<td><a href="'. $path .'"  download>' . $name . '</a></td>
        	  	<td><input type="text" class="form-ctrl" name="title_attach[]" id="title_attach" value="'.$title_attach.'"></td><td>' . $size . ' kB</td>
        	  	<td align="right"><a class="button small red" href="' . HOST . 'article-detail.php?delattach=' . $id . '">Smazat</a></td>
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

	<h1>Upravit/pridat clanok k podsluzbe 1,2 alebo 3?</h1>
	<?php
		if(!empty($_SESSION['saved'])) { echo $_SESSION['saved']; }
		$_SESSION['saved']='';
	 ?>
	<form method="POST" action="" enctype="multipart/form-data">
		<div class="form-basic">
			<div class="form-group">
				<label>Titulek:</label>
				<input type="text" class="form-ctrl" <?php echo 'value="'.$title.'"'; ?> name="title" id="title">
				<input type="hidden" name="id" <?php echo 'value="'.$id.'"'; ?> >
			</div>
			<div class="form-group">
				<label>Obsah:</label>
				<textarea class="form-ctrl" rows="5" name="content" id="content"><?php echo $content; ?></textarea>
			</div>
			<div class="form-group">
				<label>Attachment:</label>
				<input type="file" name="files[]" id="fileToUpload" multiple=""/>
				<table>
			<?php getAttach($edit); ?>
				</table>
			</div>
			<?php 

			attachSizeError();
/*session_start();
	if (isset($_SESSION["error_message"])){

		echo '<br>'.$_SESSION["error_message"];
	}
	session_destroy();*/
			  ?>
			<button class="btn btn-submit" id="btn" data-id="about" name="submit" >Save</button>
		  </div>
	  </form>

</div>
<script src="js/checkFileSize.js"></script>
</body>
</html>