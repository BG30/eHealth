<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor: Tests</title>
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
					
					$person = $_SESSION['healthNo'];
					$sql = "SELECT *
							FROM record 
							WHERE healthNo= '$person' AND testResult != 'none'
						   ";
					$result = mysqli_query($db,$sql);
				
					echo ("<table border='1' bgcolor='#FFFFFF'>");
					echo"	<tr>
								<th>Record Number</th>
								<th>Test Results</th>
							</tr>
						";
						
					while($row = mysqli_fetch_array($result)){
						echo "</tr>";
						echo "<td>";
						echo $row['recordNo'];
						echo "</td>";
						echo"<td>";
						echo $row['testResult'];
						echo"</td>";
						echo"</tr>";	
					}
					echo ("</table><br><br>");
				?>
				
				<form action="sendTests.php" method="post">
					<center>
						<label for="testResult">Tests*: </label>
						<input type="text" placeholder="Enter tests to do" name="testResult" id="testResult" required><br>
						
						<input type="submit" value="submit" name="submit"><br><br>
					</center>
				</form>
				
				<center>
					<button onclick="location.href='patientMedications.php'" type= "button">Medications</button>
					<button onclick="location.href='patientInfo.php'" type= "button">Patient Info</button>
					<button onclick="location.href='patientMedicalRecords.php'" type= "button">Medical Observations</button>
				</center>
			
			</main>
		</div>
	</body>
	<footer style="margin-left: 70px">
		<small>© Copyright 2018 Smart Health Inc. All Rights Reserved. Authorized by the Federal Bureau of Health.</small><br>
	</footer>
</html>