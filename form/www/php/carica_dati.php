<?php 
		header('Access-Control-Allow-Origni: *');
			
			$d1=$_POST['d1'];
			$d2=$_POST['d2'];
			$d3=$_POST['d3'];
			$d4 = $_POST['d4'];
			$d5 = $_POST['d5'];
            $codice = $_POST['codice'];
			$data = $_POST['data'];
           /* 
			echo "<br>la data vale : ".$data;
            echo "<br>il codice vale : ".$codice;
            echo "<br>d1 vale : ".$d1;
            echo "<br>d2 vale : ".$d2;
            echo "<br>d3 vale : ".$d3;
            echo "<br>d4 vale : ".$d4;
            echo "<br>d5 vale : ".$d5;
            
			echo '<h5 align="center" >valori passati correttamente </h5>';
			*/
		
			//connessione al database
			
			
            $db=new mysqli("localhost","root","",'my_provapostcompleta');

            if($db->connect_error)
            {
              die("connssione fallita");
              echo "connessione fallita";
            }
            else
            {
            	echo "connessione al db riuscita";
            }
							
			//scrivo query per inserire i dati
			$cmdSQL= "INSERT INTO `Dati` (`data`, `paziente`, `domanda1`, `domanda2`, domanda3 , domanda4 , domanda5) VALUES ('".$data."', '".$codice."', '".$d1."', '".$d2."', '".$d3."', '".$d4."', '".$d5."')";
			
            if($db->real_query($cmdSQL)==true)
            {
              echo '<br><br> dati inseriti correttamente nel database';
              echo "<br><a href='home.html'> home </a>";
            }
            else {'non sono stati inseriti nel db';}


				
			mysqli_close($db);
					
					
			
?>