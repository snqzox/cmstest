<?php 
		require_once('admin/scripts/config.php'); 

		$res = connect();
		$sqlPA = "SELECT * from pageAbout";
		$resultPA = mysqli_query($res,$sqlPA) or die ("Unable to LOAD data!");

		while ($row = mysqli_fetch_array($resultPA)) {
			$titlePA=$row['title'];
			$subtitlePA=$row['subtitle'];
			$contentPA=$row['content'];

		}

		$sqlSR = "SELECT * FROM services WHERE subservice = 0";
		$resultSR = mysqli_query($res,$sqlSR) or die ("Unable to LOAD data!");
		$i=0;
		while ($row = mysqli_fetch_array($resultSR)) {
			$titleSR[$i]=$row['title'];
			$subtitleSR[$i]=$row['subtitle'];
			$i++;
		}

function getReferences(){

		require_once('admin/scripts/config.php'); 
		$res = connect();

		
		$sqlRef =  "SELECT ID,title,type, content FROM activities
					UNION
					SELECT ID,title,type, content FROM subsidies
					UNION
					SELECT ID,title,type, content FROM studios
					ORDER BY ID DESC";

					
		$resultRef = mysqli_query($res,$sqlRef) or die ("Unable to LOAD data!");
		
		$j=0;
		while ($row = mysqli_fetch_array($resultRef)) {
			
				$titleRef=$row['title'];
				$contentRef=$row['content'];
				$typeRef=$row['type'];

				

			    if ( $typeRef == 'activities' ){

			    	$class='ref rc';
			    }
			    	else if ($typeRef == 'subsidies'){

			    			$class ='ref gt';
			    	} 
				    	else {
				    	
				    			$class = 'ref pa';
				    	}

				  echo '<div class="'.$class.'">
			      <div class="ref-icon"></div>
				  <h3>'. $titleRef . '</h3>
				  <p class="sub">
				  '. $contentRef . '</p>
				  </div>';
				$j++;
				
				if ($j==6) {
					break;
				}
		 }

}

?>
<div class="page" id="uvod">
	<div class="wrapper">
		<div class="title">Lorem ipsum dolor sit amet, consectetur</div>
		<p class="perex">Labore et dolore magna aliqua. Ut enim ad minim veniam,	quis nostrud exercitation</p>
		<div class="scroll-icon"></div>
	</div>
	<div class="bg-mask">
	</div>
</div>
<div class="page" id="o-nas">
	<div class="wrapper">
		<h1><?php echo $titlePA ?></h1>
		<p class="subtitle"><?php echo $subtitlePA ?></p>
		<p><?php echo $contentPA ?>
		</p>

	</div>
</div>
<div class="page" id="sluzby">
	<div class="wrapper">
		<h1>Námi nabízené služby</h1>
		<p class="subtitle">Podívejte se, co umíme</p>
		<div class="service granty animate from-left">
			<div class="service-wrapper">
				<div class="icon">
				</div>
				<div class="service-content">
					<h2><?php echo $titleSR[0] ?></h2>
					<p><?php echo $subtitleSR[0] ?></p>
				</div>
			</div>
		</div>
		<div class="service reality animate from-right">
			<div class="service-wrapper">
				<div class="icon">
				</div>
				<div class="service-content">
					<h2><?php echo $titleSR[1] ?></h2>
					<p><?php echo $subtitleSR[1] ?></p>
				</div>
			</div>
		</div>
		<div class="service atelier animate from-left">
				<div class="service-wrapper">
				<div class="icon">
				</div>
				<div class="service-content">
					<h2><?php echo $titleSR[2] ?></h2>
					<p><?php echo $subtitleSR[2] ?></p>
				</div>
			</div>
		</div>
		<div class="service doprava animate from-right">
			<div class="service-wrapper">
				<div class="icon">
				</div>
				<div class="service-content">
					<h2><?php echo $titleSR[3]?></h2>
					<p><?php echo $subtitleSR[3]?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page" id="reference">
	<div class="wrapper">
		<h1>Reference</h1>
		<p class="subtitle">O naší dosavadní práci vypovídají referenční zakázky, kterým se v současnosti věnujeme nebo které jsme v minulosti realizovali.</p>
		<?php getReferences(); ?>
		<hr/>
		<div class="ref-btns">
			<h3 class="dark">Lorem ipsum dolor sit</h3>
			<a href="granty-a-dotace.php#reference" class="btn ghost reference-granty">
				<div class="icon"></div>
				<span>Granty a Dotace</span>
			</a>
			<div class="btn ghost reference-reality">
				<div class="icon"></div>
				<span>Realitní činnost</span>
			</div>
			<div class="btn ghost reference-atelier">
				<div class="icon"></div>
				<span>Projekční ateliér</span>
			</div>
			</div>
	</div>

</div>
<div class="page" id="kontakt">
	<div class="wrapper">
		<h1>Kontakt</h1>
		<p class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
		<hr/>
		<div class="box three">
			<div class="icon logo-contact"></div>
			<p>
				<b>PBL Migliori Futuro s.r.o.</b></br>
				V Jámě 1/699</br>
				110 00 Praha 1 - Staré Město</br></br>

				IČ: 037 13 148</br>
				DIČ: CZ037 13 148</br>
			</p>
		</div><div class="box three">
			<div class="icon phone"></div>
			<p>
				<b>+420 724 444 999</b>
			</p>
			<div class="icon mail"></div>
			<p>
				<b>info@pblm.cz</b>
			</p>		
		</div><div class="box three gf">
			<div class="btn green big">Napište nám</div>
			<div class="social-icons">
				<div class="icon facebook"></div>
				<div class="icon linkedin"></div>
				<div class="icon twitter"></div>
			</div>
		</div>

		</p>

	</div>
</div>