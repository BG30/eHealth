<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor: Patient Meds</title>
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
					include("../config.php");
					session_start();
					
					$person=$_SESSION['healthNo'];
					
					$sql = "SELECT *
							FROM medication 
							WHERE healthNo= '$person' 
						   ";
					$result = mysqli_query($db,$sql);
				
					echo ("<table border='1' bgcolor='#FFFFFF'>");
					echo"	<tr>
								<th>Prescription Number</th>
								<th>Medicine Name</th>
								<th>Medicine ID</th>
								<th>Dosage</th>
								<th>Take Date</th>
							</tr>
						";
						
					while($row = mysqli_fetch_array($result)){
						echo "</tr>";
						echo "<td>";
						echo $row['prescriptionNo'];
						echo "</td>";
						echo "<td>";
						echo $row['medicineName'];
						echo "</td>";
						echo "<td>";
						echo $row['medID'];
						echo "</td>";
						echo "<td>";
						echo $row['dosage'];
						echo "</td>";
						echo "<td>";
						echo $row['medicineTakeDate'];
						echo "</td>";
						echo "</tr>";	
					}
					echo ("</table><br><br>");
				?>
				
				<center>
					<form action="sendMeds.php" method ="post">
						<label for="medID">Medication ID*: </label>
						<input type="text" placeholder="Enter 9 digit Number" name="medID" id="medID" required> <br>
					
						<label for="medName">Medicine Name*: </label>
						<input type="text" placeholder="Enter upto 25 places" name="medName" id="medName" required><br>
					
						<label for="medicineTakeDate">Medicine Take Date*: </label>
						<input type="text" placeholder="A date" name="medicineTakeDate" id="medicineTakeDate" required><br>
						
						<label for="dosage">Dosage*: </label>
						<input type="text" placeholder="Enter upto 30 places" name="dosage" id="dosage" required><br>
						
						<input type="submit" value="submit" name="submit"><br><br>
					</form>
				</center>
				
				<center>
					<button onclick="location.href='patientInfo.php'" type= "button">Patient Info</button>
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