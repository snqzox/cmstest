<?php 
require_once('admin/scripts/config.php'); 
require_once('scripts/references.php'); 

$res = connect();
$sqlAct = "SELECT * from services WHERE ID = 8";
$resultAct = mysqli_query($res,$sqlAct) or die ("Unable to load page Act!");

while ($row = mysqli_fetch_array($resultAct)) {

	$titleAct=$row['title'];
	$subtitleAct=$row['subtitle'];
	$contentAct=$row['content'];
}

?>

<?php include 'header.php'; ?>
<div class="content">
<div class="subpage rc">
	<div class="wrapper">
		<h1><?php echo $titleAct; ?></h1>
		<p class="subtitle"><?php echo $subtitleAct; ?></p>
		<?php echo $contentAct; ?>
	</div>
</div>
<div id="reference" class="subpage">
<div class="wrapper">
		<h1>Reference</h1>
		<p class="wysiwyg">
			<?php getReferences('activities'); ?>
		</p>
		</div> 
</div>
</div>
<?php include 'footer.php'; ?>