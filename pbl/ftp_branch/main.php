<?php 
	require_once('admin/scripts/config.php'); 

	$res = connect();
	$sqlPA = "SELECT * from pageAbout";
	$resultPA = mysqli_query($res,$sqlPA) or die ("Unable to load page about!");

	while ($row = mysqli_fetch_array($resultPA)) {
		$titlePA=$row['title'];
		$subtitlePA=$row['subtitle'];
		$contentPA=$row['content'];

	}

	$sqlMain = "SELECT * from pageMain";
	$resultMain = mysqli_query($res,$sqlMain) or die ("Unable to load page about!");

	while ($row = mysqli_fetch_array($resultMain)) {
	
		$titleMain=$row['title'];
		$subtitleMain=$row['subtitle'];

	}


	$sqlPageService = "SELECT * from pageServices";
	$resultPageService = mysqli_query($res,$sqlPageService) or die ("Unable to load page about!");

	while ($row = mysqli_fetch_array($resultPageService)) {
	
		$titleService=$row['title'];
		$subtitleService=$row['subtitle'];

	}


	$sqlPageReferences = "SELECT * from pageReferences";
	$resultPageReferences = mysqli_query($res,$sqlPageReferences) or die ("Unable to load page about!");

	while ($row = mysqli_fetch_array($resultPageReferences)) {
	
		$titleReference=$row['title'];
		$subtitleReference=$row['subtitle'];

	}



	$sqlSR = "SELECT * FROM services WHERE subservice = 0";
	$resultSR = mysqli_query($res,$sqlSR) or die ("Unable to load service data!");
	$i=0;
	while ($row = mysqli_fetch_array($resultSR)) {
		
		$titleSR[$i]=$row['title'];
		$subtitleSR[$i]=$row['subtitle'];
		$i++;
	
	}

	$sqlCon = "SELECT * from contact";
	$resultCon = mysqli_query($res,$sqlCon) or die ("Unable to load page contact!");

	while ($row = mysqli_fetch_array($resultCon)) {
		
		$email=$row['email'];
		$mobile=$row['mobile'];
		$company=$row['company'];
		$address=$row['address'];
		$pscCity=$row['psc_city'];
		$ic=$row['ic'];
		$dic=$row['dic'];

	}


function getReferences(){

	require_once('admin/scripts/config.php'); 

	$res = connect();
	
	$sqlRef =  "SELECT ID,title,type, content,uploadtime FROM activities
				UNION
				SELECT ID,title,type, content,uploadtime FROM subsidies
				UNION
				SELECT ID,title,type, content,uploadtime FROM studios
				ORDER BY uploadtime DESC LIMIT 6";
				
	$resultRef = mysqli_query($res,$sqlRef) or die ("Unable to load reference data!");
	
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
		<div class="title"><?php echo $titleMain; ?></div>
		<p class="perex"><?php echo $subtitleMain; ?></p>
		<div class="scroll-icon"></div>
	</div>
	<div class="bg-mask">
	</div>
</div>
<div class="page" id="o-nas">
	<div class="wrapper">
		<h1><?php echo $titlePA; ?></h1>
		<p class="subtitle"><?php echo $subtitlePA; ?></p>
		<div class="wysiwyg small">
		<p>
			<?php echo $contentPA ?>
		</p>
		<div class="logo-bw"></div>
		</div>
	</div>
</div>
<div class="page" id="sluzby">
	<div class="wrapper">
		<h1><?php echo $titleService; ?></h1>
		<p class="subtitle"><?php echo $subtitleService; ?></p>
		<div class="service granty animate from-left">
			<div class="service-wrapper">
				<a href="granty-a-dotace.php">
				<div class="icon">
				</div>
				</a>
				<div class="service-content">
					<h2><?php echo $titleSR[0] ;?></h2>
					<p><?php echo $subtitleSR[0]; ?></p>
				</div>
			</div>
		</div>
		<div class="service reality animate from-right">
			<div class="service-wrapper">
				<a href="realitni-cinnost.php">
				<div class="icon">
				</div>
				</a>
				<div class="service-content">
					<h2><?php echo $titleSR[1]; ?></h2>
					<p><?php echo $subtitleSR[1]; ?></p>
				</div>
			</div>
		</div>
		<div class="service atelier animate from-left">
				<div class="service-wrapper">
				<a href="projekcni-atelier.php">
				<div class="icon">
				</div>
				</a>
				<div class="service-content">
					<h2><?php echo $titleSR[2];?></h2>
					<p><?php echo $subtitleSR[2]; ?></p>
				</div>
			</div>
		</div>
		<div class="service doprava animate from-right">
			<div class="service-wrapper">
				<a href="nakladni-autodoprava.php">
				<div class="icon">
				</div>
				</a>
				<div class="service-content">
					<h2><?php echo $titleSR[3];?></h2>
					<p><?php echo $subtitleSR[3];?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page" id="reference">
	<div class="wrapper">
		<h1><?php echo $titleReference; ?></h1>
		<p class="subtitle"><?php echo $subtitleReference; ?></p>
		<?php getReferences(); ?>
		<hr/>
		<div class="ref-btns">
			<h3 class="dark">Prohlédněte si všechny reference podle jednotlivých kategorií</h3>
			<a href="granty-a-dotace.php#reference" class="btn ghost reference-granty">
				<div class="icon"></div>
				<span><?php echo $titleSR[0]; ?></span>
			</a>
			<a href="realitni-cinnost.php#reference" class="btn ghost reference-reality">
				<div class="icon"></div>
				<span><?php echo $titleSR[1]; ?></span>
			</a>
			<a href="projekcni-atelier.php#reference" class="btn ghost reference-atelier">
				<div class="icon"></div>
				<span><?php echo $titleSR[2]; ?></span>
			</a>
		</div>
	</div>

</div>
<div class="page" id="kontakt">
	<div class="wrapper">
		<h1>Kontakt</h1>
		<hr/>
		<div class="box three">
			<div class="icon logo-contact"></div>
			<p>
				<b><?php echo $company;?></b></br>
				<?php echo $address;?></br>
				<?php echo $pscCity;?></br></br>

				IČ: <?php echo $ic;?></br>
				DIČ: <?php echo $dic;?></br>
			</p>
		</div><div class="box three">
			<div class="icon phone"></div>
			<p>
				<b><?php echo $mobile;?></b>
			</p>
			<div class="icon mail"></div>
			<p>
				<b><?php echo $email;?></b>
			</p>		
		</div><div class="box three gf">
			<a href="mailto:<?php echo $email;?>"><div class="btn green big">Napište nám</div></a>
			<div class="social-icons">
				<div class="icon facebook"></div>
				<div class="icon linkedin"></div>
				<div class="icon twitter"></div>
			</div>
		</div>

		</p>

	</div>
</div>