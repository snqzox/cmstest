<?php 

	require_once('admin/scripts/config.php'); 
	require_once('scripts/articles.php');

	$res = connect();
	$sqlOPIK = "SELECT * from services WHERE ID = 7";
	$resultOPIK = mysqli_query($res,$sqlOPIK) or die ("Unable to load page OPIK!");

	while ($row = mysqli_fetch_array($resultOPIK)) {

		$titleOPIK=$row['title'];
		$subtitleOPIK=$row['subtitle'];
		$contentOPIK=$row['content'];
	}

?>



<?php include 'header.php'; ?>
<div class="content">
<div class="subpage granty">
	<div class="wrapper">
		<h1>
			<a href="granty-a-dotace.php">Granty a dotace</a>
			<span><?php echo $titleOPIK; ?></span>
		</h1>

		<div id="oppik">
			<p class="wysiwyg">
			<?php echo $contentOPIK; ?>
			</p>
		
		</div>	
		<div class="articles">
				<h2>Articles</h2>
					<?php getArticles(7);  ?>					
				<!-- <div class="article">
					<p class="article-content">Ut enim ad minim veniam,	quis nostrud exercitation ullamco laboris</p>
					<a class="file" href="#">
						<div class="icon"></div>
						<span>File name 1</span>
					</a>
					<a class="file" href="#">
						<div class="icon"></div>
						<span>Another file with long name</span>
					</a>
				</div>
				<div class="article">
					<p class="article-content">Ut enim ad minim veniam,	quis nostrud exercitation ullamco laboris</p>
					<a class="file" href="#">
						<div class="icon"></div>
						<span>File name 1</span>
					</a>
					<a class="file" href="#">
						<div class="icon"></div>
						<span>Another file with long name</span>
					</a>
				</div>
				<div class="article">
					<p class="article-content">Ut enim ad minim veniam,	quis nostrud exercitation ullamco laboris</p>
					<a class="file" href="#">
						<div class="icon"></div>
						<span>File name 1</span>
					</a>
					<a class="file" href="#">
						<div class="icon"></div>
						<span>Another file with long name</span>
					</a>
				</div> -->
			</div>
		
	</div>
</div>
</div>
<?php include 'footer.php'; ?>