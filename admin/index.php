<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,700,400,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/trumbowyg.css">
	<meta charset="UTF-8">
	<title>Admin</title>
	
</head>
<body>
	
<?php 

	include_once 'scripts/connect.php';
	if (isLogged()) {
	echo '<div id="loading">Loading</div>
	<div id="right-panel">
		<div class="logo">
			CMS
		</div>	
		<ul id="menu">
			<li href="pages/pages.php">
			 	<a>Stránky</a>
			 	<ul>
				 	<li>
				 		<a href="pages/page-main.php" class="ajax" >Úvod</a>
				 	</li>
				 	<li>
				 		<a href="pages/page-about.php" class="ajax">O nás</a>
				 	</li>
				 	<li>
				 		<a href="pages/page-service-list.php" class="ajax">Služby</a>
				 	</li>
				 	<li>
				 		<a href="pages/page-reference-list.php" class="ajax">Reference</a>
				 	</li>
				 	<li>
				 		<a href="pages/page-contact.php" class="ajax">Kontakt</a>
				 	</li>
				 	<li>
						<a href="scripts/logout.php">Odhlásit se</a>		
				 	</li>
			 	</ul>
			</li>
		</ul>
	</div>
	<div id="content">';

	include 'pages/page-about.php';
	
	echo '</div>';

	}
	else {
		//header("Refresh:0; url=login.php");
		header ( "location:login.php" );	

	}

 ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/trumbowyg.js"></script>
	<script type="text/javascript" src="js/cs.min.js"></script>
	<script>
		$('#trumbowyg-demo').trumbowyg({
		    fullscreenable: false,
		    closable: true,
		    semantic: false,
		    removeformatPasted: true,
		    resetCss: false,
		    autogrow: true,
		    lang: 'cs',
		    btnsAdd: ['|', 'foreColor', 'backColor'],
		    btns: ['bold', 'italic', 'underline', 'formatting', '|','justifyLeft', 'justifyCenter', 'justifyRight','|', 'link', 'insertImage','|','viewHTML']
		});
		$("#btn").click(function(){
  		console.log('btn-clicked')

  		var vtitle = $("#title").val();
  		var vsubtitle = $("#subtitle").val();
  		var vcontent = $("#trumbowyg-demo").val();
  		alert(vtitle);
  
  		if(vtitle !='' && (vsubtitle !='' || vcontent !='')){
  		alert(vcontent);
  		//add condition based on data-id button atribute and send id to upload.php file
 		 $.post("../admin/scripts/update.php", //Required URL of the page on server
  		{ // Data Sending With Request To Server
  		"title2":vtitle,
  		"subtitle2":vsubtitle,        
  		"content2":vcontent,
  		},

  		function(response,status){ // Required Callback Function
  		alert("*----Received Data----*\n\nResponse : " + response+"\n\nStatus : " + status);//"response" receives - whatever written in echo of above PHP script.
  //$("#form")[0].reset();
  		});
  		}
  		else {alert("data emptyIIIII")};
  		});
	</script>
</body>
</html>