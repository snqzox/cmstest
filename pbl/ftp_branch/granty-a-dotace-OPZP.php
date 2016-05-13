<?php 

	require_once('admin/scripts/config.php'); 
	require_once('scripts/articles.php');

	$res = connect();
	$sqlOPZP = "SELECT * from services WHERE ID = 6";
	$resultOPZP = mysqli_query($res,$sqlOPZP) or die ("Unable to load page OPZP!");

	while ($row = mysqli_fetch_array($resultOPZP)) {

		$titleOPZP=$row['title'];
		$subtitleOPZP=$row['subtitle'];
		$contentOPZP=$row['content'];
	}

?>

<?php include 'header.php'; ?>
<div class="content">
<div class="subpage granty">
	<div class="wrapper">

		<h1>
			<a href="granty-a-dotace.php">Granty a dotace</a>
			<span><?php echo $titleOPZP; ?></span>
		</h1>

		<div id="opzp">
			<p class="wysiwyg">
				<?php echo $contentOPZP; ?>
			</p>

			<div class="articles">
				<h2>Articles</h2>
				<?php getArticles(6); ?>
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
</div>
<?php include 'footer.php'; ?>