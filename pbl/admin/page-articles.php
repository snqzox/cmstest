<?php 

require('scripts/config.php'); 

$sql_article_attach1 = "SELECT attachments.id attId, attachments.title attTitle, attachments.article_id attArticle,articles.id artId,articles.title artTitle,articles.subservice_id artSubSer FROM articles LEFT JOIN attachments ON articles.id=attachments.article_id WHERE articles.subservice_id = 6" or die ("Unable to join tables!");
$sql_article_attach2 = "SELECT attachments.id attId, attachments.title attTitle, attachments.article_id attArticle,articles.id artId,articles.title artTitle,articles.subservice_id artSubSer FROM articles LEFT JOIN attachments ON articles.id=attachments.article_id WHERE articles.subservice_id = 7" or die ("Unable to join tables!");
$sql_article_attach3 = "SELECT attachments.id attId, attachments.title attTitle, attachments.article_id attArticle,articles.id artId,articles.title artTitle,articles.subservice_id artSubSer FROM articles LEFT JOIN attachments ON articles.id=attachments.article_id WHERE articles.subservice_id = 8" or die ("Unable to join tables!");

$result_article_attach1 = mysqli_query($resultdb,$sql_article_attach1) or die ("False connection result on JOIN!");
$result_article_attach2 = mysqli_query($resultdb,$sql_article_attach2) or die ("False connection result on JOIN!");
$result_article_attach3 = mysqli_query($resultdb,$sql_article_attach3) or die ("False connection result on JOIN!");

function getData($result){

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

$del = isset($_GET['del']) ? $_GET['del'] : 'undefined';

if ($del != 'undefined'){

	$sql_del = "DELETE FROM articles WHERE ID = '$del'";
	$result_del = mysqli_query($resultdb,$sql_del) or die ("Unable to delete!");
    header('Location: http://localhost/cmstest/pbl/admin/page-articles.php');
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
		<h2>Subservice 1</h2>
		<table>
			<tr>
				<th>Title</th>
				<th>Attachments</th>
				<th>Actions</th>
			</tr>
			<?php 	
			   getData($result_article_attach1);
			?>
		</table>
		<a class="button" id="btn" data-id="about" href="http://localhost/cmstest/pbl/admin/article-detail.php?id=6">Add new</a>
			</section>
			<section>
				<h2>Subservice 2</h2>
				<table>
					<tr>
						<th>Title</th>
						<th>Attachments</th>
						<th>Actions</th>
					</tr>
					<?php 	
					   getData($result_article_attach2);
					?>
         		</table>
				<a class="button" id="btn" data-id="about" href="http://localhost/cmstest/pbl/admin/article-detail.php?id=7">Add new</a>
			</section>
			<section>
				<h2>Subservice 3</h2>
				<table>
					<tr>
						<th>Title</th>
						<th>Attachments</th>
						<th>Actions</th>
					</tr>
					<?php 	
					   getData($result_article_attach3);
					?>
				</table>
				<a class="button" id="btn" data-id="about" href="http://localhost/cmstest/pbl/admin/article-detail.php?id=8">Add new</a>
			</section>
		</div>
</div>
</body>
</html>