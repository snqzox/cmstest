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

			<?php getReferences('activities'); ?>
		<!-- <div class="ref rc">
			<div class="ref-icon"></div>
			<h3>Lorem ipsum dolor sit</h3>
			<p class="sub">
			Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			</p>
			<h4>Výše investice</h4>
			<p class="sub">1.000.000 CZK</p>
			<h4>Klient</h4>
			<p class="sub">Janik Mrkva</p>
		</div><div class="ref rc">
			<div class="ref-icon"></div>
			<h3>Lorem ipsum dolor sit</h3>
			<p class="sub">
			Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			</p>
			<h4>Výše investice</h4>
			<p class="sub">1.000.000 CZK</p>
			<h4>Klient</h4>
			<p class="sub">Janik Mrkva</p>
		</div><div class="ref rc">
			<div class="ref-icon"></div>
			<h3>Lorem ipsum dolor sit</h3>
			<p class="sub">
			Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			</p>
			<h4>Výše investice</h4>
			<p class="sub">1.000.000 CZK</p>
			<h4>Klient</h4>
			<p class="sub">Janik Mrkva</p>-->
		</div> 
</div>
</div>
<?php include 'footer.php'; ?>