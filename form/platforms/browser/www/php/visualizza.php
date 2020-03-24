<?php
			session_start();
			
            $codice=$_POST['email'];
			
            // nome di host
			$host = "localhost";
			// nome del database
			$db = "my_provapostcompleta";
			// username dell'utente in connessione
			$user = "root";
			// password dell'utente
			$password = "";
			
			
			try {
				  // stringa di connessione al DBMS
				  $connessione = new PDO("mysql:host=$host;dbname=$db", $user, $password);
				  // imposto dell'attributo necessario per ottenere il report degli errori
				  $connessione->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				  // selezione e visualizzazione dei dati estratti
				  
				  
				  
                  echo"
                  
                  		<table border='1'>
                        	<tr>
                            	<td>data</td>
                                <td>domanda 1</td>
                                <td>domanda 2</td>
                                <td>domanda 3</td>
                                <td>domanda 4</td>
                                <td>domanda 5</td>
                            </tr>
                  
                  
                  ";
                  
				  foreach ($connessione->query("SELECT * FROM `Paziente`,Dati WHERE id_paziente=paziente AND`paziente` LIKE '". $codice."'") as $row)
				  {
					
                     echo"
                  
                        	<tr>
                            	<td>". $row['data'] ."</td>
                                <td>". $row['domanda1'] ."</td>
                                <td>". $row['domanda2'] ."</td>
                                <td>". $row['domanda3'] ."</td>
                                <td>". $row['domanda4'] ."</td>
                                <td>". $row['domanda5'] ."</td>
                            </tr>
                  
                  ";
                 
                 }
				  // chiusura della connessione
                  echo "</table>";
				  $connessione = null;
				}
				catch(PDOException $e)
				{
				  // notifica in caso di errore nel tentativo di connessione
				  echo $e->getMessage();
				}
							
?>