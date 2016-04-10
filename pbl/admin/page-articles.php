
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

	$result = data_handler("articles_attach","select",$id);
	
	while($row = mysqli_fetch_array($result)){ 

	  	$title = $row['artTitle'];	
	  	$id = $row['artId'];      
	  	$subservice_id = $row['artSubSer'];  
		$title_attach = $row['attTitle'];
	   	$article_id = $row['attArticle'];  

	  	echo '<tr>
			       <td>' . $title . ' subservice = ' . $subservice_id . '</td>
			       <td>';
			  
			   if ($article_id==$id){
				   	 echo   '<a href="#">' . $title_attach . '</a>';
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