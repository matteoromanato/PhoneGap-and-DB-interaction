<?php
		
				$nome=$_POST['nome'];
				$cognome=$_POST['cognome'];
				$mail=$_POST['email'];
				$password = $_POST['password'];
				$genere = $_POST['gender'];
				
				
				echo '<h5 align="center" >valori assegnati correttamente </h5>';
				echo '<br>';
				echo 'nome: ' . $nome . " <br>cognome: " . $cognome . " <br>e-mail: " . $mail . " <br>password: " . $password ;
				
				//connessione al database
				
				$db=new mysqli("localhost","root","",'my_provapostcompleta');
				
				if($db->connect_error)
				{
					die("connssione fallita");
					echo "connessione fallita";
				}
				
				//seleziono il databse
				//mysql_select_db('feedback',$db);
				
				//scrivo query per inserire i dati
				$cmdSQL= "INSERT INTO `Paziente` (`nome`, `cognome`, `genere`, `password`, email) VALUES ('".$nome."', '".$cognome."', '".$genere."', '".$password."', '".$mail."')";
				
				if($db->real_query($cmdSQL)==true)
				{
					echo '<br><br> dati inseriti correttamente nel database';
                    echo "<br><a href='index.html'> effettua il login</a>";
				}
				else {'non sono stati inseriti nel db';}
				
				
				
				mysqli_close($db);
					
				
?>