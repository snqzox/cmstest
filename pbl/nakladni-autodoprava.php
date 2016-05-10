<?php 

require_once('admin/scripts/config.php'); 

	$res = connect();
	$sqlTransfer = "SELECT * from services WHERE ID = 10";
	$resultTransfer = mysqli_query($res,$sqlTransfer) or die ("Unable to load page Transfer!");

	while ($row = mysqli_fetch_array($resultTransfer)) {

		$titleTransfer=$row['title'];
		$subtitleTransfer=$row['subtitle'];
		$contentTransfer=$row['content'];
	}

?>

<?php include 'header.php'; ?>4
<div class="content">
<div class="subpage na">
	<div class="wrapper">
		<h1><?php echo $titleTransfer; ?></h1>
		<p class="subtitle"><?php echo $subtitleTransfer; ?></p>
		<?php echo $contentTransfer; ?>
	</div>
</div>
</div>
<?php include 'footer.php'; ?>