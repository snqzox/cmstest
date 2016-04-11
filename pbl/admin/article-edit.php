<?php 
require_once('scripts/datahandler.php');

$edit = isset($_GET['edit']) ? $_GET['edit'] : '';
$delattach = isset($_GET['delattach']) ? $_GET['delattach'] : 'undefined';




if (isset($_POST['submit'])){

	
	$name="article";
	$action="update";
	data_handler($name,$action,''); 

	echo '<br>SUBMIT IS SET';
	 unset($_POST['submit']);


}
	else {
		
		
		$name="article";
		$action="select";

		$result_select = data_handler($name,$action,$edit); 


		while($row = mysqli_fetch_array($result_select)){ 

            $id = $row['ID'];   
            $title = $row['title']; 
            $content = $row['content'];      
              
	    }
/*
	echo 'SUBMIT NOT SET<br>';
	echo 'DELET ATTACH' . $delattach;
	echo '<br>IDEEEE' . $edit;
	echo '<br>title' . $title;
	echo '<br>content' . $content;*/




if ($delattach != 'undefined'){		
	
   data_handler("attachments","delete",$delattach);
   

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
	$result_attach = data_handler("attachments","select",$article_id);

	while($row = mysqli_fetch_array($result_attach)){ 

        $id = $row['ID'];   
        $title = $row['title']; 
        $path = $row['whole_path']; 
        $size = $row['size']; 
		$article_id = $row['article_id'];



        echo '<tr><td>' . $id . '</td><td><a href="'. $path .'" download>' . $title . '</a></td>
        	  <td>' . $path . '</td><td>' . $size . '</td>
        	  <td><a href="http://localhost/cmstest/pbl/admin/article-edit.php?delattach=' . $id . '">Smazat</a></td>
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
	<form method="POST" action="" enctype="multipart/form-data">
		<div class="form-basic" id="form">
			<div class="form-group">
				<label>Titulek:</label>
				<input type="text" class="form-ctrl" <?php echo 'value="'.$title.'"'; ?> name="title" id="title">
				<input type="hidden" name="id" <?php echo 'value="'.$id.'"'; ?> >
			</div>
			<div class="form-group">
				<label>Obsah:</label>
				<input type="text" class="form-ctrl" <?php echo 'value="'.$content .'"'; ?> name="content" id="title">
			</div>
			<div class="form-group">
				<label>Attachment:</label>
				<table>
				<tr>
					<td>ID</td>
					<td>NAZEV</td>
					<td>CESTA</td>
					<td>VELKOST</td>
					<td>AKCE</td>
				</tr>
				<?php getAttach($edit); ?>
				</table>
				<input type="file" name="files[]" id="fileToUpload" multiple=""/>
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
</body>
</html>