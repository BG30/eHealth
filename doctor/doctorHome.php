<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor: Home</title>
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
						<li><a href="doctorHome.php"><img src="doctorIndex.png" alt="Doctor Homepage" width="120" height="60"></a></li>
						<li class="navfont"><a href="patientSelect.php">Select Patient</a></li>
						<li class="navfont"><a href="timetable.php">Schedule</a></li>
						<li class="navfont"><a href="../homepage/login.php">Sign-Out</a></li> 
					</ul>					   
				</nav>
			</div><br>
				<?php
					include("../config.php");
					session_start();
					$id = $_SESSION['ID'];
					
					$sql = "SELECT *
							FROM appointment
							WHERE doctorId= '$id' AND status != 'CANCELLED'
				           ";
					$result = mysqli_query($db,$sql);	
					
					echo("<table border='1' bgcolor='#FFFFFF'>");		
					echo"	<tr>
								<th>Status</th>
								<th>Day</th>
								<th>Time</th>
								<th>Appointment Number</th>
								<th>Health Number</th>
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
						echo $row['healthNo'];
						echo"</td>";
						echo"</tr>";	
					}
					echo ("</table><br><br>");
				?>
		</div>
	</body>
	<footer style="margin-left: 70px">
		<small>© Copyright 2018 Smart Health Inc. All Rights Reserved. Authorized by the Federal Bureau of Health.</small><br>
	</footer>
</html>