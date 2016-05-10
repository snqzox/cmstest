<?php 

		function getArticles($subservice_id){

		require_once('admin/scripts/config.php'); 

		$res = connect();
		$sqlArticles = "SELECT * from articles WHERE subservice_id = $subservice_id";
		
		$resultArticles = mysqli_query($res,$sqlArticles) or die ("Unable to load Articles!");

		while ($row = mysqli_fetch_array($resultArticles)) {
			$id = $row['ID'];
			$title=$row['title'];
			$content=$row['content'];
			
			echo '
				<div class="article">
					<p class="article-content">'. $content .'</p>
				 ';

     		getArtAttachments('article_id', $id);

			echo '</div>';
		}

		
	}

	function getArtAttachments($parentName, $parentId){
		
		require_once('admin/scripts/config.php'); 
		$res = connect();
		
		$sqlAttach = "SELECT * from attachments WHERE $parentName = $parentId";
		$resultAttach = mysqli_query($res,$sqlAttach) or die ("Unable to load attachmentes!");

		while ($row = mysqli_fetch_array($resultAttach)) {

			$name=$row['name'];
			$title=$row['title'];
			$path=$row['whole_path'];

			if ($title != ''){
				
				$attachName = $title;
			
			}
			  else {

				$attachName = $name;

			  }

			echo '
					<a class="file" href="admin/'. $path .'" download>
						<div class="icon"></div>
						<span>' . $attachName . '</span>
					</a>
				  ';

		}

	}
?>