<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor: Refer Doctor</title>
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
						<li><a href="doctorHome.php"><img src="doctorIndex.png" alt="Doctor Homepage" width="120" height="60"></a></li>//might want to change the header tags
						<li class="navfont"><a href="patientSelect.php">Select Patient</a></li>
						<li class="navfont"><a href="timeTable.php">Schedule</a></li>
						<li class="navfont"><a href="../homepage/login.php">Sign-Out</a></li> 
					</ul>					   
				</nav>
			</div><br>
			<main>
				<?php
					include('../config.php');
					session_start();
					$id = $_SESSION['ID'];
			
					$sql = "SELECT *
							FROM doctor 
							WHERE doctorId != '$id'
							ORDER BY specializations
						   ";
					$result = mysqli_query($db,$sql);
					
					echo("<table border='1' bgcolor='#FFFFFF'>");
					echo "	<tr>
								<th>Specialization</th>
								<th>Name</th>
								<th>Doctor ID</th>
								<th>Email</th>
								<th>Phone Number</th>
								<th>Address</th>
							</tr>
						";
						
					while($row = mysqli_fetch_array($result)){
						echo "</tr>";
						echo"<td>";
						echo $row['specializations'];
						echo"</td>";
						echo"<td>";
						echo $row['name'];
						echo"</td>";
						echo"<td>";
						echo $row['doctorId'];
						echo"</td>";
						echo"<td>";
						echo $row['email'];
						echo"</td>";
						echo"<td>";
						echo $row['phoneNo'];
						echo"</td>";
						echo"<td>";
						echo $row['address'];
						echo"</td>";
						echo"</tr>";
					}
					echo("</table><br><br>")
				?>
				
				<form action="doctorReferStatus.php" method="post">
					<label>Select Doctor to refer*: </label>
					<select name="doc">
					<?php
						$sql="SELECT *
							  FROM doctor
							  WHERE doctorId != '$id'
					     ";
						$result = mysqli_query($db,$sql);
						while($row = mysqli_fetch_array($result)){
							echo "<option value=";
							echo $row['doctorId'];
							echo ">";
							echo $row['specializations'];
							echo "-";
							echo $row['name'];
							echo "-";
							echo $row['doctorId'];
							echo "</option>";
						}
					?>
					</select>
					
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
					
					<input type="submit" value="submit" name="submit">
				</form>
			
				<center>			
					<button onclick="location.href='patientInfo.php' type= "button">Patient Info</button>
					<button onclick="location.href='patientMedications.php'" type= "button">Medications</button>
					<button onclick="location.href='patientTests.php'" type= "button">Tests</button>
					<button onclick="location.href='patientMedicalRecords.php'" type= "button">Medical Observations</button>
				</center>
			</main>
		</div>
	</body>
	<footer style="margin-left: 70px">
		<small>© Copyright 2018 Smart Health Inc. All Rights Reserved. Authorized by the Federal Bureau of Health.</small><br>
	</footer>
</html>