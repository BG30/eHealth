<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Patient: Tests</title>
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
			<main>
				<?php
					include('../config.php');
					session_start();
					
					$id = $_SESSION['ID'];
			
					$sql = "SELECT *
							FROM appointment							
							WHERE healthNo = '$id'
							";
					$result = mysqli_query($db,$sql);
				
					echo ("<table border='1' bgcolor='#FFFFFF'>");
					echo"	<tr>
								<th>Status</th>
								<th>Day</th>
								<th>Time</th>
								<th>Appointment Number</th>
								<th>Doctor ID</th>
							</tr>
					";
						
					while($row = mysqli_fetch_array($result)){
						echo "</tr>";
						echo"<td>";
						echo $row['status'];
						echo"</td>";
						echo"<td>";
						echo $row['day'];
						echo"</td>";
						echo"<td>";
						echo $row['time'];
						echo"</td>";
						echo"<td>";
						echo $row['appointNo'];
						echo"</td>";
						echo"<td>";
						echo $row['doctorId'];
						echo"</td>";
						echo"</tr>";	
					}
					echo ("</table><br><br>");
				?>
			
				<center>	
					<form action="appointmentStatus.php" method="post">
						<label>CANCEL</label>
						<input type="radio" name="option" value="CANCELLED"><br>
			
						<label>Select Appointment Number*: </label>
						<select name="appt">
							<?php
								$sql="SELECT appointNo
									  FROM appointment
									  WHERE healthNo= '$id' AND status ='ACCEPTED'
								";
								$result = mysqli_query($db,$sql);
								while($row = mysqli_fetch_array($result)){
									echo "<option value=";
									echo $row['appointNo'];
									echo ">";
									echo $row['appointNo'];
									echo "</option>";
								}
							?>
						</select>
						
						<input type="submit" value="submit" name="submit">
					</form>
					
					<h3>Book with:</h3>
					<form action="chooseDoc.php" method="post">
						<label>Cardiovascular Specialist</label>
						<input type="radio" name="option" value="Cardiovascular Specialist"><br>
						
						<label>General Doctor</label>
						<input type="radio" name="option" value="General Doctor"><br>
						
						<label>Eyecare Specialist</label>
						<input type="radio" name="option" value="Eyecare Specialist"><br>
						
						<label>Counsellor</label>
						<input type="radio" name="option" value="Counsellor"><br>
						
						<input type="submit" value="submit" name="submit"><br>
					<form>
				</center>
			</main>
		</div>
	</body>
	<footer style="margin-left: 70px;">
		<small>© Copyright 2018 Smart Health Inc. All Rights Reserved. Authorized by the Federal Bureau of Health.</small><br>
	</footer>
</html>