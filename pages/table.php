<script src="js/getDataTestForm.js"></script>

	<h1>TABLE Test</h1>


          <?php

          	include '../kkksss/45654465.php';

              
              $sql = ("SELECT * FROM pages");
              $result=mysqli_query($db,$sql);

              echo '<form method="post" id="form"><table>';
                             
              
               while($row = mysqli_fetch_array($result)){ 
              	$caption = $row['title'];	      
              	$id=$row['ID'];

                  echo '<tr><td class="label"><span>IDee:</span></td><td><input id="id" value="'.$id.'"name="id"/></td></tr>';
                  echo '<tr><td class="label"><span>Nazov:</span></td><td><input id="title" name="title" value="'.$caption.'"/></td></tr>'; 
                  echo '<tr><td class="label"><span>Popis:</span></td><td><div class="content">' . $row['content'] . '</div></td></tr>';             
                  echo '<tr><td class="label"><button id="">Edit</button></td></tr>';             
              	  
              }
               echo '</table></form>';
			?>

	
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
	</script>
