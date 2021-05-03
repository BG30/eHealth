<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor: Patient Select</title>
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
						<li class="navfont"><a href="timeTable.php">Schedule</a></li>
						<li class="navfont"><a href="../homepage/login.php">Sign-Out</a></li> 
					</ul>					   
				</nav>
			</div><br>
			<div style="background-color:white">Please Select a patient</div><br>
			
			<?php
				include("../config.php");
				session_start();
				$iD = $_SESSION['ID'];
				
				$sql = "SELECT *
						FROM appointment
						WHERE doctorId= '$iD' AND status ='ACCEPTED'
					   ";
				$result = mysqli_query($db,$sql);	
			
				echo("<table border='1' bgcolor='#FFFFFF'>");
				echo "
					<tr>
						<th>Appointment Number</th>
						<th>Health Number</th>
					</tr>
					";
				while($row = mysqli_fetch_array($result)){
					$value=$row[2];
					echo "</tr>"; 
					echo "<td>";
					echo $row[0];
					echo "</td>";
					echo "<td>";
					echo $row[2];
					echo "</td>";
					echo "</tr>";
				}
				echo("</table><br><br>");
			?>
			
			<form action="patientSelectRequest.php" method="post">
				<label for="appt">Select Appointment Number*: </label>
				<select name="appt">
					<?php
					$sql="SELECT appointNo
						  FROM appointment
						  WHERE doctorId= '$iD' AND status ='ACCEPTED'
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
				<button name='submit' type="submit">Submit</button>
			</form>
		</div>
	</body>
	<footer style="margin-left: 70px">
		<small>© Copyright 2018 Smart Health Inc. All Rights Reserved. Authorized by the Federal Bureau of Health.</small><br>
	</footer>
</html>