<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor: Schedule</title>
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
		<?php
			include('../config.php');
			session_start();
					
			$doctor = $_SESSION['ID'];
			
			$sql = "SELECT *
					FROM appointment							
					WHERE doctorId = '$doctor' AND status != 'CANCELLED'
					";
			$result = mysqli_query($db,$sql);
				
			echo ("<table border='1' bgcolor='#FFFFFF'>");
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
			
		<center>	
			<form action="appointmentStatus.php" method="post">
				<label>ACCEPT</label>
				<input type="radio" name="option" value="ACCEPTED">
			
				<label>CANCEL</label>
				<input type="radio" name="option" value="CANCELLED"><br>
			
				<label>Select Appointment Number*: </label>
				<select name="appt">
					<?php
						$sql="SELECT *
							  FROM appointment
							  WHERE doctorId= '$doctor' AND status !='CANCELLED'
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
		</center>
		</div>
	</body>
	<footer style="margin-left: 70px">
		<small>© Copyright 2018 Smart Health Inc. All Rights Reserved. Authorized by the Federal Bureau of Health.</small><br>
	</footer>
</html>