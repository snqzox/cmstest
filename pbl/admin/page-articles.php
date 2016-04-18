
<?php 
require_once('scripts/datahandler.php'); 

$del = isset($_GET['del']) ? $_GET['del'] : 'undefined';

if ($del != 'undefined'){

	data_handler("article","delete",$del);
}

function getSubService($id){

	$result = data_handler("service","select",$id);
	
	while($row = mysqli_fetch_array($result)){ 

	  	$title = $row['title'];	
	 	
  		echo $title;
	  	
	 }
}


function getDataTable($id){

	$result = data_handler("articles_sub","select",$id);

	
	while($row = mysqli_fetch_array($result)){ 

	  	$title = $row['title'];	
	  	$id = $row['ID'];      
	  	$subservice_id = $row['subservice_id'];  
/*		$title_attach = $row['attTitle'];
	   	$article_id = $row['attArticle'];  
*/		$result_attach = data_handler("attachments","select",$id);
	   	$attach_count = count($result_attach);

	  	echo '<tr>';
			       echo '<td>' . $title . ' subservice = ' . $subservice_id . '</td>
			       <td>';
			  
			   
			if ($attach_count > 0){

			 	while($row2 = mysqli_fetch_array($result_attach)){
				$article_id = $row2['article_id'];
				$path = $row2['whole_path'];
				if ($article_id==$id){
					
						$title_attach = $row2['title'];
				   	 echo   '<a href=" ' . $path . '" download>' . $title_attach . '</a><br>';
			       	}

			   	}
			}   
			  
		echo '</td>
				   <td><a href="http://localhost/cmstest/pbl/admin/article-edit.php?edit='. $id .'">Upravit</a>, <a href=http://localhost/cmstest/pbl/admin/page-articles.php?del='. $id .'>Odstranit</a></td>
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

	<h1>Články</h1>
	<section>
		<h2><?php  getSubService(6);?></h2>
		<table>
			<tr>
				<th>Title</th>
				<th>Attachments</th>
				<th>Actions</th>
			</tr>
			<?php 	
			   getDataTable(6);
			?>
		</table>
		<a class="button" id="btn" data-id="about" href="http://localhost/cmstest/pbl/admin/article-detail.php?id=6">Add new</a>
			</section>
			<section>
				<h2><?php  getSubService(7);?></h2>
				<table>
					<tr>
						<th>Title</th>
						<th>Attachments</th>
						<th>Actions</th>
					</tr>
					<?php 	
					   getDataTable(7);
					?>
         		</table>
				<a class="button" id="btn" data-id="about" href="http://localhost/cmstest/pbl/admin/article-detail.php?id=7">Add new</a>
			</section>
			<section>
				<h2><?php  getSubService(8);?></h2>
				<table>
					<tr>
						<th>Title</th>
						<th>Attachments</th>
						<th>Actions</th>
					</tr>
					<?php 	
					   getDataTable(8);
					?>
				</table>
				<a class="button" id="btn" data-id="about" href="http://localhost/cmstest/pbl/admin/article-detail.php?id=8">Add new</a>
			</section>
		</div>
</div>
</body>
</html>