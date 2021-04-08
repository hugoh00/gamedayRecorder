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
	
	<title>Gameday Record Entry</title>
</head>

<!-- Navigation Bar to access pages -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark navbar-static-top">
    <a class="navbar-brand" >
            <img src="<?php echo base_url('public\images\logo.png') ?>" width="50" height="50" class="d-inline-block" alt="">
            <h4>Gameday Recorder</h4>
    </a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
   		<span class="navbar-toggler-icon"></span>
	</button>	
		<div class = "collapse navbar-collapse" id="collapsibleNavbar">
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="<?php echo base_url(''); ?>">Home Page</a>
                <a class="nav-item nav-link active" href="<?php echo base_url('index.php/recordgame'); ?>">Game Recorder</a>
			</div>
		</div>
</nav>


<body  style="background-color: #c8a2c8">
    <div class="container" style="background-color:aliceblue; padding-top:5px; padding-bottom:10px;">
        <!-- Game Select -->
			<div class="form-group">
				<label for="gameSelect">Game Title:</label>
				<select class="form-control selectpicker" style="width:50%" id="gameSelect" name="gameSelect">
                    <option value="X">Select Game</option>
					<option value="RL">Rocket League</option>
                    <option value="RLC">New Preset</option>
					<option value="FTK">For The King</option>
				</select>	
			</div>
            <?php 
        if (isset($rlInfoError)){
            if($rlInfoError == false) {
                echo "<div class='alert alert-success' role='alert'>Record Added!</div>";
            } else if ($rlInfoError == true) {
                echo "<div class='alert alert-danger' role='alert'>Something Went Wrong!</div>";
            } 
        }
    ?>
    </div>

    <br>

    <div class="container" id="rlForm" style="background-color:aliceblue; padding-top:5px; padding-bottom:10px;">
        <form id="rlInfo" name="rlInfo" action="<?php echo base_url("index.php/saveRLtournament"); ?>" method="post">
        
        <h3 class="form-title">Rocket League Tournament Information</h3>
        <!-- day of tournament -->
            <div class="form-row">
				<div class="col">
                    <label for="tournamentDate">Tournament Date:</label>
					<input class="form-control" type="date" id="tournamentDate" name="tournamentDate" required>
				</div>
        <!-- Tournament Finish -->
                <div class="col">
                    <label for="tournamentPlacement">Tournament Placement:</label>
                    <select class="form-control" id="tournamentPlacement" name="tournamentPlacement">
                        <option value="0">First Rounded</option>
                        <option value="1">Last 16</option>
                        <option value="2">Quarter Finals</option>
                        <option value="3">Semi Finals</option>
                        <option value="4">Finals</option>
                        <option value="5">Finals WINNER!</option>
                    </select>	
                </div>
			</div>
            <br>
            <h5 class="form-title">Team Information</h5>
        <!-- team name -->
        <div class="form-group">
            <label for="teamName">Name & Stats:</label>
            <input type="text" class="form-control" id="teamName" name="teamName" placeholder="Enter Team Name" autocomplete="off">
        </div>
        <!-- team goals, goals, assists, and saves -->
        <div class="form-row">
            <div class="col">
                <input type="text" id="teamGoals" name="teamGoals" class="form-control" placeholder="Team Goals" autocomplete="off">
            </div>
            <div class="col">
                <input type="text" id="goals" name="goals" class="form-control" placeholder="Goals" autocomplete="off">
            </div>
            <div class="col">
                <input type="text" id="assists" name="assists" class="form-control" placeholder="Assists" autocomplete="off">
            </div>
            <div class="col">
                <input type="text" id="saves" name="saves" class="form-control" placeholder="Saves" autocomplete="off">
            </div>
        </div>
        <br>
        <button class="btn btn-outline-info btn-lg btn-block" type="savetournamentInfo" name="savetournamentInfo" value="savetournamentInfo">Store Tournament Information</button>
        </div>
        </form>
    </div>

    <div class="container" id="rlCarform" style="background-color:aliceblue; padding-top:5px; padding-bottom:10px;">
        <form id="rlCar" name="rlCar" action="<?php echo base_url("index.php/saveCarInfo"); ?>" method="post">
        
        <h3 class="form-title">Rocket League Preset Creation</h3>
        <!-- Car -->
        <!-- PHP loop to echo out selections of all cars stored -->
        <!-- If other selected text box appears so car can be added -->
                <div class="col">
                    <label for="car">Car:</label>
                    <select class="form-control" id="car" name="car">
                        <option value="0">Select Car</option>
                        <option value="x">Not Appearing?</option>
                        <!-- loop here -->
                    </select>	
                </div>
                <div class="form-group" id="newCar">
                    <label for="cardetails">Car:</label>
                    <input type="text" class="form-control" id="cardetails" name="cardetails" placeholder="Enter Car Name" autocomplete="off">
                </div>

            <!-- Decal -->
        <!-- PHP loop to echo out selections of all cars stored -->
        <!-- If other selected text box appears so car can be added -->
            <div class="col">
                    <label for="decal">Car:</label>
                    <select class="form-control" id="decal" name="decal">
                        <option value="0">Select Decal</option>
                        <option value="1">None</option>
                        <option value="x">Not Appearing?</option>
                        <!-- loop here -->
                    </select>	
            </div>
                <div class="form-group" id="newDecal">
                    <label for="decaldetails">Decal:</label>
                    <input type="text" class="form-control" id="decaldetails" name="decaldetails" placeholder="Enter Decal Name" autocomplete="off">
                </div>
            <br>
        
        
            
        <br>
        <button class="btn btn-outline-info btn-lg btn-block" type="savetournamentInfo" name="savetournamentInfo" value="savetournamentInfo">Store Tournament Information</button>
        </div>
        </form>
    </div>

    <div class="container" id="ftkForm" style="background-color:aliceblue; padding-top:5px; padding-bottom:10px;">
   
    </div>
	</body>

</html>

<script>
$(function(){
    $('#rlForm').hide();
    $('#rlCarform').hide();
    $('#ftkForm').hide();

    // preset form
    $('#newCar').hide();
    $('#newDecal').hide();
});
$("#gameSelect").change(function() {
  if ($(this).val() == "X") {
    //   hide both forms
    $('#rlForm').hide();
    $('#rlCarform').hide();
    $('#ftkForm').hide();
  } else if ($(this).val() == "RL") {
    //   displays the rocket league form
    $('#rlForm').show();
    $('#rlCarform').hide();
    $('#ftkForm').hide();
  } else if ($(this).val() == "FTK") {
    //   displays the rocket league form
    $('#ftkForm').show();
    $('#rlCarform').hide();
    $('#rlForm').hide();
  }  else if ($(this).val() == "RLC") {
    //   displays the rocket league form
    $('#rlCarform').show();
    $('#ftkForm').hide();
    $('#rlForm').hide();
  }
});
$("#gameSelect").trigger("change");

$("#car").change(function() {
  if ($(this).val() == "X") {
    $('#newCar').show();
  } else {
    $('#newCar').hide();
  }
});
$("#car").trigger("change");

$("#decal").change(function() {
  if ($(this).val() == "X") {
    $('#newDecal').show();
  } else {
    $('#newDecal').hide();
  }
});
$("#decal").trigger("change");

</script>


