<?php
		
		
			session_start();
				header('Access-Control-Allow-Origni: *');	
				$mail=$_POST['email'];
				$password=$_POST['password'];
				
				
				
				
				// nome di host
				$host = "localhost";
				// nome del database
				$db = "my_provapostcompleta";
				// username dell'utente in connessione
				$user = "root";
				// password dell'utente
				$password = "";
				
				//mi collego al database degli utenti
				try {
					
				  // stringa di connessione al DBMS
				  $connessione = new PDO("mysql:host=$host;dbname=$db", $user, $password);
				  // imposto dell'attributo necessario per ottenere il report degli errori
				  $connessione->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				  // selezione e visualizzazione dei dati estratti
				  
				 
				  //faccio una select degli utenti con la variabile $_POST['mail'] quindi dovrebbe essere solo uno
				  foreach ($connessione->query("SELECT * FROM Paziente WHERE email LIKE '". $mail."'") as $row)
				  {
					$controllopsw = $row['password']; 
					$_SESSION['nome']=$row['nome'];
					$_SESSION['cognome']=$row['cognome'];
					$_SESSION['genere']=$row['genere'];
                    $_SESSION['codice']=$row['id_paziente'];
                    
				  }
				  // chiusura della connessione
				  $connessione = null;
				}
				catch(PDOException $e)
				{
				  // notifica in caso di errore nel tentativo di connessione
				  echo $e->getMessage();
				}
				
				//controllo che la variabile $_POST['psw'] sia uguale psw nel mio database
				if($_POST['password'] != $controllopsw)
				{ 
					echo "credenziali errate riprovare";
				}
				else
                {
                
                  //se tutto รจ positivo allora posso impostare le mie variabili di sessione
                  $_SESSION['mail']=$_POST['mail'];
                  $_SESSION['psw']=$_POST['psw'];

                  //echo "login riuscito";
                  echo "<h2 align='center'>login effettuato ".$_SESSION['nome']."</h2>" ;
                  echo "il tuo codice per effettuare operazioni è ".$_SESSION['codice'];
                  echo "<div>Per accedere alla sua home premi <a href='home.html'>qui</a></div>";
			
                }
				
				
				
			
?>