<script src="js/getDataTestForm.js"></script>

	<h1>Form Test</h1>


          <?php
          	include '../scripts/connection.php';
              
              $sql = ("SELECT * FROM pages WHERE ID = '333'");
              $result=mysqli_query($db,$sql);

              echo '<form method="post" id="form"><table>';
                             
              
               while($row = mysqli_fetch_array($result)){ 
              	$caption = $row['title'];	      
              	$id=$row['ID'];
                  echo '<tr><td class="label"><span>ID:</span></td><td><input id="id" value="'.$id.'"name="id"/></td></tr>';
                  echo '<tr><td class="label"><span>Nazov:</span></td><td><input id="title" name="title" value="'.$caption.'"/></td></tr>'; 
                  echo '<tr><td class="label"><span>Popis:</span></td><td><textarea name="description" id="trumbowyg-demo" cols="30" rows="10" readonly>' . $row['content'] . '</textarea></td></tr>';             
              }
               echo '</table></form>';
               echo '<button id="btn">Send Data</button>';    
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
