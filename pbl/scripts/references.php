<?php

function getReferences($tableName){

	require_once('admin/scripts/config.php'); 

	$res = connect();
	$sql = "SELECT * from $tableName ORDER BY uploadtime";
	$result = mysqli_query($res,$sql) or die ("Unable to load references!");

	while ($row = mysqli_fetch_array($result)) {

		$title=$row['title'];
		$content=$row['content'];
		$client=$row['client'];			

		switch ($tableName) {
			
			case 'activities':
				
				$investition=$row['investition'];
				echo '
						<div class="ref rc">
						<div class="ref-icon"></div>
						<h3>'. $title .'</h3>
						<p class="sub">
						'. $content .'
						</p>
						<h4>Výše investice</h4>
						<p class="sub">'. $investition .'</p>
						<h4>Klient</h4>
						<p class="sub">'. $client .'</p>
						</div>
					';
				break;
			
			case 'studios':
				$costs=$row['costs'];
				$PD=$row['PD'];
				echo '
						<div class="ref pa">
							<div class="ref-icon"></div>
							<h3>'. $title .'</h3>
							<p class="sub">
							'. $content .'
							</p>
							<h4>Stupeň PD</h4>
							<p class="sub">'. $PD .'</p>
							<h4>Realizační náklady</h4>
							<p class="sub">'. $costs .'</p>
							<h4>Klient</h4>
							<p class="sub">'. $client .'</p>
							<div class="photos-wrapper">
								<div class="photo-thumb"><a data-lightbox="id1" href="images/sample_a.jpg"><img src="images/sample_a_thumb.jpg" alt="Image"></a></div>
							    <div class="photo-thumb"><a data-lightbox="id1" href="images/sample_b.jpg"><img src="images/sample_b_thumb.jpg" alt="Image"></a></div>
							    <div class="photo-thumb"><a data-lightbox="id1" href="images/sample_c.jpg"><img src="images/sample_c_thumb.jpg" alt="Image"></a></div>
							</div>
						</div>
					';
				break;

			case 'subsidies':
				$subject=$row['subject'];
				$price=$row['price'];
				echo '
						<div class="ref gt">
							<div class="ref-icon"></div>
							<h3>'. $title .'</h3>
							<p class="sub">
							'. $content .'
							</p>
							<h4>Predmet dotace</h4>
							<p class="sub">'. $subject .'</p>
							<h4>Výše dotace</h4>
							<p class="sub">'. $price .'</p>
							<h4>Klient</h4>
							<p class="sub">'. $client .'</p>
						</div>
				';
				break;
			
			default:
				
				break;
		}



	}


}





?>