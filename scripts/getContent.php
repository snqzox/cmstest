 <?php

        $user = 'root';
        $pass = '';
        $db = 'web';
        $host = 'localhost';
        $table = 'pages';

        //creating connection do db
        $db = new mysqli($host, $user, $pass, $db) or die("unable to connect");
			
       //TABULKA NA ZAJAZDY
        $sql = "SELECT * from pages";//kazdy zaznam ma field visibility
        $result = mysqli_query($db,$sql) or die("unable to get content");
		echo '<table">';

        while($row = mysqli_fetch_array($result)){ //if row['visibility']=$userrole 

        echo '<tr><td >' . $row['title'] .'</td></tr>';
        echo '<tr><td><p>' . $row['content'] .'</p></td></tr>';   
        }

        echo "</table>"; 

        echo '<a href="">Pridať zájazd</a>';  
?>