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
		<?php echo $contentGrants; ?>
		<!-- <p>
			<b>Co Vám v rámci naší práce zajistíme?</b><br/>
			 Zkontrolujme, aby byl Vaš projekt v souladu s cíli příslušného dotačního programu. Pokud nebude, zjistíme možnosti jiného čerpání. Pokud bude Váš projekt v souladu s výzvou, tak pro Vás zajistíme veškerou komunikaci s poskytovatelem dotace včetně podání projektu, které probíhá v systému MS2014+. Za podnikatele podáme tzv. Celkovou žádost o poskytnutí dotace, která v sobě kombinuje ekonomické ukazatele žadatele (např. finanční výkazy), podnikatelský záměr a další povinné i nepovinné přílohy. Velmi důležité pro podání žádosti je načasování práce na projektu. Kompletní žádost by měla být podána nejpozději do 2 týdnů od zahájení příjmu projektů, poté totiž může být výzva kvůli překročení dostupné finanční alokace předčasně uzavřena. Po skončení celého projektu či po ukončení jeho etapy za Vás podáme tzv. Žádost o platbu, která je nutná k vyplacení dotace, to probíhá ex post (zpětně). Na naši podporu se můžete spolehnout i v průbehu udržitelnosti projektu, která je min. 5let, kdy poskytovatel dotace sleduje stav projektu prostřednictvím tzv. Monitorovacích zpráv. Tyto zprávy pravidelně předkládáte v systému MS2014+.
		</p> -->
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

		<!-- <div class="ref gt">
			<div class="ref-icon"></div>
			<h3>Lorem ipsum dolor sit</h3>
			<p class="sub">
			Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			</p>
			<h4>Predmet dotace</h4>
			<p class="sub">Predmet dotace placeholder</p>
			<h4>Výše dotace</h4>
			<p class="sub">1.000.000 CZK</p>
			<h4>Klient</h4>
			<p class="sub">Janik Mrkva</p>
		</div><div class="ref gt">
			<div class="ref-icon"></div>
			<h3>Lorem ipsum dolor sit</h3>
			<p class="sub">
			Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			</p>
			<h4>Predmet dotace</h4>
			<p class="sub">Predmet dotace placeholder</p>
			<h4>Výše dotace</h4>
			<p class="sub">1.000.000 CZK</p>
			<h4>Klient</h4>
			<p class="sub">Janik Mrkva</p>
		</div><div class="ref gt">
			<div class="ref-icon"></div>
			<h3>Lorem ipsum dolor sit</h3>
			<p class="sub">
			Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			</p>
			<h4>Predmet dotace</h4>
			<p class="sub">Predmet dotace placeholder</p>
			<h4>Výše dotace</h4>
			<p class="sub">1.000.000 CZK</p>
			<h4>Klient</h4>
			<p class="sub">Janik Mrkva</p>-->
		</div> 
</div>
</div>
<?php include 'footer.php'; ?>