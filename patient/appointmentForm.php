<?php
	include("../config.php");
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Patient: Appointment Form</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../deCss.css">
		<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Macondo" rel="stylesheet"
	</head>
	<body id="flatDoc">
		<div id="wrapper">
			<div>
				<nav>
					<ul>
						<li class="navfont"><a href="patientHome.php">Home</a></li>
						<li class="navfont"><a href="patientTests.php">Tests</a></li>
						<li class="navfont"><a href="patientMedications.php">Medications</a></li>
						<li class="navfont"><a href="appointmentHome.php">Schedule</a></li>
						<li class="navfont"><a href="patientBilling.php">Billing</a></li>
						<li class="navfont"><a href="../homepage/login.php">Logout</a></li>
					</ul>					   
				</nav>
			</div><br>
			
				<form action="sendApptRequest.php" method ="post">
					<?php
						if(isset($_POST['submit'])){
							$_SESSION['bookWith']=$_POST['doc'];
						}
					?>
					
					<center>
						<p>
						Select a Day:
						<select name="selectDay">
							<option value="MONDAY">MONDAY</option>
							<option value="TUESDAY">TUESDAY</option>
							<option value="WEDNESDAY">WEDNESDAY</option>
							<option value="THURSDAY">THURSDAY</option>
							<option value="FRIDAY">FRIDAY</option>
							<option value="SATURDAY">SATURDAY</option>
							<option value="SUNDAY">SUNDAY</option>
						</select>
						</p>

						<p>
						Select a Time, appointments are 30 mins. long:
						<select name="selectTime">
							<option value="9:00">9:00</option>
							<option value="9:30">9:30</option>
							<option value="10:00">10:00</option>
							<option value="10:30">10:30</option>
							<option value="11:00">11:00</option>
							<option value="11:30">11:30</option>
							<option value="12:00">12:00</option>
							<option value="12:30">12:30</option>
							<option value="1:00">1:00</option>
							<option value="1:30">1:30</option>
							<option value="2:00">2:00</option>
							<option value="2:30">2:30</option>
							<option value="3:00">3:00</option>
						</select>
						</p>
						
						<input type="submit" value="submit" name="submit"><br><br>
					</center>
				</form>
				<div id="map"></div>
		
		</div>
	</body>
	<footer style="margin-left: 70px">
		<small>© Copyright 2018 Smart Health Inc. All Rights Reserved. Authorized by the Federal Bureau of Health.</small><br>
	</footer>
</html>