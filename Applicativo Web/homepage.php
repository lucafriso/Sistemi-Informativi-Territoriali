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

	    <nav class="navbar navbar-expand-md navbar-dark elegant-color mb-5">
	    	<div class="mr-auto">
		    		<nav aria-label="breadcrumb">
      					<ol class="breadcrumb d-inline-flex pl-0 pt-0">
        					<li class="breadcrumb-item">Urbanistica</li>
      					</ol>
    				</nav>
			</div>
		</nav>
	    <div class='container'>

	    	<div class='row'>
	    		<div class="col-sm">
		    		<!-- Card Dark -->
					<div class="card">

	  				<!-- Card image -->
	  				<div class="view overlay">
	    				<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2821%29.jpg"
	      				alt="Card image cap">
	    			<a>
	      			<div class="mask rgba-white-slight"></div>
	    			</a>
	  				</div>

	  				<!-- Card content -->
	  				<div class="card-body elegant-color white-text rounded-bottom">

	    			<!-- Title -->
	    			<h4 class="card-title">Sei già registrato?</h4>
	    			<hr class="hr-light">
	    			<!-- Text -->
	    			<p class="card-text white-text mb-4">Effettua il login per eseguire una segnalazione</p>
	    			<!-- Link -->
	    			<a href="./loginform.php" class="white-text d-flex justify-content-end">
	      			<h5>Login<i class="fas fa-angle-double-right"></i></h5>
	    			</a>
					</div>
					<!-- Card Dark -->
					</div>
				</div>

				<div class="col-sm">
		    		<!-- Card Dark -->
					<div class="card">

	  				<!-- Card image -->
	  				<div class="view overlay">
	    				<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2821%29.jpg"
	      				alt="Card image cap">
	    			<a>
	      			<div class="mask rgba-white-slight"></div>
	    			</a>
	  				</div>

	  				<!-- Card content -->
	  				<div class="card-body elegant-color white-text rounded-bottom">

	    			<!-- Title -->
	    			<h4 class="card-title">Non sei ancora registrato?</h4>
	    			<hr class="hr-light">
	    			<!-- Text -->
	    			<p class="card-text white-text mb-4">Registrati! E' semplicissimo.</p>
	    			<!-- Link -->
	    			<a href="./registerform.php" class="white-text d-flex justify-content-end">
	      			<h5>Registrati<i class="fas fa-angle-double-right"></i></h5>
	    			</a>
					</div>
					<!-- Card Dark -->
					</div>
				</div>

				<div class="col-sm">
		    		<!-- Card Dark -->
					<div class="card">

	  				<!-- Card image -->
	  				<div class="view overlay">
	    				<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2821%29.jpg"
	      				alt="Card image cap">
	    			<a>
	      			<div class="mask rgba-white-slight"></div>
	    			</a>
	  				</div>

	  				<!-- Card content -->
	  				<div class="card-body elegant-color white-text rounded-bottom">

	    			<!-- Title -->
	    			<h4 class="card-title">Area riservata</h4>
	    			<hr class="hr-light">
	    			<!-- Text -->
	    			<p class="card-text white-text mb-4">Area riservata ai tecnici comunali</p>
	    			<!-- Link -->
	    			<a href="./loginform.php" class="white-text d-flex justify-content-end">
	      			<h5>Login<i class="fas fa-angle-double-right"></i></h5>
	    			</a>
					</div>
					<!-- Card Dark -->
					</div>
				</div>
			</div>
	</div>

	</body>
</html>
