<?php 
require_once('admin/scripts/config.php'); 
require_once('scripts/references.php'); 

$res = connect();
$sqlGrants = "SELECT * from services WHERE ID = 5 OR ID = 6 OR ID = 7 ORDER BY ID";
$resultGrants = mysqli_query($res,$sqlGrants) or die ("Unable to load page Grants!");
$g = 0;

while ($row = mysqli_fetch_array($resultGrants)) {

	$titleGrants[$g]=$row['title'];
	$subtitleGrants[$g]=$row['subtitle'];
	$contentGrants[$g]=$row['content'];
	$g++;
}

?>


<?php include 'header.php'; ?>
<div class="content">
<div class="subpage granty">
	<div class="wrapper">
		<h1><?php echo $titleGrants[0]; ?></h1>
		<p class="subtitle"><?php echo $subtitleGrants[0]; ?></p>
		<div class="wysiwyg">
		<p>
			<?php echo $contentGrants[0]; ?>
		</p>
		</div>
		<div class="ref-btns">
			<h3 class="dark">Lorem ipsum dolor sit</h3>
			<a href="granty-a-dotace-OPZP.php" class="btn ghost reference-granty">
				<div class="icon"></div>
				<span><?php echo $titleGrants[1]; ?></span>
			</a>
			<a href="granty-a-dotace-OPPIK.php" class="btn ghost reference-granty">
				<div class="icon"></div>
				<span><?php echo $titleGrants[2]; ?></span>
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