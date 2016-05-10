<?php 
require_once('admin/scripts/config.php'); 
require_once('scripts/references.php'); 

$res = connect();
$sqlGrants = "SELECT * from services WHERE ID = 5";
$resultGrants = mysqli_query($res,$sqlGrants) or die ("Unable to load page Grants!");

while ($row = mysqli_fetch_array($resultGrants)) {

	$titleGrants=$row['title'];
	$subtitleGrants=$row['subtitle'];
	$contentGrants=$row['content'];
}

?>


<?php include 'header.php'; ?>
<div class="content">
<div class="subpage granty">
	<div class="wrapper">
		<h1><?php echo $titleGrants; ?></h1>
		<p class="subtitle"><?php echo $subtitleGrants; ?></p>
		<p class="wysiwyg">
			<?php echo $contentGrants; ?>
		</p>
		<div class="ref-btns">
			<h3 class="dark">Lorem ipsum dolor sit</h3>
			<a href="granty-a-dotace-OPZP.php" class="btn ghost reference-granty">
				<div class="icon"></div>
				<span>Operační program životního prostředí - OPŽP</span>
			</a>
			<a href="granty-a-dotace-OPPIK.php" class="btn ghost reference-granty">
				<div class="icon"></div>
				<span>Operační program podnikání a inovace pro konkurenceschopnost - OPPIK</span>
			</a>
		</div>
		
	</div>
</div>
<div id="reference" class="subpage">
<div class="wrapper">
		<h1>Reference</h1>
			<?php getReferences('subsidies'); ?>
		</div> 
</div>
</div>
<?php include 'footer.php'; ?>