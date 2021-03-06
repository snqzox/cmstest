<?php 
require_once('scripts/datahandler.php');
$del = isset($_GET['del']) ? $_GET['del'] : 'undefined';

if ($del != 'undefined'){

	data_handler("article","delete",$del,'');
}

function getSubService($id){

	$result = data_handler("service","select",$id,'');
	$checkedResult = checkResult($result);
	
	while($row = mysqli_fetch_array($checkedResult)){ 

	  	$title = $row['title'];	
	 	
  		echo $title;
	  	
	 }
}


function getDataTable($id){
require_once('scripts/datahandler.php'); 

	$result = data_handler("articles_sub","select",$id,'');
	$checkedResult = checkResult($result);

	while($row = mysqli_fetch_array($checkedResult)){ 

	  	$title = $row['title'];	
	  	$id = $row['ID'];      
	  	$subservice_id = $row['subservice_id'];  
/*		$title_attach = $row['attTitle'];
	   	$article_id = $row['attArticle'];  
*/		$result_attach = data_handler("attachments","select",$id,'article_id');
	   	$attach_count = count($result_attach);

	  	echo '<tr>';
			       echo '<td style="font-weight:700;">' . $title . '</td>
			       <td>';
			  
			   
			if ($attach_count > 0){

			 	while($row2 = mysqli_fetch_array($result_attach)){
				$article_id = $row2['article_id'];
				$path = $row2['whole_path'];
				if ($article_id==$id){
					
						$title_attach = $row2['title'];
				   	 echo   '<a href=" ' . $path . '" download>' . $title_attach . '</a>, ';


			       	}


			   	}
			}   
			  
		echo '</td>
				   <td align="right"><a class="button small blue" href="' . HOST . 'article-detail.php?edit='. $id .'">Upravit</a> <a class="button small red" href=' . HOST . 'page-articles.php?del='. $id .'>Odstranit</a></td>
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
	<p class="perex">
	Zoznam všetkých článkov pridaných k jednotlivách podlužbám. Články je možné mazať, upravovať ich obsah a prídávať nové.
	</p>
	<section>
		<table>
		<tr class="no-hover">
			<td colspan="3">
				<h2><?php  getSubService(6);?></h2>
			</td>
		</tr>
		<?php 	
		   getDataTable(6);
		?>	
		<tr class="no-hover">
			<td colspan="3">
			<a class="button" id="btn" data-id="about" href=<?php echo '" ' . HOST . 'article-detail.php?add=6"'?>>Přidat nový</a>
			</td>
		</tr>


		<tr class="no-hover">
			<td colspan="3">
				<h2><?php  getSubService(7);?></h2>
			</td>
		</tr>
		<?php 	
		   getDataTable(7);
		?>	
		<tr class="no-hover">
			<td colspan="3">
			<a class="button" id="btn" data-id="about" href=<?php echo '" ' . HOST . 'article-detail.php?add=7"'?>>Přidat nový</a>
			</td>
		</tr>

<!-- 
		<tr class="no-hover">
			<td colspan="3">
				<h2><?php  getSubService(8);?></h2>
			</td>
		</tr>
		<?php 	
			   getDataTable(8);
			?>		
		<tr class="no-hover">
			<td colspan="3">
			<a class="button" id="btn" data-id="about" href=<?php echo '" ' . HOST . 'article-detail.php?add=8"'?>>Přidat nový</a>
			</td>
		</tr> -->
	</table>

	</section>

</div>
</body>
</html>