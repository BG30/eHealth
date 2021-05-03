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
					include("../config.php");
					session_start();
					
					$id = $_SESSION['ID'];
					$sql = "SELECT *
							FROM record 
							WHERE healthNo= '$id' AND testResult != 'none'
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
						echo"<td>";
						echo $row['recordNo'];
						echo"</td>";
						echo "<td>";
						echo $row['testResult'];
						echo"</td>";
						echo"</tr>";	
					}
					echo ("</table><br><br>");
				?>
			</main>
		</div>
	</body>
	<footer style="margin-left: 70px">
		<small>© Copyright 2018 Smart Health Inc. All Rights Reserved. Authorized by the Federal Bureau of Health.</small><br>
	</footer>
</html>