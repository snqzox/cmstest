<?php 
require_once('admin/scripts/config.php'); 
require_once('scripts/references.php'); 

$res = connect();
$sqlStudio = "SELECT * from services WHERE ID = 9";
$resultStudio = mysqli_query($res,$sqlStudio) or die ("Unable to load page Studio!");

while ($row = mysqli_fetch_array($resultStudio)) {

	$titleStudio=$row['title'];
	$subtitleStudio=$row['subtitle'];
	$contentStudio=$row['content'];
}

?>


<?php include 'header.php'; ?>
<div class="content">
<div class="subpage pa">
	<div class="wrapper">
		<h1><?php echo $titleStudio; ?></h1>
		<p class="subtitle"><?php echo $subtitleStudio; ?></p>
		<?php echo $contentStudio; ?>			
	</div>
</div>
<div id="reference" class="subpage">
<div class="wrapper">
		<h1>Reference</h1>
		<p class="wysiwyg">
			<?php getReferences('studios'); ?>
		</p>
		</div>
</div>
</div>

<?php include 'footer.php'; ?>