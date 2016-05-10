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

			<?php getReferences('studios'); ?>
		<!-- <div class="ref pa">
			<div class="ref-icon"></div>
			<h3>Lorem ipsum dolor sit</h3>
			<p class="sub">
			Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			</p>
			<h4>Stupeň PD</h4>
			<p class="sub">????</p>
			<h4>Realizační náklady</h4>
			<p class="sub">1.000.000 CZK</p>
			<h4>Klient</h4>
			<p class="sub">Janik Mrkva</p>
			<div class="photos-wrapper">
				<div class="photo-thumb"><a data-lightbox="id1" href="images/sample_a.jpg"><img src="images/sample_a_thumb.jpg" alt="Image"></a></div>
			    <div class="photo-thumb"><a data-lightbox="id1" href="images/sample_b.jpg"><img src="images/sample_b_thumb.jpg" alt="Image"></a></div>
			    <div class="photo-thumb"><a data-lightbox="id1" href="images/sample_c.jpg"><img src="images/sample_c_thumb.jpg" alt="Image"></a></div>
			</div>
		</div><div class="ref pa">
			<div class="ref-icon"></div>
			<h3>Lorem ipsum dolor sit</h3>
			<p class="sub">
			Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			</p>
			<h4>Stupeň PD</h4>
			<p class="sub">????</p>
			<h4>Realizační náklady</h4>
			<p class="sub">1.000.000 CZK</p>
			<h4>Klient</h4>
			<p class="sub">Janik Mrkva</p>
			<div class="photos-wrapper">
			    <div class="photo-thumb"><a data-lightbox="id2" href="images/sample_d.jpg"><img src="images/sample_d_thumb.jpg" alt="Image"></a></div>
			</div>
		</div><div class="ref pa">
			<div class="ref-icon"></div>
			<h3>Lorem ipsum dolor sit</h3>
			<p class="sub">
			Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			</p>
			<h4>Stupeň PD</h4>
			<p class="sub">????</p>
			<h4>Realizační náklady</h4>
			<p class="sub">1.000.000 CZK</p>
			<h4>Klient</h4>
			<p class="sub">Janik Mrkva</p>
			<div class="photos-wrapper">
			    <div class="photo-thumb"><a data-lightbox="id1" href="images/sample_c.jpg"><img src="images/sample_c_thumb.jpg" alt="Image"></a></div>
			    <div class="photo-thumb"><a data-lightbox="id1" href="images/sample_d.jpg"><img src="images/sample_d_thumb.jpg" alt="Image"></a></div>
			</div> -->
		</div>
</div>
</div>

<?php include 'footer.php'; ?>