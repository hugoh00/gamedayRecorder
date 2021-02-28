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
	
	<title>Rocket League Stats</title>
</head>

<!-- Navigation Bar to access pages -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark navbar-static-top">
	<a class="navbar-brand" href="#">Gameday Recorder</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
   		<span class="navbar-toggler-icon"></span>
	</button>	
		<div class = "collapse navbar-collapse" id="collapsibleNavbar">
			<div class="navbar-nav">
				<a class="nav-item nav-link" href="<?php echo base_url(''); ?>">Home Page</a>
                <a class="nav-item nav-link" href="<?php echo base_url('index.php/recordgame'); ?>">Game Recorder</a>
                <a class="nav-item nav-link active" href="<?php echo base_url('index.php/rocketLeagueStats'); ?>">Rocket League Stats</a>
			</div>
		</div>
</nav>


	<body  style="background-color: #b3ffe0">
    <div class="container" style="background-color:aliceblue; padding-top:5px; padding-bottom:10px;">
        <div id="calendar_tournaments"></div>
    </div>
	</body>

</html>

<script type="text/javascript">

    google.charts.load("current", {packages:["calendar"]}); 
    google.charts.setOnLoadCallback(datesOfTournaments);

    function datesOfTournaments() {
       var dataTable = new google.visualization.DataTable();
       dataTable.addColumn({ type: 'date', id: 'Date' });
       dataTable.addColumn({ type: 'number', id: 'Won/Loss' });
       <?php 
            foreach ($tournamentDates->result() as $row) 
            {
                $year = substr($row->dateOfTournament,0,4);
                $month = substr($row->dateOfTournament,5,2);
                $actual = intval($month);
                $actual = $actual - 1;
                $day = substr($row->dateOfTournament,8,2);
                echo <<<_END
                dataTable.addRows([[new Date($year,$actual,$day), $row->ID]]);
_END;
            }
       ?>

       var chart = new google.visualization.Calendar(document.getElementById('calendar_tournaments'));

       var options = {
            title: "Rocket League Tournament Participations",
            height: 350,
            noDataPattern: {
                backgroundColor: '#ff6961',
                color: '#e9dcf5'
            },
            cellColor: {
                stroke: '#61f7ff',
                strokeOpacity: 0.5,
                strokeWidth: 1,
            },
            calendar: {
            underYearSpace: 10, // Bottom padding for the year labels.
            yearLabel: {
                fontName: 'Times-Roman',
                fontSize: 32,
                color: '#008080',
                bold: true,
                italic: true
            },
            monthLabel: {
                fontName: 'Times-Roman',
                fontSize: 12,
                color: '#008080',
                bold: true,
                italic: true
            },
            monthOutlineColor: {
                stroke: '#004080',
                strokeOpacity: 0.8,
                strokeWidth: 2
            },
            unusedMonthOutlineColor: {
                stroke: '#008080',
                strokeOpacity: 0.8,
                strokeWidth: 1
            },
            underMonthSpace: 16,

        }
       };

       chart.draw(dataTable, options);
   }


</script>


