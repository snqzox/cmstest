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
			<?php echo $contentOPZP; ?>
		<!-- <p>
			Operační program Životní prostředí 2014–2020 navazuje na Operační program Životní prostředí
			pro roky 2007–2013. Pro žadatele má v následujících letech přichystáno téměř 2,637 miliardy eur.
			Řídicím orgánem je Ministerstvo životního prostředí (MŽP), zprostředkujícími subjekty jsou Státní
			fond životního prostředí ČR (SFŽP ČR) pro všechny prioritní osy s výjimkou prioritní osy 4 a
			Agentura ochrany přírody a krajiny ČR (AOPK ČR) pro příjem a hodnocení žádostí v prioritní ose
			4.
			Oproti minulému programovému období došlo ke snížení počtu podporovaných aktivit v rámci tzv.
			prioritních os. V období 2014–2020 můžete získat podporu z OPŽP v některé z následujících
			oblastí:
		</p>
		<ol>		
			<li>1. Zlepšování kvality vod a snižování rizika povodní</li>

			<li>2. Zlepšování kvality ovzduší v lidských sídlech</li>

			<li>3. Odpady a materiálové toky, ekologické zátěže a rizika</li>

			<li>4. Ochrana a péče o přírodu a krajinu</li>

			<li>5. Energetické úspory</li>
		</ol>
		<p class="subtitle">Na co se zaměřujeme:</p>
		<h2>Sběrné dvory</h2>
		<p>
			Hlavnímí žadateli budou obce, právnické i fyzické subjekty.

			Pokud bude žádáno v rozsahu de minimis bude dotace 85% nákladů na tyto typy projektů. V tomto

			režimu se může čerpat 200 000 EUR na jednu právnickou osobu za 3 roky. Pokud existuje několik

			subjektů, kde je stejný společník s podílem 50% a více, platí čerpání pro všechny tyto subjekty

			dohromady.
		</p>

		<h4>
			Co je konkrétně dotováno:
		</h4>
			
		<ul>
			<li>• Kompletní stavba včetně projektu</li>

			<li>• Kontejnery a nádoby na odpad</li>

			<li>• Vážní, měřící a výpočetní systémy</li>

			<li>• Manipulační technika (nákladní vozy, nakladače atd.)</li>

			<li>• Technologie zpracování odpadu (jednoúčelové a víceúčelové lisy, drtící linky a
			separátory, třídící a dotříďovaní linky atd.)</li>

			<li>• Další komponenty</li>
		</ul>
		<h2>Kompostárny</h2>
		<p>
			Vzhledem k tomu, že za původce bioodpadu (veškerý biolologický rozložitelný odpad, který vzniká

			při údržbě zeleně např. tráva, větve apod.) je na základě legislativy (v budoucnosti bude zakázáno

			skládkování) EU považována obec, bude mít tato za povinnost zajistit jeho ekologickou likvidaci či

			zpracování.

			Pokud bude žádáno v rozsahu de minimis bude dotace 85% nákladů na tyto typy projektů. V tomto

			režimu se může čerpat 200 000 EUR na jednu právnickou osobu za 3 roky. Pokud existuje několik

			subjektů, kde je stejný společník s podílem 50% a více, platí čerpání pro všechny tyto subjekty

			dohromady.
		</p>
		<h4>
			Druhy kompostáren:
		</h4>
		<ul>
			<li>• komunitní kompostárna</li>

			<li>• malá zařízení</li>

			<li>• kompostárna</li>
		</ul>
		<h4>
			Co je konkrétně dotováno:
		</h4>
		<ul>
			<li>• Kompletní stavba včetně projektu</li>

			<li>• Manipulační technika (traktor, nakladač)</li>

			<li>• Technologie zpracování odpadu (kompostovaní stroj, štěpkovač, drtič, překopávač, třídící síto)</li>

			<li>• Vážní, měřící a výpočetní systémy</li>

			<li>• Domovní kompostéry</li>

		</ul>
		<h4>
			Základní všeobecné údaje:
			</h4>
		<p>
			<b>Odevzdání projektu:</b> dle harmonogramu</br>

			<b>Výše podpory: Mapa regionální podpory</b> je pro všechny regiony NUTS II identická kromě
			regionu hl. m. Prahy, ke které se regionální podpora nevztahuje. Celková regionální podpora se liší
			ve velikosti podnikatelského subjektu:
		</p>
			<ul>
			<li>malé podniky – 45 % podpory</li>
			<li>střední podniky – 35 % podpory</li>
			<li>velké podniky – 25 % podpory  </li>
			</ul>
			<p>
			Pro projekty v oblasti výzkumu a vývoje je veřejná podpora navýšena. Nařízení Evropské komise
			o blokové výjimce definuje míru podpory na jednotlivé oblasti v závislosti na velikosti podniku a
			odlišuje např. průmyslový výzkum (50 % způsobilých nákladů), experimentální vývoj (25 % - 45 %
			způsobilých nákladů), studie proveditelnosti (50 % způsobilých nákladů) či podporu výzkumné
			infrastruktury (50%).
			</p> -->

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