<!DOCTYPE html>
<html lang="en">

<style>
#container {
   width: 350px;
   height: 200px;
   position: absolute;
   top: 10%;
   left: 50%;
   margin: -100px 0 0 -175px;
}
</style>
	<head>
	  <meta charset="utf-8">
	  <meta name = "viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name = "description" content="">
	  <meta name = "author" content="">
	  <!-- Bootstrap Core CSS -->
	  <link href = "vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	  <!-- Custom Fonts -->
	  <link href = "vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type = "text/css">
	  <link href = "https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type = "text/css">
	  <link href = "vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
	  <!-- Custom CSS -->
	  <link href = "css/stylish-portfolio.min.css" rel="stylesheet">
	  <!--Map -->
	  <link rel="stylesheet" href = "https://openlayers.org/en/v4.6.5/css/ol.css" type = "text/css">
	  <link rel="stylesheet" type = "text/css" href = "leaflet/leaflet.css" />
	  <script type = "text/javascript" src="leaflet/leaflet.js"></script>
	  <script src="https://openlayers.org/en/v4.6.5/build/ol.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.4.3/proj4.js"></script>
	  <script src="http://epsg.io/3003.js"></script>
	  <script src="http://epsg.io/4326.js"></script>

	  <!-- Font Awesome -->
  	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  	  <!-- Bootstrap core CSS -->
  	  <link href="MDBFree/css/bootstrap.min.css" rel="stylesheet">
  	  <!-- Material Design Bootstrap -->
  	  <link href="MDBFree/css/mdb.min.css" rel="stylesheet">
  	  <!-- Your custom styles (optional) -->
  	  <link href="MDBFree/css/style.css" rel="stylesheet">


      <script type="text/javascript" src="MDBFree/js/jquery-3.3.1.min.js"></script>
      <!-- Bootstrap tooltips -->
      <script type="text/javascript" src="MDBFree/js/popper.min.js"></script>
      <!-- Bootstrap core JavaScript -->
      <script type="text/javascript" src="MDBFree/js/bootstrap.min.js"></script>
      <!-- MDB core JavaScript -->
      <script type="text/javascript" src="MDBFree/js/mdb.min.js"></script>

      <script type="text/javascript" src="MDBFree/js/bootstrap.js"></script>

      <script type="text/javascript" src="MDBFree/js/mdb.js"></script>

	</head>
	
	<body>
		<title>Urbanistica</title>
	    <center>

		<?php
		require_once('./connect.php');
		if ($_GET) {
		 	if (isset($_GET['err'])) {
		?>
	
	  		<!-- Segnalazione di un errore nei dati di accesso -->
	  		<div style = "width: 100%; padding-top: 80px; padding-bottom: 25px;">
	    		<h1 style = "color: black;">Errore nei dati di accesso</h1>
	  		</div>
			<header class = "masthead d-flex"
	    		<h3 class = "mb-5" style = "font-size: 35px; width: 100%;">

	    		<div class= 'container'>
	    			<div class='col'>
	    				<a href = "./login.php">
	    					<button type="button" class="btn btn-cyan">Login</button>
	    				</a>

	    				<a href = "./login.php?reg=true">
	    					<button type="button" class="btn btn-cyan">Registrazione</button>
	    				</a>
	    				
	    			</div>
				</div> 	
				</h3>
			</header>
		</center>

		<?php
		  	}
		  	else if (isset($_GET['check'])) {
		    	if (isset($_GET['reg'])) {
		    		if ($_GET['reg'] == true) {
			        		// Verificare dati per inserimento database
				        if ($_POST['name'] == "") {
					        // Il nome è un campo obbligatorio
					        header("location: ./login.php?reg=true");
				        }
				        if ($_POST['surname'] == "") {
				        	// Il cognome è un campo obbligatorio
				        	header("location: ./login.php?reg=true");
				        }
				        if (strlen($_POST['cf']) < 16) {
				        	// Il codice fiscale deve essere di 16 caratteri
				        	header("location: ./login.php?reg=true");
				        }
				        else {
				        	$query = pg_query("SELECT COUNT(*) AS numero FROM utente WHERE cf = '".$_POST['cf']."';");
				        	$dati = pg_fetch_array($query, 0);
				  			if ($dati['numero'] != 0) {
				            	header("location: ./login.php?reg=true");
				          	}
				        }
				        if ($_POST['mail'] == "") {
				        	// Il cognome è un campo obbligatorio
				        	header("location: ./login.php?reg=true");
				        }
				        if ((strlen($_POST['psw1']) < 8) || ($_POST['psw1'] != $_POST['psw2'])) {
				        	// L'username è un campo obbligatorio
				        	header("location: ./login.php?reg=true");
				        }
				        if (strlen($_POST['user']) < 8) {
				        	// L'username è un campo obbligatorio
				        	header("location: ./login.php?reg=true");
				        }
				        else {
					        // L'username deve essere univoco
					        $query = pg_query("SELECT COUNT(*) AS numero FROM utente WHERE username = '".$_POST['user']."';");
					        $dati = pg_fetch_array($query, 0);
					  		if ($dati['numero'] != 0) {
					        	header("location: ./login.php?reg=true");
					        }
					        else {
					        	// Inserisco il nuovo utente nel database
					            $query = pg_query("INSERT INTO utente (cf, nome, cognome, username, password, mail) VALUES ('".$_POST['cf']."', '".$_POST['name']."', '".$_POST['surname']."', '".$_POST['user']."', '".$_POST['psw1']."', '".$_POST['mail']."');");
					        	header("location: ./login.php?reg=2");
					        }
				        }
		        	}
		  		}
		   		if ($_GET['login'] == true) {
		      		// Verificare dati per login
		      		// Controllo utente
				    $query = pg_query("SELECT COUNT(*) AS numero FROM utente WHERE username = '".$_POST['user']."' AND password = '".$_POST['psw']."';");
				    $dati = pg_fetch_array($query, 0);
				    if ($dati['numero'] == 1) {
				    	header("location: ./signal.php");
				    }
				    else {
					    $query = pg_query("SELECT COUNT(*) AS numero FROM amministratore WHERE username = '".$_POST['user']."' AND password = '".$_POST['psw']."';");
					    $dati = pg_fetch_array($query, 0);
					    if ($dati['numero'] == 1) {
					    	header("location: ./signal.php?sig=true");
					    }
					    else {
					        // Non ho trovato nè un utente nè un amministratore
					        header("location: ./login.php?err=0");
					    }
				    }
				}
		    }
			else {
				if ($_GET['reg'] != 2) {
		?>

		<!-- Registrazione utente -->
		<center>
			<div class="light-font">
		    	<nav aria-label="breadcrumb">
    				<ol class="breadcrumb default-color">
      				<li class="breadcrumb-item active">
      					<h5 class="mr-3 mb-0"><strong>Urbanistica</strong></h5>
      				</li>
   					 </ol>
  				</nav>
		  	</div>
			<div id='container'>
				<div class='col'>

			<header class = "masthead d-flex">
	    		
					<form class="text-center border border-light p-5" action = "login.php?check=1&reg=true" method = "POST">
						<p class="h4 mb-4">Registrazione</p>
				    	<table>
				    		<tr>
					        	<td style = "padding: 10px;">Nome:</td>
					            <td style = "padding: 10px;"><input id = "name" type = "text" name = "name" placeholder = "Nome"/></td>
					        </tr>
						    <tr>
						        <td style = "padding: 10px;">Cognome:</td>
						        <td style = "padding: 10px;"><input id = "surname" type = "text" name = "surname" placeholder = "Cognome"/></td>
						    </tr>
						    <tr>
						        <td style = "padding: 10px;">Codice fiscale:</td>
						        <td style = "padding: 10px;"><input id = "cf" type = "text" name = "cf" maxlength = "16" placeholder = "16 caratteri"/></td>
						    </tr>
						    <tr>
						        <td style = "padding: 10px;">Indirizzo e-mail:</td>
						        <td style = "padding: 10px;"><input id = "cf" type = "text" name = "mail" placeholder = "Indirizzo e-mail"/></td>
						    </tr>
						    <tr>
						        <td style = "padding: 10px;">Username:</td>
						        <td style = "padding: 10px;"><input id = "user" type = "text" name = "user" placeholder = "Almeno 8 caratteri"/></td>
						    </tr>
						    <tr>
						        <td style = "padding: 10px;">Password:</td>
						        <td style = "padding: 10px;"><input id = "psw" type = "password" name = "psw1" placeholder = "Almeno 8 caratteri"/></td>
						    </tr>
						    <tr>
						        <td style = "padding: 10px;">Ripeti password:</td>
						        <td style = "padding: 10px;"><input id = "psw" type = "password" name = "psw2" placeholder = "Almeno 8 caratteri"/></td>
						    </tr>
						    <tr>
						        <td style = "padding: 10px;" colspan = "2" ><center><input class = "btn btn-cyan btn-xl js-scroll-trigger" type = "submit" value = "Invia"/></center></td>
						    </tr>
				    	</table>
				  	</form>
				
			</header>
			</div>
		</div>
		</center>

		<?php
				}
		  		else {
		?>


		<script>
			alert("Registrazione avvenuta con successo");
		</script>


		<center>
			
			<div class="light-font">
		    	<nav aria-label="breadcrumb">
    				<ol class="breadcrumb default-color">
      				<li class="breadcrumb-item active">
      					<h5 class="mr-3 mb-0"><strong>Urbanistica</strong></h5>
      				</li>
   					 </ol>
  				</nav>
		  	</div>

		  	<div id='container'>
				

			<header class = "masthead d-flex">

		    	<h3 class = "mb-5" style = "font-size: 25px; width: 100%;">

		    		<form  class="text-center border border-light p-5" action = "login.php?check=1&login=true" method = "POST">
			            <p class="h4 mb-4">Login</p>
			            <table>
			              	<tr>
			      				<td style = "padding: 10px;">Username:</td>
			                    <td style = "padding: 10px;"><input id = "user" type = "text" name = "user"/></td>
			              	</tr>
			              	<tr>
			      				<td style = "padding: 10px;">Password:</td>
			                    <td style = "padding: 10px;"><input id = "psw" type = "password" name = "psw"/></td>
			              	</tr>
			              	<tr>
			      				<td style = "padding: 10px;" colspan = "2"><center><input class = "btn btn-cyan btn-xl js-scroll-trigger" type = "submit" value = "Invia" /></center></td>
			              	</tr>
			              	<tr>
			      				<td style = "padding: 10px;" colspan = "2"><center><a href = "./login.php?reg=true">Registrati</a></center></td>
			            	</tr>
			            </table>
		    		</form>
		    	</h3>
		  	</header>
			</div>
		</div>
		</center>

		<?php
		  		}
			}
		}
		else {
		?>

		<center>
			
			<div class="light-font">
		    	<nav aria-label="breadcrumb">
    				<ol class="breadcrumb default-color">
      				<li class="breadcrumb-item active">
      					<h5 class="mr-3 mb-0"><strong>Urbanistica</strong></h5>
      				</li>
   					 </ol>
  				</nav>
		  	</div>

		  	<div id='container'>
				

			<header class = "masthead d-flex">

		    	<h3 class = "mb-5" style = "font-size: 25px; width: 100%;">

		    		<form  class="text-center border border-light p-5" action = "login.php?check=1&login=true" method = "POST">
			            <p class="h4 mb-4">Login</p>
			            <table>
			              	<tr>
			      				<td style = "padding: 10px;">Username:</td>
			                    <td style = "padding: 10px;"><input id = "user" type = "text" name = "user"/></td>
			              	</tr>
			              	<tr>
			      				<td style = "padding: 10px;">Password:</td>
			                    <td style = "padding: 10px;"><input id = "psw" type = "password" name = "psw"/></td>
			              	</tr>
			              	<tr>
			      				<td style = "padding: 10px;" colspan = "2"><center><input class = "btn btn-cyan btn-xl js-scroll-trigger" type = "submit" value = "Invia" /></center></td>
			              	</tr>
			              	<tr>
			      				<td style = "padding: 10px;" colspan = "2"><center><a href = "./login.php?reg=true">Registrati</a></center></td>
			            	</tr>
			            </table>
		    		</form>
		    	</h3>
		  	</header>
			</div>
		</div>
		</center>

		<?php
		}
		?>

		</center>
	</body>
</html>
