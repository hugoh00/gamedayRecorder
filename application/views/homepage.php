<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">	
	<link rel='stylesheet' href="<?php echo base_url('public\css\bootstrap.css') ?>"/>
	<!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
    <script src="<?php echo base_url('public\javascript\bootstrap.js') ?>"></script>
	<!-- Google Charts libraries -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	
	<script type='text/javascript' src="<?php echo base_url('public/javascript/welcomeRegistration.js') ?>"></script>
	<title>Gameday Record Homepage</title>
</head>

<!-- Navigation Bar to access pages -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark navbar-static-top">
	<a class="navbar-brand" href="#">Gameday Recorder</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
   		<span class="navbar-toggler-icon"></span>
	</button>	
		<div class = "collapse navbar-collapse" id="collapsibleNavbar">
			<div class="navbar-nav">
				<a class="nav-item nav-link active" href="<?php echo base_url(''); ?>">Home Page</a>
				<a class="nav-item nav-link" href="<?php echo base_url('index.php/recordgame'); ?>">Game Recorder</a>
			</div>
		</div>
</nav>


	<body  style="background-color: #b3ffe0">

	</body>

</html>
